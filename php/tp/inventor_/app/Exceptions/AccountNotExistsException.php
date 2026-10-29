<?php

declare(strict_types=1);

namespace Codemdg\Inventor\Exceptions;

use Exception;
use Throwable;

class AccountNotExistsException extends Exception{
    function __construct(string $message = "", int $code = 0, Throwable|null $previous = null) {
        $message = "This account does not exist. $message";
        
        return parent::__construct($message, $code, $previous);
    }
}