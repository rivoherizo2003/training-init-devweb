<?php

declare(strict_types=1);

namespace Codemdg\Core\Dto;

class DbConnectorDto{
    public function __construct(private string $serverName, private string $dbname,
    private string $username,
    private string $dbpassword) {
    }

    public function getServerName():string
    {
        return $this->serverName;
    }

    public function getDbname():string
    {
        return $this->dbname;
    }

    public function getUsername():string
    {
        return $this->username;
    }

    public function getDbpassword():string
    {
        return $this->dbpassword;
    }
}