<?php

declare(strict_types=1);

namespace Codemdg\Inventor\Controllers;

use Codemdg\Core\Enum\HttpCode;
use Codemdg\Core\Controllers\AbstractController;
use Codemdg\Core\Dto\Response\PaginationMetaDto;
use Codemdg\Core\Dto\Response\PaginationResponseDto;
use Codemdg\Core\Http\Route;
use Codemdg\Inventor\Dtos\Requests\NewProductRequestDto;
use Codemdg\Inventor\Models\ProductModel;
use Codemdg\Inventor\Validators\NewProductValidator;
use Codemdg\Inventor\Validators\ValidatorInterface;

final class ProductController extends AbstractController
{
    private ValidatorInterface $validator;

    private ProductModel $productModel;

    public function __construct()
    {
        $this->validator = new NewProductValidator();
        $this->productModel = new ProductModel();
        return parent::__construct();
    }

    public function addProduct(): void
    {
        if ($this->validator->isValid($_POST)) {

            try {
                $newProductRequestDto = NewProductRequestDto::fromArray(array_merge($_POST, ["files" => $_FILES]));

                $this->productModel->saveProduct($newProductRequestDto);

                $this->json($newProductRequestDto->toArray(), HttpCode::CREATED->value);
            } catch (\Throwable $e) {
                $this->json([
                    "errors" => $e->getMessage(),
                    "message" => "Error occurred while saving product"
                ], HttpCode::INTERNAL_SERVER_ERROR->value);
            }
        }

        $this->json([
            "formErrors" => $this->validator->getErrors()
        ], HttpCode::BAD_REQUEST->value);
    }

    public function listProducts(): void
    {
        $totalItems =  $this->productModel->countAllProducts();
        $page = $_GET["page"] ?? 1;
        $itemsPerPage = $_GET["itemsPerPage"] ?? 10;
        $this->json(
            new PaginationResponseDto(
                data: $this->productModel->getProducts((int)$page, (int)$itemsPerPage),
                meta: new PaginationMetaDto(
                    page: (int) $page,
                    totalItems: $totalItems,
                    totalPages: ceil($totalItems / ((int)$itemsPerPage))
                )
            )
        );
    }

    public function deleteProduct(): void
    {
        $this->productModel->deleteProduct((int)$_GET["id"]);

        $this->redirectToUrl(Route::generateUrl("show.inventory"));
    }

    public function showEdit(): void
    {
        $productDto = $this->productModel->getProduct((int)$_GET["id"]);

        $this->render("admin/inventory/form_product.php", [
            "productEditDto" => $productDto
        ]);
    }

    public function saveProduct(): void
    {
        echo "save product";
    }
}
