<?php

declare(strict_types=1);

readonly class NotifierRequestDto{
    public function __construct(
        private string $email,
        private string $phoneNumber,
        private string $messageContent,
        private string $notifierProvider
    )
    {
    }

    public function getEmail():string{
        return $this->email;
    }

    public function getPhoneNumber():string{
        return $this->phoneNumber;
    }

    public function getMessageContent():string{
        return $this->messageContent;
    }

    public function getNotifierProvider():string{
        return $this->notifierProvider;
    }
}