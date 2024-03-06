# Third-party PHP SDK for MapIt.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/c6digital/mapit-php.svg?style=flat-square)](https://packagist.org/packages/c6digital/mapit-php)
[![Tests](https://img.shields.io/github/actions/workflow/status/c6digital/mapit-php/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/c6digital/mapit-php/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/c6digital/mapit-php.svg?style=flat-square)](https://packagist.org/packages/c6digital/mapit-php)

This package provides a lightweight SDK to interact with [MapIt](https://mapit.mysociety.org/) APIs. It doesn't have methods for everything, only the things that we as an organisation frequently use.

## Installation

You can install the package via Composer:

```bash
composer require c6digital/mapit-php
```

## Usage

```php
use C6Digital\MapIt\MapIt;

$mapIt = new MapIt(
    key: 'your-mapit-key-here',          // Your MapIt API key / token.
    url: 'https://mapit.mysociety.org'  // An optional MapIt URL.
);
```

### Laravel

If you're using Laravel, this package provides a service provider that automatically registers the `MapIt` class and uses `.env` variables to configure the key and URL.

```sh
MAPIT_KEY=...
MAPIT_URL=...
```

You can then request it from the container when you need to use it.

```php
use C6Digital\MapIt\MapIt;

class MyController
{
    public function __invoke(MapIt $mapIt)
    {
        // ...
    }
}
```

### Retrieving postcodes

```php
$mapIt->postcode('SW1P 3BD');
```

### Throwing when errors occur

```php
$mapIt->throw()->postcode(...);
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Ryan Chandler](https://github.com/c6digital)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
