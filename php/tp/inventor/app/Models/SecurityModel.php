<?php

declare(strict_types=1);

namespace Codemdg\Inventor\Models;

use Codemdg\Core\Models\AbstractModel;
use Codemdg\Inventor\Dtos\AccountDto;
use Codemdg\Inventor\Exceptions\AccountNotExistsException;
use Codemdg\Inventor\Exceptions\InvalidAccessException;
use PDO;

final class SecurityModel extends AbstractModel
{
    public function authenticate(string $email, string $password): AccountDto
    {
        $statement = $this->pdo->prepare("SELECT * FROM account WHERE email = :email;");
        $statement->execute([
            "email" => trim($email)
        ]);

        $result = $statement->fetch(PDO::FETCH_UNIQUE);

        if(!$result){
            throw new AccountNotExistsException();
        }
        
        $accountDto = AccountDto::fromDatabase($result);

        if(!password_verify($password, $accountDto->getPassword())){
            throw new InvalidAccessException();
        }

        return $accountDto;
    }
}
