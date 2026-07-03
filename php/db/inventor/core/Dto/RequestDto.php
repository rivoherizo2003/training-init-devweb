<?php

declare(strict_types=1);

namespace Codemdg\Core\Dto;

final class RequestDto{
    public function __construct(
        public private(set) string $url,
        public private(set) string $className,
        public private(set) string $methodName,
        public private(set) string $routeName,
        public private(set) string $methodHttp
    )
    {
    }
}