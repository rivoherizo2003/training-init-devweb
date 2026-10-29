<?php

declare(strict_types=1);

namespace Codemdg\Core\Views;

class BlockBuilder
{
    private static array $block = [];

    private static ?string $parentView = "index.php";

    private static ?string $currentBlock = null;

    public static function startBlock(string $name):void
    {
        self::$currentBlock = $name;
        ob_start();
    }

    public static function endBlock():void
    {
        if(null !== self::$currentBlock){
            self::$block[self::$currentBlock] = ob_get_clean();
            self::$currentBlock = null;
        }
    }

    public static function renderBlock(string $name, string $defaultContent = ""):string
    {
        return self::$block[$name] ?? $defaultContent;
    }

    public static function getParentView():string
    {
        return self::$parentView;
    }

    public static function extends(string $parentView):void
    {
        self::$parentView = $parentView;
    }

    public static function include(string $viewPath):void
    {
        include ROOT . "/app/Views/" . $viewPath;
    }
}
