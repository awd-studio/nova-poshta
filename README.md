# This package is deprecated!
## This package is abandoned and no longer maintained. The author suggests using the [awd-studio/novaposhta](https://github.com/awd-studio/NovaPoshta) package instead.

-----

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
//     'SettlementRef' => 'e71629ab-4b33-11e4-ab6d-005056801329'
// ];

$address = Address::getBranches($settings, $options);
```

**Get addresses refs:**
```php
<?php

use NovaPoshta\Settings\Settings;
use NovaPoshta\Models\Address;

$key      = 'myAuthKeyHash';
$settings = Settings::getInstance()->auth($key);

$address  = new Address($settings);

$response = $address->getAreas(); // Areas

$options = [
    'CityRef' => 'ebc0eda9-93ec-11e3-b441-0050568002cf',
];
$response = $address->getStreet($options); // Streets

$response = $address->getSettlements($options); // Settlements
```

**Online searching methods:**
```php
<?php

use NovaPoshta\Settings\Settings;
use NovaPoshta\Models\Address;

$key      = 'myAuthKeyHash';
$settings = Settings::getInstance()->auth($key);

$address  = new Address($settings);

// Just start typing, no needed save values to database!

$options = [
    'CityName' => 'К',
    //'CityName' => 'Ки',
    //'CityName' => 'Киї',
];
$response = $address->searchSettlements($options); // Get towns list

$options = [
    'StreetName'    => 'Шев',
    'SettlementRef' => 'e715719e-4b33-11e4-ab6d-005056801329',
    'Limit'         => 10,
];
$response = $address->searchSettlements($options); // Get streets
```

**Common dictionaries:**
```php
<?php

use NovaPoshta\Settings\Settings;
use NovaPoshta\Models\Common;
use NovaPoshta\Models\Address;

$key      = 'myAuthKeyHash';
$settings = Settings::getInstance()->auth($key);

$recipientCityRef = '8d5a980d-391c-11dd-90d9-001a92567626';

$common   = new Common($settings);
$response = $common->getCargoTypes();
// Or
$response = $common->getPalletsList();
// Or
$response = $common->getMessageCodeText();
// Or
$response = $common->getTimeIntervals($recipientCityRef);

// Get warehouse types
$address  = new Address($settings);
$response = $address->getWarehouseTypes();
```
[See details.](https://devcenter.novaposhta.ua/docs/services/55702570a0fe4f0cf4fc53ed) All methods implements.
