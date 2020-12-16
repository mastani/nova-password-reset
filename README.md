# Laravel Nova Password Reset Tool

This is a package for [Laravel Nova](https://nova.laravel.com/) which allows you to easily reset your nova password.

[![Total Downloads](https://poser.pugx.org/mastani/nova-password-reset/downloads)](https://packagist.org/packages/mastani/nova-password-reset)
[![Latest Stable Version](https://poser.pugx.org/mastani/nova-password-reset/v/stable)](https://packagist.org/packages/mastani/nova-password-reset)
[![Latest Unstable Version](https://poser.pugx.org/mastani/nova-password-reset/v/unstable)](https://packagist.org/packages/mastani/nova-password-reset)
[![License](https://poser.pugx.org/mastani/nova-password-reset/license)](https://packagist.org/packages/mastani/nova-password-reset)

## Screeenshots

![Laravel Nova Password Reset](https://raw.githubusercontent.com/mastani/nova-password-reset/master/screenshot.jpg "Laravel Nova Password Reset")

## Requirements

* PHP >= 7.1
* [Laravel](https://laravel.com/) application with [Laravel Nova](https://nova.laravel.com/) installed

### Installation

Install the package via composer:
```bash
$ composer require mastani/nova-password-reset
```

Publish the view (Will overwrite 'user.blade.php' which is provided by nova):
```
php artisan vendor:publish --force --provider="Mastani\NovaPasswordReset\ToolServiceProvider" --tag="nova-views"
```

Register the tool in the `tools` method of the `NovaServiceProvider`:
```
// app/Providers/NovaServiceProvider.php

// ...

public function tools()
{
    return [
        // ...
        new \Mastani\NovaPasswordReset\NovaPasswordReset,
    ];
}
```

## Customizations (Optional)

If you want to specify the min length of password you can publish the config file:
```
php artisan vendor:publish --provider="Mastani\NovaPasswordReset\ToolServiceProvider" --tag="config"
```

Now head over to "config/nova-password-reset.php" and you can change the value:
```
'min_password_size' => 5
```
___
You can also use English or Portuguese language or add your own translation:
```
php artisan vendor:publish --provider="Mastani\NovaPasswordReset\ToolServiceProvider" --tag="translations"
```

## Contributors
[Amin Mastani](https://github.com/mastani)

[Newton Evangelista](https://github.com/newtongamajr)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
