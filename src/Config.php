<?php

namespace Denour\Mailer;

class Config
{
    public $Host = 'smtp.gmail.com';
    public $SMTPSecure = 'tls';
    public $MailPort = 587;
    public $Email;
    public $Password;
    public $Name;
    public $SMTPAuth = true;
}