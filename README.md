# Programic - Automatic task runner

[![Latest Version on Packagist](https://img.shields.io/packagist/v/programic/laravel-task.svg?style=flat-square)](https://packagist.org/packages/programic/laravel-task)
![](https://github.com/programic/laravel-task/workflows/Run%20Tests/badge.svg?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/programic/laravel-task.svg?style=flat-square)](https://packagist.org/packages/programic/laravel-task)

This package allows you to automate tasks as in migrations

### Installation
This package requires PHP 7.2 and Laravel 5.8 or higher.

```
composer require programic/laravel-triggers
```

### Basic Usage
```bash
# Create Trigger
php artisan make:triggers UpdateColumnWhenRowDeletedTrigger
```

# Use trigger in migration file
```php
Schema::createTrigger(UpdateColumnWhenRowDeletedTrigger::class);
Schema::createTriggerWhenNotExists(UpdateColumnWhenRowDeletedTrigger::class);

Schema::trigger(function (Trigger $trigger) {
    
});
```


### Testing
```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security-related issues, please email [info@programic.com](mailto:info@programic.com) instead of using the issue tracker.

## Credits

- [Rick Bongers](https://github.com/rbongers)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.