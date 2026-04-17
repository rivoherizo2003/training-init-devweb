<?php

declare(strict_types=1);

interface NotifierProviderInterface{
    function send(NotifierRequestDto $notifierRequestDto):void;
}