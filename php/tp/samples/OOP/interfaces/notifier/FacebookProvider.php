<?php

declare(strict_types=1);

require_once("NotifierProviderInterface.php");

class FacebookProvider implements NotifierProviderInterface
{
    public function send(NotifierRequestDto $notifierRequestDto): void
    {
        echo "<p>Notification par Facebook envoyée!</p>";
        echo "<p>";
        echo "N° Tel: " . $notifierRequestDto->getPhoneNumber() . "<br>";
        echo "Email: " . $notifierRequestDto->getEmail() . "<br>";
        echo "Message: " . $notifierRequestDto->getMessageContent() . "<br>";
        echo "</p>";
        echo "<p>==========================</p>";
    }
}
