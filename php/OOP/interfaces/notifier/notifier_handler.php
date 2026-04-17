<?php
require_once("NotifierRequestFactory.php");
require_once("EmailProvider.php");
require_once("SmsProvider.php");
require_once("FacebookProvider.php");
require_once("LinkedinProvider.php");
$notifierRequestFactory = new NotifierRequestFactory();
try {
    $notifierRequestDto = $notifierRequestFactory->createFromPayload($_POST);
    $provider = match ($notifierRequestDto->getNotifierProvider()) {
         "EMAIL"=> new EmailProvider(),
         "SMS" => new SmsProvider(),
         "FACEBOOK" => new FacebookProvider(),
         "LINKEDIN" => new LinkedinProvider(),
         default => new EmailProvider()
    };
    
    $provider->send($notifierRequestDto);

} catch (\InvalidArgumentException $exception) {
    echo "Erreur de traitement: " . $exception->getMessage();
}
