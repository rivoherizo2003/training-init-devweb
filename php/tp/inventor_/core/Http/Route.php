<?php

declare(strict_types=1);

namespace Codemdg\Core\Http;

use Codemdg\Core\Dto\RequestDto;
use Exception;

class Route
{
    /**
     *
     * @var int[]
     */
    private static array $routes = [];

    public static function add(string $url, string $className, string $methodName, string $routeName, string $methodHttp = 'GET')
    {
        self::$routes[] = new RequestDto(
            $url,
            $className,
            $methodName,
            $routeName,
            $methodHttp
        );
    }

    public static function getRoutes():array
    {
        return self::$routes;
    }

    public static function generateUrl(string $routeName):string
    {
        $url = null;
        /** @var RequestDto $route */
        foreach(self::$routes as $route){
            if($route->getRouteName() === $routeName){
                $url = $route->getUrl();
                break;
            }
        }

        if(null === $url){
            throw new Exception("Route name $routeName does not exist.");
        }

        return $url;
    }
}
