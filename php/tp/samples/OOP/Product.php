<?php

declare(strict_types=1);

class Product
{
    private int $reference;
    private string $label;
    private float $unitPrice;
    private float $quantity;

    public function __construct(int $reference, string $label, float $unitPrice, float $quantity)
    {
        $this->reference = $reference;
        $this->label = $label;
        $this->unitPrice = $unitPrice;
        $this->quantity = $quantity;
    }

    public function getReference(): int
    {
        return $this->reference;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getUnitPrice(): float
    {
        return $this->unitPrice;
    }

    public function getQuantity(): float
    {
        return $this->quantity;
    }
}
