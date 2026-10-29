<?php

declare(strict_types=1);

namespace Codemdg\Core\Dto;

class DbConnectorDto{
    public function __construct(
        public private(set) string $serverName,
        public private(set) string $dbname,
        public private(set) string $username,
        public private(set) string $dbpassword
    )
    {
    }
}