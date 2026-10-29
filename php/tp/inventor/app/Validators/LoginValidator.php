<?php

declare(strict_types=1);

namespace Codemdg\Inventor\Validators;

class LoginValidator implements ValidatorInterface{
    private array $errors = [];

    public function isValid(array $data):bool
    {
        if (empty($data['email'])) {
            $this->errors['emailError'] = "Email is requred";
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['emailError'] = "Invalid email format";
        }

        // 2. Validation du mot de passe
        if (empty($data['password'])) {
            $this->errors['passwordError'] = "Password is required";
        }

        return empty($this->errors);
    }

    public function getErrors():array
    {
        return $this->errors;
    }
}