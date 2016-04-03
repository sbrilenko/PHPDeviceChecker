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

{"iOsDeviceToken":{"isiOs":true,"isAndroid":false,"os":"ios"},"androidDeviceToken":{"isiOs":false,"isAndroid":true,"os":"android"}}

```php

$tokenArray->isiOs(); // true By first token
$tokenArray->isAndroid(); // false By first token
$tokenArray->isiOs("iOsDeviceToken"); // true
$tokenArray->isAndroid("iOsDeviceToken"); // false
$tokenArray->isiOs("androidDeviceToken"); // false
$tokenArray->isAndroid("androidDeviceToken"); // true
$tokenArray->os(); // "ios" By first token
$tokenArray->os("iOsDeviceToken"); // "ios"
$tokenArray->os("androidDeviceToken"); // "android"

```

If you want add other platforms just send a pull request or create an issue.




