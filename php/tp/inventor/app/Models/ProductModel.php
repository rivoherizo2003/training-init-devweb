<?php

declare(strict_types=1);

namespace Codemdg\Inventor\Models;

use Codemdg\Core\Models\AbstractModel;
use Codemdg\Inventor\Dtos\ProductDto;
use Codemdg\Inventor\Dtos\Requests\NewProductRequestDto;
use Codemdg\Inventor\Exceptions\DeletedProductFailedException;
use Codemdg\Inventor\Exceptions\ProductNotCreatedException;
use Codemdg\Inventor\Exceptions\ProductNotFoundException;
use Codemdg\Inventor\Exceptions\ProductsListFailedException;
use Exception;
use PDO;

final class ProductModel extends AbstractModel
{
    private FilesModel $filesModel;

    public function __construct()
    {
        $this->filesModel = new FilesModel();
        return parent::__construct();
    }

    public function saveProduct(NewProductRequestDto $newProductRequestDto): NewProductRequestDto
    {
        $sql = " INSERT INTO products (product_ref,name, category_id, buying_price, unit, quantity, expiry_date, threshold_value, created_at)
VALUES( :product_ref, :product_name, :category_id, :buying_price, :unit, :quantity, :expiry_date, :threshold_value, NOW())";

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute([
                ':product_ref'      => $newProductRequestDto->productRef,
                ':product_name'    => $newProductRequestDto->productName,
                ':category_id'     => $newProductRequestDto->categoryProduct,
                ':buying_price'    => $newProductRequestDto->buyingPrice,
                ':unit'            => $newProductRequestDto->unit,
                ':quantity' => $newProductRequestDto->quantity,
                ':expiry_date'     => $newProductRequestDto->expiryDate,
                ':threshold_value' => $newProductRequestDto->thresholdvalue,
            ]);
        } catch (\Throwable $th) {
            throw new ProductNotCreatedException($th->getMessage());
        }
        $newProductRequestDto->productIdDB = (int) $this->pdo->lastInsertId();

        $this->filesModel->saveFilesProduct($newProductRequestDto);

        return $newProductRequestDto;
    }

    public function getProducts(int $currentPage = 1, int $itemsPerPage = 10): array
    {
        //LIMIT 10 OFFSET 0 (Récupère les produits 1 à 10)
        //LIMIT 10 OFFSET 10 (Récupère les produits 11 à 20)
        //LIMIT 10 OFFSET 20 (Récupère les produits 21 à 30)
        $offset = ($currentPage - 1) * $itemsPerPage;
        
        $sql = " SELECT * FROM products  ORDER BY id ASC LIMIT :limit OFFSET :offset ";
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(":limit", $itemsPerPage, PDO::PARAM_INT);
            $statement->bindValue(":offset", $offset, PDO::PARAM_INT);
            $statement->execute();

            $products = $statement->fetchAll(PDO::FETCH_ASSOC);

            return array_map(fn($item) => ProductDto::fromDatabase($item), $products);
        } catch (\Throwable $e) {
            throw new ProductsListFailedException($e->getMessage());
        }
    }

    public function countAllProducts(): int
    {
        $sql = " SELECT COUNT(*) FROM products ";
        try {
            $statements = $this->pdo->prepare($sql);
            $statements->execute();

            return $statements->fetchColumn();
        } catch (\Throwable $e) {
            throw new Exception("Error: count products");
        }
    }
    
    public function deleteProduct(int $productId): void
    {
        $this->filesModel->deleteFilesByProductId($productId);
        
        $sql = " DELETE FROM products WHERE id = :productId ";
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(":productId", $productId, PDO::PARAM_INT);
            $statement->execute();
        } catch (\Throwable $e) {
            throw new DeletedProductFailedException($e->getMessage());
        }
    }

    public function getProduct(int $productId): ProductDto
    {
        $sql = " SELECT * FROM products WHERE id = :productId";
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(":productId", $productId, PDO::PARAM_INT);
            $statement->execute();

            $product = $statement->fetch(PDO::FETCH_ASSOC);

            return ProductDto::fromDatabase($product);
        } catch (\Throwable $e) {
            throw new ProductNotFoundException($e->getMessage());
        }
    }

}
