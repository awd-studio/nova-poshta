
[![Build Status](https://travis-ci.org/awd-studio/nova-poshta.svg?branch=master)](https://travis-ci.org/awd-studio/nova-poshta)
[![Latest Stable Version](https://poser.pugx.org/awd-studio/nova-poshta/v/stable)](https://packagist.org/packages/awd-studio/nova-poshta)
[![Total Downloads](https://poser.pugx.org/awd-studio/nova-poshta/downloads)](https://packagist.org/packages/awd-studio/nova-poshta)
[![License](https://poser.pugx.org/awd-studio/nova-poshta/license)](https://github.com/awd-studio/nova-poshta/blob/master/LICENSE)


# PHP SDK for Nova Poshta API (alpha)
## Integrate your PHP apps with [Nova Poshta](https://novaposhta.ua) post company API

This open-source library allows you to integrate Nova Poshta API into your apps.


### About Nova Poshta company:

Today Nova Poshta is a leader in express delivery owing to its innovation approach and hard work on efficiency improvement. By anticipating Client needs, the company constantly comes up with new products and services.

Nova Poshta’s business isn’t solely about parcels and cargoes delivery. We pride ourselves in e-commerce market development and deployment of complex technological solutions helping businesses to expand on the international scale.

Nova Poshta puts into your service:

- Over 2500 depots all over Ukraine
- Over 2500 vehicles
- 36 cutting-edge sorting stations
- Over 16 000 qualified employees
- More than 60 million shipments a year
- Over 350 cash desks carrying out money transfers
- Modern logistics complex of 4000 sq. m.
- Transparent fees and loyalty programs
- Dedicated customer service and support
- Track and Trace

*[More information](https://novaposhta.ua/en/o_kompanii/nova_poshta_sogodni).*

## Features
- Track packages
- Getting branch-offices
- ~~Counting delivery cost~~ *(future)*
- ~~Determine the date of delivery~~ *(future)*
- ~~Contingency (TTN) management~~ *(future)*

## Requirements
- PHP v5.5 or higher *(PHP 7+ is recommended)*
- [Composer](https://getcomposer.org) package manager
- An [API token](https://devcenter.novaposhta.ua/blog/%D0%BF%D0%BE%D0%BB%D1%83%D1%87%D0%B5%D0%BD%D0%B8%D0%B5-api-%D0%BA%D0%BB%D1%8E%D1%87%D0%B0)
- [Guzzle](https://github.com/guzzle/guzzle) or [PHP_CURL](http://php.net/manual/book.curl.php) libraries for sending HTTP-requests *(optional - you can define yourself HTTP-driver)*

## Install
```bash
composer require awd-studio/nova-poshta
```

## Usage

**Authorize:**
```php
<?php

use NovaPoshta\Settings\Settings;

$key      = 'myAuthKeyHash';
$settings = Settings::getInstance()->auth($key);
```

**Track:**
```php
<?php

use NovaPoshta\Settings\Settings;
use NovaPoshta\Models\TrackingDocument;

$key      = 'myAuthKeyHash';
$settings = Settings::getInstance()->auth($key);

$trackNum = '01234567890123'; // Valid track number
$status   = TrackingDocument::track($settings, $trackNum);
```

**Get branch-offices:**
```php
<?php

use NovaPoshta\Settings\Settings;
use NovaPoshta\Models\Address;

$key      = 'myAuthKeyHash';
$settings = Settings::getInstance()->auth($key);

/**
 * Optional parameters.
 * 
 * @see https://devcenter.novaposhta.ua/docs/services/556d7ccaa0fe4f08e8f7ce43/operations/556d8211a0fe4f08e8f7ce45
 */
$options = [
  'BicycleParking'     => '1',
  'TypeOfWarehouseRef' =>'9a68df70-0267-42a8-bb5c-37f427e36ee4',
  'PostFinance'        => '1',
  'CityName'           =>'Київ',
  'CityRef'            => '20982d74-9b6c-11e2-a57a-d4ae527baec3',
];

// Or set city REF for quick searching:
// $options = [
//   'SettlementRef' => 'e71629ab-4b33-11e4-ab6d-005056801329'
// ];

$address = Address::getBranches($settings, $options);
```
