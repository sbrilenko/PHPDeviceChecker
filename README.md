[![Build Status](https://travis-ci.org/sbrilenko/PHPDeviceChecker.svg?branch=master)](https://travis-ci.org/sbrilenko/PHPDeviceChecker)

PHP Device Checker
===========

**PHPDeviceChecker** - can check mobile os by device token. Need for sending PN

Installation
------------
add to your composer.json - `"sbrilenko/PHPDeviceChecker": "*"`

For now support Android And iOs devices

Just add device token

```php
use \PHPDeviceChecker\PHPDeviceChecker;

$getIos = new PHPDeviceChecker("iOsDeviceTokenHere");

```

You will get:

{"iOsDeviceTokenHere":{"isiOs":true,"isAndroid":false,"os":"ios"}}

You can use functions to gen some values:

```php

$getIos->isiOs(); //true
$getIos->isAndroid(); //false
$getIos->os(); //"ios"

```

or added array of device tokens

```php

$tokenArray = new PHPDeviceChecker(["iOsDeviceToken","androidDeviceToken"]);

```

result:

{"7a20e06257a5d5c608cad848df5f351e6693ffce8aa04cc7bb290bca915a4f17":{"isiOs":true,"isAndroid":false,"os":"ios"},"APA91bFiQLPpECz3fRRgrYZIsZJah9t20YRgITmu7nWaa4M2k115E83oZeGqzIx8_YKXYot--x_rVcV-JQG-9w1GsR2aQQJPbNYkH-mqJf15T10Ewy1pLXLnwcex0W5pJ6Bk-ubKlz9vXkyUu8eo_q_lp4um_IesCAPntEnagMfjP9dBDIP1sRw":{"isiOs":false,"isAndroid":true,"os":"android"}}

```php

$tokenArray->isiOs(); // true
$tokenArray->isAndroid(); // false
$tokenArray->isiOs("iOsDeviceToken"); // true
$tokenArray->isAndroid("iOsDeviceToken"); // false
$tokenArray->isiOs("androidDeviceToken"); // false
$tokenArray->isAndroid("androidDeviceToken"); // true
$tokenArray->os()); // "ios"
$tokenArray->os("iOsDeviceToken"); // "ios"
$tokenArray->os("androidDeviceToken"); // "android"

```

If you want add other platforms just send a pull request or create an issue.




