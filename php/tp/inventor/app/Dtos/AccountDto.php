<?php

declare(strict_types=1);

namespace Codemdg\Inventor\Dtos;

class AccountDto{
    public function __construct(private int $id, private string $username, private string $email, private string $password, private bool $isActive = true)
    {
    }

    public function getId():int
    {
        return $this->id;
    }

    public function getPassword():string
    {
        return $this->password;
    }

    public function getUsername():string
    {
        return $this->username;
    }

    public function getEmail():string
    {
        return $this->email;
    }

    public function isActive():bool
    {
        return $this->isActive;
    }

    public static function fromDatabase(array $data):AccountDto
    {
        return new AccountDto(
            $data['id'],
            $data['username'],
            $data['email'],
            $data['password'],
            $data['is_active'] === 1
        );
    }
}