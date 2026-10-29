<?php

declare(strict_types=1);

namespace Codemdg\Inventor\Dtos;

final class CategoryDto
{
    public function __construct(private int $id, private string $name)
    {
    }

    public function getId():int
    {
        return $this->id;
    }

    public function getName():string
    {
        return $this->name;
    }

    public static function fromArray(array $data):CategoryDto
    {
        return new CategoryDto(
            $data["id"],
            $data["name"]
        );
    }
}
