PHP Client
================
This is the PHP Client for eMailON's API.

### Install

#### Option A — Via Packagist (recommended)
This package is published on [Packagist](https://packagist.org/packages/emailon-api/php-client)
as `emailon-api/php-client`. Get started by installing it via composer as follows:

```bash
composer require emailon-api/php-client
```

Composer will download the package and generate the autoloader for you, so
`EmailonApi\...` classes are available right away.

#### Option B — Local usage (without Packagist)
If you'd rather not depend on Packagist — e.g. for an internal fork, or before
the package is published/updated there — you can pull this repository directly
into your own project instead. Pick one of the two sub-options below.

##### B1 — Composer "path" repository
Clone/download this repository somewhere in your project, e.g. into
`libs/emailon-php-client`, then in your **own** project's `composer.json` add:

```json
{
    "repositories": [
        {
            "type": "path",
            "url": "libs/emailon-php-client"
        }
    ],
    "require": {
        "emailon-api/php-client": "*"
    }
}
```

Then run:
```bash
composer update
```
Composer will symlink the local folder in and generate the autoloader for you,
so `EmailonApi\...` classes are available exactly like a normal package.

##### B2 — Manual include (no Composer at all)
If you don't want to touch Composer, download/clone this repository and
`require` a tiny autoloader in your bootstrap file:

```php
<?php
spl_autoload_register(function (string $class): void {
    $prefix = 'EmailonApi\\';
    if (strncmp($prefix, $class, strlen($prefix)) !== 0) {
        return;
    }
    $relative = substr($class, strlen($prefix));
    $file = '/absolute/path/to/emailon-php-client/src/' . str_replace('\\', '/', $relative) . '.php';
    if (is_file($file)) {
        require $file;
    }
});
```

Either way, then follow the instructions from `example/setup.php` file.

### Requirements
- PHP 8.2 or newer
- `ext-curl`
- `ext-json`

If you want to use the in-memory cache adapter, install `ext-apcu`. The legacy XCache adapter is no longer supported.

## Test
Following environment variables have to be set, with their proper values:  
`EMAILON_API_URL`  
`EMAILON_API_KEY`  

Then you can run the tests:
```bash
$ composer test
``` 

The API-backed endpoint tests are kept separately because they require a real MailWizz API URL and key:

```bash
$ composer test-integration
```

### Development
The `2.x` branch targets PHP 8.2+ and includes the following maintenance commands:

```bash
$ composer analyse
$ composer refactor-dry-run
$ composer refactor
```
