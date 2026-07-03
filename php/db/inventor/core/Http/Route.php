<?php

declare(strict_types=1);

namespace Codemdg\Core\Http;

use Codemdg\Core\Dto\RequestDto;
use Exception;

final class Route{
    /**
     * @var RequestDto[]
     */
    private static array $routes = [];

    public static function add(string $url, string $className, string $methodName, string $routeName, string $methodHttp = 'GET'):void
    {
        self::$routes[] = new RequestDto(
            url: $url,
            className: $className,
            methodName: $methodName,
            routeName: $routeName,
            methodHttp: $methodHttp
        );
    }

    public static function getRoutes():array
    {
        return self::$routes;
    }

    public static function generateUrl(string $routeName):string
    {
        $url = null;
        foreach(self::$routes as $route){
            if($route->routeName === $routeName){
                $url = $route->url;
                break;
            }
        }

        if(null === $url){
            throw new Exception("Route name $routeName does not exist");
        }

        return $url;
    }
}