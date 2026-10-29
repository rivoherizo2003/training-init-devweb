<?php

declare(strict_types=1);

namespace Codemdg\Core\Http;

use Codemdg\Core\Dto\RequestDto;
use Exception;
use ReflectionClass;

class RequestResolver{
    public function __construct(private array $routes)
    {
    }

    public function resolve(string $requestUrl)
    {
        $isRouteExists = false;
        /** @var RequestDto $route */
        foreach ($this->routes as $route) {
        if($route->getUrl() === $requestUrl){
                $isRouteExists = true;
                $reflectionClassController = new ReflectionClass($route->getClassName());
                $controllerObj = $reflectionClassController->newInstance();
                $methodActionController = $reflectionClassController->getMethod($route->getMethodName());//showLogin
                
                $methodActionController->invoke($controllerObj);
                break;
            }
        }

        if(!$isRouteExists){
            throw new Exception("Url not found");
        }
    }
}