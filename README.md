# Programic - Laravel triggers

[![Latest Version on Packagist](https://img.shields.io/packagist/v/programic/laravel-triggers.svg?style=flat-square)](https://packagist.org/packages/programic/laravel-triggers)
![](https://github.com/programic/laravel-triggers/workflows/Run%20Tests/badge.svg?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/programic/laravel-triggers.svg?style=flat-square)](https://packagist.org/packages/programic/laravel-triggers)

This package allows you to add MySql triggers simplified in migration files.

### Installation
This package requires PHP 8.1 (or higher) and Laravel 10.

```
composer require programic/laravel-triggers
```

Replace alias Schema Facade with our Facade in ``config/app.php``
```
'Schema' => Programic\Triggers\Facades\Schema::class,
```

Add directory to composer autoloader: ``"Database\\Seeders\\": "database/seeders/"``
```
"autoload": {
    "psr-4": {
        "App\\": "app/",
        "Database\\Factories\\": "database/factories/",
        "Database\\Seeders\\": "database/seeders/"
    }
},
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
