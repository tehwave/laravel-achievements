# Laravel Achievements

Super Simple Achievements.

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![StyleCI](https://styleci.io/repos/178260666/shield)](https://styleci.io/repos/178260666)
[![Quality Score](https://img.shields.io/scrutinizer/g/tehwave/laravel-achievements.svg?style=flat-square)](https://scrutinizer-ci.com/g/tehwave/laravel-achievements)

## Requirements

- Laravel 5.7
- PHP 7.2

The package supports the above versions, but may work on older or newer versions.

## Installation

Install the package via Composer.

```bash
composer require tehwave/laravel-achievements
```

Publish migrations.

```bash
php artisan vendor:publish --tag="achievements-migrations"
```

Migrate the migrations.

```bash
php artisan migrate
```

As an optional choice, you may publish config as well.

```bash
php artisan vendor:publish --tag="achievements-config"
```

## Usage

`Laravel Achievements` work much like Laravel's notifications.

### Creating Achievements

```bash
php artisan make:achievement UsersFirstPost
```

This command will place a fresh `Achievement` class in your new `app/Achievements` directory. Each `Achievement` class contains a `toDatabase` method, that you may use to store additional data with the achievement, and a couple of variables for meta information.

### Unlocking Achievements

Use `Achiever` trait on entities that can unlock achievements.

```php
<?php

namespace App;

use tehwave\Achievements\Traits\Achiever;

class User
{
    use Achiever;

    // ...
}
```

*Achieve* an achievement via the `achieve` method.

```php
$user = App\User::find(1);

$user->achieve(new \App\Achievements\UsersFirstPost());
```

...or use `Achievement` class to unlock achievements.

```php
$user = App\User::find(1);

tehwave\Achievements\Achievement::unlock($user, new \App\Achievements\UsersFirstPost());
```

### Accessing Achievements

Retrieve all of the entity's unlocked achievements.

```php
$user = App\User::find(1);

$user->achievements()->get();
```

## Tests

There are no tests for this package as I don't know how to write them.

However, the package is stable ~~enough~~ for a production environment. Case in point, I'm using it for [gm48.net](https://gm48.net), which is written in Laravel 5.7 and running on PHP 7.2.

## Security

For any security related issues, send a mail to [peterchrjoergensen+achievements@gmail.com](mailto:peterchrjoergensen+achievements@gmail.com) instead of using the issue tracker.

## Changelog

See [CHANGELOG](CHANGELOG.md) for details on what has changed.

## Credits

- [Peter Jørgensen](https://github.com/tehwave)
- [All Contributors](../../contributors)

## About

I organize the [gm(48)](https://gm48.net), a quarterly 48 hours GameMaker game jam, and I work as a Web Developer in Denmark on Laravel and WordPress websites.

Follow me [@tehwave](https://twitter.com/tehwave) on Twitter!

## License

[MIT License](LICENSE)