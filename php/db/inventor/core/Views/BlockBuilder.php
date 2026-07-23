<?php

declare(strict_types=1);

namespace Codemdg\Core\Views;

class BlockBuilder
{
    private static array $blocks = [];

    private static ?string $currentBlock = null;

    private static ?string $parentView = "default.php";

    public static function startBlock(string $name): void
    {
        self::$currentBlock = $name;
        ob_start();
    }

    public static function endBlock(): void
    {
        if (null !== self::$currentBlock) {
            self::$blocks[self::$currentBlock] = ob_get_clean();
            self::$currentBlock = null;
        }
    }

    public static function renderBlock(string $name, string $defaultContent = "No content"): String
    {
        return self::$blocks[$name] ?? $defaultContent;
    }

    public static function extends(string $parentView)
    {
        self::$parentView = $parentView;
    }

    public static function getParentView():string
    {
        return self::$parentView;
    }
}
