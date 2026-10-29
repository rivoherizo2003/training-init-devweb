<?php

declare(strict_types=1);
require_once("NotifierRequestDto.php");

class NotifierRequestFactory{
    public function createFromPayload(array $data):NotifierRequestDto
    {
        //Sanitization
        $rawPhoneNumber = trim((string) $data["phone-number"] ?? "");
        $phoneNumber = htmlspecialchars($rawPhoneNumber);

        $rawEmail = trim((string) $data['email']);
        $email = htmlspecialchars($data['email']);

        $rawMessageContent = trim((string) $data['email']);
        $messageContent = htmlspecialchars($data['message-content']);

        $notifierProvider = $data['notifier-provider'];

        if(empty($messageContent)){
            throw new InvalidArgumentException("Le message ne peut être vide");
        }

        return new NotifierRequestDto(
            $email,
            $phoneNumber,
            $messageContent,
            $notifierProvider
        );
    }
}