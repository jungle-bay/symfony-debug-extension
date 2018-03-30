<p align="center">
    <a href="https://github.com/jungle-bay/symfony-debug-extension">
        <img width="128" height="128" src="logo.png" alt="Symfony Debug Extension Logo">
    </a>
</p>

# Symfony Debug Extension

[![Travis CI](https://img.shields.io/travis/jungle-bay/symfony-debug-extension.svg?style=flat)](https://travis-ci.org/jungle-bay/symfony-debug-extension)
[![Scrutinizer CI](https://img.shields.io/scrutinizer/g/jungle-bay/symfony-debug-extension.svg?style=flat)](https://scrutinizer-ci.com/g/jungle-bay/symfony-debug-extension)
[![Codecov](https://img.shields.io/codecov/c/github/jungle-bay/symfony-debug-extension.svg?style=flat)](https://codecov.io/gh/jungle-bay/symfony-debug-extension)

Package description. <br />
Where can I see the documentation, example.

### Prerequisites

   - PHP 5.5 or above.
   - ***.

### Install (Under development, not yet available)

The recommended way to install is through [Composer](https://getcomposer.org/doc/00-intro.md#introduction):

```bash
composer require jungle-bay/symfony-debug-extension
```

### The simplest example of use

```php
<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, array('vendor', 'autoload.php'));

$errorHandler = \Symfony\Component\Debug\Extension\ErrorHandler(new SimpleStrategy());
$errorHandler::registerExtension($errorHandler);

$errorHandler->registerHandler(new \Acme\Handlers\ExceptionHandler(), Exception::class);

throw new \Exception('Hello world.');
```

### Docs

See the complete docs in [here](https://github.com/jungle-bay/symfony-debug-extension/blob/master/docs).

### Note

* .
* .

### License

This bundle is under the [MIT license](http://opensource.org/licenses/MIT). See the complete license in the file: [here](https://github.com/jungle-bay/symfony-debug-extension/blob/master/license.txt).
