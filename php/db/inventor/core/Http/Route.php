<?php

declare(strict_types=1);

namespace Codemdg\Core\Http;

use Codemdg\Core\Dto\RequestDto;

final class Route{
    /**
     * @var RequestDto[]
     */
    private static array $routes = [];

    public static function add(string $url, string $className, string $methodName, string $methodHttp = 'GET'){
        self::$routes[] = new RequestDto(
            url: $url,
            className: $className,
            methodName: $methodName,
            methodHttp: $methodHttp
        );
    }

    public static function getRoutes():array
    {
        return self::$routes;
    }
}