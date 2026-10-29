<?php

declare(strict_types=1);

namespace Codemdg\Inventor\Exceptions;

use Exception;
use Throwable;

class InvalidFileFormatException extends Exception{
    public function __construct(string $message = "", int $code = 0, Throwable|null $previous = null)
    {
        $message = "Error: File format not authorized. $message";
        return parent::__construct($message, $code, $previous);
    }
}