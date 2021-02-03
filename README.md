# Secret Santa
A Secret Santa matching tool for families, friends, etc.

### Features
- Integrated with Twilio for texting support.
- Easy-to-use, and fun.

### Basic Usage
To begin, include the library source of your choosing, whether that be the texting package or the basic implementation. Afterwards, you can provide a list of people
to pair with one another for the holidays.

```php
require_once('src/SecretTexter.php');

// Create our new cheerful instance.
(new SecretSanta())
    ->setSiblings([
        'John' => '##########',
        'Jane' => '##########',
        'Henry' => '##########',
    ])->intrude();
```

After running the example above, you should see your matches displayed on the screen. To provide an additional layer of mystery, you can optionally use the texting
library (powered by Twilio), to discretely deliver results to each person.

```php
require_once('src/SecretTexter.php');

// Create our new illusive instance.
(new SecretTexter())
    ->setSiblings([
        'John' => '##########',
        'Jane' => '##########',
        'Henry' => '##########',
    ])->setTwilioPhone('##########')
        ->setTwilioSid('##################################')
        ->setTwilioToken('################################')
        ->intrude();
```
