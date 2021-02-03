<?php

require_once(__DIR__ . '/vendor/autoload.php');
require_once('src/SecretSanta.php');
require_once('src/SecretTexter.php');

// Create our new cheerful instance.
(new SecretTexter())
    ->setSiblings([
        'John' => '##########',
        'Jane' => '##########',
        'Henry' => '##########',
    ])->setTwilioPhone('##########')
        ->setTwilioSid('##################################')
        ->setTwilioToken('################################')
        ->intrude();