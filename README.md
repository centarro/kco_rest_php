## Introduction

This is an unofficial, community maintained fork of the deprecated official Klarna PHP SDK.

## Shop now. Pay later.

Shop at your favorite stores today and experience the freedom to pay later with Klarna.

## Getting started

SDK covers all of Klarna API: https://developers.klarna.com/api/

### Prerequisites
* PHP 7.1 or above
* [API credentials](#api-credentials)
* [Composer](https://getcomposer.org/) (optional)


### API Credentials

Before getting a production account you can get a playground one.
Register here to be able to test your SDK integration before go live:

- https://playground.eu.portal.klarna.com/developer-sign-up - for EU countries
- https://playground.us.portal.klarna.com/developer-sign-up - for the US


## PHP SDK Installation and Usage

### Install via Composer

To install the PHP SDK from the Central Composer repository use composer:

```shell
composer require centarro/kco_rest
```

Highly recommended to use version tag when installing SDK.

```shell
composer require centarro/kco_rest:1.2.3.4
```

Detailed information about the PHP SDK package and a list of available versions can be found here:
https://packagist.org/packages/klarna/kco_rest

Include the SDK into your PHP file using the Composer autoloader:

```php
<?php

require('vendor/autoload.php');
```

### Manual installation

To install the PHP SDK manually you need to clone the repo to any folder on your machine:
```shell
git clone git@github.com:centarro/kco_rest_php.git /path/to/some/folder/kco_rest_php
```

Include the SDK into your PHP file using the SDK autoloader:
```php
<?php

require('/path/to/some/folder/kco_rest_php/src/autoload.php');
```

---
⚠️**Warning**: Using manually installed SDK requires you to use the CURLTransport instance to send HTTP requests.

Read more about [How to use HTTP Transport](docs/http_transport.md)

## Documentation and Examples

Klarna API documentation: https://developers.klarna.com/api/  
SDK References: https://klarna.github.io/kco_rest_php/


Example files can be found in the [docs/](docs/) directory.  
Additional documentation can be found at https://developers.klarna.com.


## Logging and Debugging

PHP SDK logs information to STDOUT/STDERR. To enable debug mode, set DEBUG_SDK environment variable:

```shell
$ DEBUG_SDK=true php <your_program.php>
```

or

```shell
$ export DEBUG_SDK=1
$ php <your_program.php>
```

Another way to enable Debugging Mode is `define` the **DEBUG_SDK** inside your script:

```php
<?php
// some code here
define('DEBUG_SDK', true);
// some code here
```

**Be aware, the SDK just checks if the `DEBUG_SDK` is defined! It means you will see the debug information
by using `define('DEBUG_SDK', false);` or `export DEBUG_SDK=no`**

More information about the DEBUG_SDK flag can be found here: https://github.com/klarna/kco_rest_php/issues/32

The output will look like:

```
DEBUG MODE: Request
>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    GET : https://api.playground.klarna.com/customer-token/v1/tokens/TOKEN
Headers : {"User-Agent":["Library\/Klarna.kco_rest_php_3.1.0 (Guzzle\/6.3.3; curl\/7.54.0) OS\/Darwin_17.5.0 Language\/PHP_5.6.37"]}
   Body :

DEBUG MODE: Response
<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
Headers : {"Content-Type":["application\/json"],"Date":["Wed, 15 Aug 2018 15:55:53 GMT"],"Klarna-Correlation-Id":["ABC-123"],"Server":["openresty"],"Content-Length":["62"],"Connection":["keep-alive"]}
   Body : {
     "status" : "ACTIVE",
     "payment_method_type" : "INVOICE"
   }
```
