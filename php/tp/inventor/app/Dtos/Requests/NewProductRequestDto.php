<?php

declare(strict_types=1);

namespace Codemdg\Inventor\Dtos\Requests;

final class NewProductRequestDto
{
    public function __construct(
        public private(set) array $dataFiles,
        public private(set) string $productName,
        public private(set) string $productRef,
        public private(set) int $categoryProduct,
        public private(set) float $buyingPrice,
        public private(set) string $unit,
        public private(set) string $expiryDate,
        public private(set) float $thresholdvalue,
        public private(set) float $quantity,
        public ?int $productIdDB = null {
            set(?int $productIdDB) {
                $this->productIdDB = $productIdDB;
            }
        }
    ) {}

    public static function fromArray(array $data): self
    {
        return new NewProductRequestDto(
            dataFiles: $data["files"],
            productName: $data["product-name"],
            productRef: $data["product-id"],
            categoryProduct: (int)$data["category-product"],
            buyingPrice: (float)$data["buying-price"],
            unit: $data["unit"],
            expiryDate: $data["expiry-date"],
            thresholdvalue: (float)$data["threshold-value"],
            quantity: (float)$data["quantity"]
        );
    }

    public function toArray(): array
    {
        return [
            "id" => $this->productIdDB,
            "product-name"     => $this->productName,
            "product-id"       => $this->productRef,
            "category-product" => $this->categoryProduct,
            "buying-price"     => $this->buyingPrice,
            "unit"             => $this->unit,
            "expiry-date"      => $this->expiryDate,
            "threshold-value"  => $this->thresholdvalue,
            "quantity"         => $this->quantity
        ];
    }
}
