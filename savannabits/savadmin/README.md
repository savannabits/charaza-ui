# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/savannabits/savadmin.svg?style=flat-square)](https://packagist.org/packages/savannabits/savadmin)
[![Build Status](https://img.shields.io/travis/savannabits/savadmin/master.svg?style=flat-square)](https://travis-ci.org/savannabits/savadmin)
[![Quality Score](https://img.shields.io/scrutinizer/g/savannabits/savadmin.svg?style=flat-square)](https://scrutinizer-ci.com/g/savannabits/savadmin)
[![Total Downloads](https://img.shields.io/packagist/dt/savannabits/savadmin.svg?style=flat-square)](https://packagist.org/packages/savannabits/savadmin)

Savadmin is a lightweight admin CRUD generator built on top of [Laravel 7.*](https://laravel.com) and [bootstrap-vue](https://bootsdtrap-vue.org) frontend. It also has support for [CoreUI](https://coreui.io) in when scaffolding the views.
All you need to do is write the migrations and run them, from there the package can generate for you every module one by one.
## Features
- Model Generator with support for relationships (belongsTo and belongsToMany) as well as casts (Boolean and dates)
- Admin Controller Generator with a function to render DataTables using [Yajra Laravel DataTables](https://yajrabox.com/docs)
- API Resource Controller with index, dt(datatables), store, show, update and destroy functions.
- API StoreRequest - Request files for the API controllers to authorize and validate resource storage.
- API UpdateRequest - Request files for the API controllers to authorize and validate resource update.
- Appending menus to the sidebar
- Index view generator
- Form generator for creating and editing resources using bootstrap vue modals and axios for submission to the API
- Javascript form module generation to handle form inputs and submission

## Installation

You can install the package via composer:

```bash
composer require savannabits/savadmin
```
```bash
php artisan vendor:publish
```


## Usage

``` php
// Usage description here
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email maosa.sam@gmail.com instead of using the issue tracker.

## Credits

- [Sam Maosa](https://github.com/savannabits)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
