<?php

declare(strict_types=1);

namespace Codemdg\Core\Models;

use Codemdg\Core\Connectors\DatabaseContext;
use PDO;

abstract class AbstractModel{
    
    protected PDO $pdo;

    public function __construct()
    {
        $this->pdo = DatabaseContext::getInstance()->getPDO();
    }
}