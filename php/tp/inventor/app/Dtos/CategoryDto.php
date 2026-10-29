<?php

declare(strict_types=1);

namespace Codemdg\Inventor\Dtos;

use JsonSerializable;

class CategoryDto implements JsonSerializable{
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

    public static function fromDatabase(array $data):CategoryDto
    {
        return new CategoryDto(
            $data['id'],
            $data['name'],
        );
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name
        ];
    }
}