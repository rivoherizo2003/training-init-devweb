<?php

declare(strict_types=1);

namespace Codemdg\Core\Controllers;

use Codemdg\Core\Views\BlockBuilder;
use Exception;

abstract class AbstractController
{
    public function __construct()
    {
        $this->requireAuth();
    }

    public function render(string $view, array $parameters = [])
    {
        if (!empty($parameters)) {
            extract($parameters);
        }

        try {
            require_once ROOT . "/app/Views/" . $view;
            require_once ROOT . "/app/Views/" . BlockBuilder::getParentView();
        } catch (\Throwable $th) {
            throw new Exception("View should be in /app/Views/$view. Error:" . $th->getMessage());
        }
    }

    public function redirectToUrl(string $url): void
    {
        header("Location: $url");
        exit();
    }

    private function requireAuth():void
    {
        if(!isset($_SESSION['account_id'])){
            header("Location: " . URL_LOGIN);
            //after a redirection always put an exit otherwise the rest of the code will be executed by the server
            exit;
        }
    }

    public function json(array $data):void
    {
        header("Content-Type: application/json; charset=utf-8");

        echo json_encode($data);

        exit();
    }
}
