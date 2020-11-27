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

Publish the view:
```
php artisan vendor:publish --force --provider=Mastani\NovaPasswordReset\ToolServiceProvider
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

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
