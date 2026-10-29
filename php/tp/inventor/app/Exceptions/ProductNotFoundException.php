<?php

declare(strict_types=1);

namespace Codemdg\Inventor\Exceptions;

use Exception;
use Throwable;

class ProductNotFoundException extends Exception
{

    public function __construct(string $message = "", int $code = 0, Throwable|null $previous = null)
    {
        return parent::__construct($message, $code, $previous);
    }
}
