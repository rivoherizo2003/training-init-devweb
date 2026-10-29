<?php
declare(strict_types=1);

class ConnectDB
{
    protected function connect(): void
    {
        try {
            $pdo = new PDO("mysql:host=mysql;dbname=samples", "inventor", "0000");
        } catch (PDOException $e) {
            throw $e;
        }
    }
}

class TransactionModel extends ConnectDB{
    public function list():array
    {
        $this->connect();

        return [];
    }

    public function add():void
    {
        $this->connect();
    }
}
