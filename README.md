## Bugsnag for the Laminas Framework

### Bugsnag?
Bugsnag integration for the Laminas Framework gives you instant notifications of the errors in your application. You can create a free plan/account on the [bugsnag](https://bugsnag.com) website.

### Install
#### Installation with the composer
```sh
composer require catch-e/laminas-bugsnag
```

### Requirements

* PHP 8.0+
* [Laminas Framework](https://getlaminas.org)
* [Bugsnag PHP API](https://github.com/bugsnag/bugsnag-php)

### Post Installation

Enable it in your `application.config.php` (or `modules.config.php`) file
```php
<?php

// application.config.php
return [
    'modules' => [
        'CatchE\Laminas\Bugsnag', // Must be added as the first module
        // ...
    ],
    // ...
];

// modules.config.php
return [
    'CatchE\Laminas\Bugsnag', // Must be added as the first module

    // ...
];


```
### Configuration

Copy the `config/laminas-bugsnag.local.php` file to your `config/autoload` folder and change the settings (Enabled/ApiKey)