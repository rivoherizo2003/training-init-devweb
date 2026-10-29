<?php

declare(strict_types=1);

namespace Codemdg\Inventor\Models;

use Codemdg\Core\Models\AbstractModel;
use Codemdg\Inventor\Dtos\CategoryDto;
use PDO;

final class CategoryModel extends AbstractModel
{
    public function getListCategories():array
    {
        $statement = $this->pdo->prepare("SELECT * FROM category ORDER BY name ASC");
        $statement->execute();
        $categories = $statement->fetchAll(PDO::FETCH_ASSOC);

        // [["id" => 1, "name" => "PPN"], [], [].....]
        return array_map(fn($item) => CategoryDto::fromArray($item), $categories);
    }
}
