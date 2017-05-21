#Mailer

###Usage
```
$config = new \Denour\Mailer\Config();
$config->Email = 'email@email.com';
$config->Password = 'Password';
$config->Name = 'Name of the Person';
$mailer = new \Denour\Mailer\Mailer($config);

$mail = new \Denour\Mailer\Email();
$mail->Subject = 'Test';
$mail->Body = 'This is a email full of test';
$mail->AddPerson('sendemail@email.com', 'Person');

$mailer->send($mail);
```
