<?php

namespace Denour\Mailer;

class Email
{
    public $Title;
    public $Subject;
    public $Body;
    public $AltBody;
    private $Receivers = [];

    public function AddPerson($email, $name = '') {
        $receiver = new \stdClass();
        $receiver->Email = $email;
        $receiver->Name = $name;
        $this->Receivers[] = $receiver;
    }

    public function getReceivers()
    {
        return $this->Receivers;
    }
}