<?php

declare(strict_types=1);

namespace Codemdg\Inventor\Validators;

final class NewProductValidator implements ValidatorInterface
{
    private array $errors = [];

    public function isValid(array $data): bool
    {
        if (empty($data["product-name"])) {
            $this->errors["product-name"] = "Product name is required";
        }

        if (empty($data["product-id"])) {
            $this->errors["product-id"] = "Product ID is required";
        }

        if (empty($data["category-product"])) {
            $this->errors["category-product"] = "Product's category is required";
        }

        if (empty($data["buying-price"]) || floatval($data["buying-price"]) <= 0) {
            $this->errors["buying-price"] = "Buying price is required";
        }

        return empty($this->errors);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
