<?php

declare(strict_types=1);

namespace Codemdg\Core\Controllers;

use Codemdg\Core\Views\BlockBuilder;
use Codemdg\Inventor\Dtos\Response\PaginationResponseDto;
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
            extract($parameters); // $message = ""
        }

        try {
            require_once ROOT . "/app/Views/" . $view;
            require_once ROOT . "/app/Views/" . BlockBuilder::getParentView();
        } catch (\Throwable $th) {
            throw new Exception("View should be in app/Views/$view. Error: " . $th->getMessage());
        }
    }

    public function redirectToUrl(string $url): void
    {
        header("Location: $url");
        exit();
    }

    private function requireAuth(): void
    {
        if (!isset($_SESSION["account_id"])) {
            $this->redirectToUrl(URL_LOGIN);
        }
    }

    public function json(array|PaginationResponseDto $data): void
    {
        header("Content-Type: application/json; charset=utf-8");

        echo json_encode($data);

        exit();
    }
}
