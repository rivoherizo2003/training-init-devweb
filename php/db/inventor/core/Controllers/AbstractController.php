<?php

declare(strict_types=1);

namespace Codemdg\Core\Controllers;

use Codemdg\Core\Views\BlockBuilder;
use Exception;

abstract class AbstractController
{
    public function render(string $view, array $parameters = [])
    {
        if (!empty($parameters)) {
            extract($parameters);
        }

        try {
            require ROOT . "/app/Views/" . $view;
            require ROOT . "/app/Views/" . BlockBuilder::getParentView();
        } catch (\Throwable $th) {
            throw new Exception("View should be in /app/Views/$view. Error:" . $th->getMessage());
        }
    }
}
