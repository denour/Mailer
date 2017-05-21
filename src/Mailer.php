<?php

namespace Denour\Mailer;

use PHPMailer;

class Mailer
{
    private $Configuration;
    private $PhpMailer;

    public function __construct(Config $config)
    {
        try {
            $this->PhpMailer = new PHPMailer;
        } catch (\Exception $exception) {
            error_log($exception->getMessage());
        }

        $this->Configuration = $config;
        $this->PhpMailer->IsSMTP();
        $this->PhpMailer->Host = $this->Configuration->Host;
        $this->PhpMailer->SMTPAuth = $this->Configuration->SMTPAuth;
        $this->PhpMailer->SMTPSecure = $this->Configuration->SMTPSecure;
        $this->PhpMailer->Port = $this->Configuration->MailPort;
        $this->PhpMailer->Username = $this->Configuration->Email;
        $this->PhpMailer->Password = $this->Configuration->Password;
        $name = $this->Configuration->Name ? $this->Configuration->Name : '';
        $this->PhpMailer->SetFrom($this->Configuration->Email, $name);
    }

    public function send(Email $email)
    {
        $this->PhpMailer->Subject = $email->Subject;
        $this->PhpMailer->AltBody = $email->AltBody;
        $this->PhpMailer->MsgHTML($email->Body);

        foreach ($email->getReceivers() as $address) {
            $this->PhpMailer->AddAddress($address->Email, $address->Name);
        }

        try {
            $this->PhpMailer->send();
        } catch (\Exception $exception) {
            error_log($exception->getMessage());
        }

    }
}