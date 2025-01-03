# Laravel Debugbar Query Logging for Doctrine

A package that provides Doctrine DBAL middleware integration with Laravel Debugbar for query logging and performance profiling.

## Installation

Install the package via Composer:

```bash
composer require cheack/debugbar-doctrine
```

## Usage

1. Register the middleware in your Doctrine configuration (`config/doctrine.php`):

```php
'managers' => [
    'default' => [
        ...
        'middlewares' => [
            \Cheack\DebugbarDoctrine\Middleware\Middleware::class,
        ],
    ],
],
```

2. The middleware will automatically start logging your Doctrine queries to Laravel Debugbar.

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This package is open-sourced software licensed under the MIT license.
