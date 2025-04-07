# Config

A simple but efficient config manager for PHP applications. 

**Key Features**:

1. Load from json config files
2. Protect values against changes

## Installation

```bash
composer install phpallas/config
```

## Usage

```php
use PHPallas\Config\ConfigFactory;
use PHPallas\Config\ConfigDirector;

$builder = new ConfigFactory();
$director = new ConfigDirector($builder);
$config = $director->build(/*directory of config files*/$directory);
```