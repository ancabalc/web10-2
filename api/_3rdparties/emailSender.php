<?php
class externalHelp {

// pentru a folosi mailgun trebuie instalat composer:
// 1.curl -sS https://getcomposer.org/installer | php
// 2.si sa faceti un fisier composer.json daca nu ii facut, si in el puneti:

// {
//     "require": {
//         "monolog/monolog": "1.0.*"
//     }
// }

// 3.dupa ce ati instalat composer trebuie instalat mailgun : php composer.phar require mailgun/mailgun-php php-http/guzzle6-adapter php-http/message

  function signUpSender($name,$message,$email){
require '../vendor/autoload.php';
use Mailgun\Mailgun;

# Instantiate the client.
$mgClient = new Mailgun('key-467433bdbe4bc4ea5a91dba0b85d11a8');
$domain = "sandbox614b8e79f03e4432a6ae9c4eaece1294.mailgun.org";

# Make the call to the client.
$result = $mgClient->sendMessage($domain, array(
    'from'    => 'Sign Up <signup@web-10-2.com>',
    'to'      => "Baz <$email>",
    'subject' => "Welcome $name",
    'text'    => "$message"
));

}
}