<?php

declare(strict_types=1);

namespace Codemdg\Inventor\Validators;

interface ValidatorInterface
{
    function isValid(array $data): bool;

    function getErrors(): array;
}
