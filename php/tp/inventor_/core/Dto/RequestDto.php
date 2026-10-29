<?php

declare(strict_types=1);

namespace Codemdg\Core\Dto;

final class RequestDto{

    public function __construct(
        private string $url,
        private string $className,
        private string $methodName,
        private string $routeName,
        private string $methodHttp
    )
    {
    }

    public function getRouteName():string
    {
        return $this->routeName;
    }

    public function getClassName():string
    {
        return $this->className;
    }

    public function getUrl():string
    {
        return $this->url;
    }

    public function getMethodName():string
    {
        return $this->methodName;
    }

    public function getMethodHttp():string
    {
        return $this->methodHttp;
    }
}