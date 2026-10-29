<?php

final class TransactionController
{
    protected TransactionModel $transactionModel;

    public function __construct()
    {
        $this->transactionModel = new TransactionModel();
    }

    public function getListTransaction():array
    {
        return $this->transactionModel->list();
    
    }

    public function deleteTransaction():void
    {
        $this->transactionModel->delete();
    }
}
