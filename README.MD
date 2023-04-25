# Werify/Laravel 
**[werify/laravel](https://github.com/Werify/laravel)** is a library for connecting with Werify services (see more https://werify.net/).

## Requirements
- PHP 8.0 and above.
- Built-in libcurl support.
- Laravel 7

## Installation
For running this example, you need to install `werify/laravel` library before. It can be done by two different methods:

### 1. Using Composer
You can install the library via [Composer](https://getcomposer.org/). If you don't already have Composer installed, first install it by following one of these instructions depends on your OS of choice:
* [Composer installation instruction for Windows](https://getcomposer.org/doc/00-intro.md#installation-windows)
* [Composer installation instruction for Mac OS X and Linux](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)

After composer is installed, Then run the following command to install the Omise-PHP library:

```
php composer.phar install
```

Please see configuration section below for configuring your Omise Keys.

### 2. Manually

If you're not using Composer, you can also clone `werify/id-laravel` repository into the directory of sample code that you just installed this repository:

```
git clone https://github.com/Werify/laravel/
```

However, using Composer is recommended as you can easily keep the library up-to-date. After cloning the repository, you need to replace line 3 in `config.php` from
```php
3: require_once 'vendor/autoload.php';
```

to

```php
3: require_once 'werify/laravel';
```

Please see configuration section below for configuring your Omise Keys.

## Configuration
After you installed `werify/laravel` library already. Next, you need to **configure** laravel. you can publish configuration files and see config in `config/werify` config file.

## Usage
this package publishes routes and jobs to connect to werify service. 

you can see [changelog](CHANGELOG.MD) here.