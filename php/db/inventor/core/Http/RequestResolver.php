<?php

declare(strict_types=1);

namespace Codemdg\Core\Http;

use Codemdg\Core\Dto\RequestDto;
use Exception;
use ReflectionClass;

class RequestResolver
{
    public function __construct(private array $routes) {}

    public function resolve(string $requestUri)
    {
        $isRouteExists = false;
        /** @var RequestDto $route */
        foreach ($this->routes as $route) {
            if ($route->url === $requestUri) {
                $isRouteExists = true;
                $reflectionClassController = new ReflectionClass($route->className);
                $controllerInstance = $reflectionClassController->newInstance();
                $methodController = $reflectionClassController->getMethod($route->methodName);
                $methodController->invoke($controllerInstance);
                break;
            }
        }

        if(!$isRouteExists){
            throw new Exception("Url not found");
        }
    }
}
