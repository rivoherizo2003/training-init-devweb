<?php

declare(strict_types=1);

namespace Codemdg\Inventor\Controllers;

use Codemdg\Core\Controllers\AbstractController;
use Codemdg\Inventor\Models\CategoryModel;

final class CategoryController extends AbstractController
{
    private CategoryModel $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel(); // ä remplacer par Inversion de dépendance
        return parent::__construct();
    }

    public function getListCategory(): void
    {
        $this->json([
            "data" => $this->categoryModel->getListCategories()
        ]);
    }
}
