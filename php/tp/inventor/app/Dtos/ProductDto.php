<?php

declare(strict_types=1);

namespace Codemdg\Inventor\Dtos;

use Codemdg\Core\Http\Route;

final class ProductDto
{
    public function __construct(
        public private(set) int $id,
        public private(set) string $productName,
        public private(set) float $buyingPrice,
        public private(set) float $quantity,
        public private(set) float $thresholdvalue,
        public private(set) string $expiryDate,
        public private(set) string $availability,
        public private(set) int $categoryId,
        public private(set) ?string $unit,
        public private(set) ?string $urlDelete = null,
        public private(set) ?string $urlShowProductEdit = null
    ) {}

    public static function fromDatabase(array $data): self
    {
        return new ProductDto(
            id: $data["id"],
            productName: $data["name"],
            buyingPrice: $data["buying_price"],
            quantity: $data["quantity"],
            thresholdvalue: $data["threshold_value"],
            expiryDate: $data["expiry_date"],
            availability: $data["availability"] ?? "",
            categoryId:$data["category_id"],
            unit:$data["unit"],
            urlDelete: sprintf("%s?id=%d", Route::generateUrl("product.delete"), $data["id"]),
            urlShowProductEdit: sprintf("%s?id=%d", Route::generateUrl("product.show.edit"), $data["id"]),
        );
    }
}
