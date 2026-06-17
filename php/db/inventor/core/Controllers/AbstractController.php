<?php

declare(strict_types=1);

namespace Codemdg\Core\Controllers;

abstract class AbstractController{
    public function render(string $view, array $parameters = [])
    {
        $parentView = "default.php";
        if(!empty($parameters)){
            extract($parameters);
        }

        require ROOT . "/app/Views/". $view;

        require ROOT . "/app/Views/{$parentView}";
    }
}