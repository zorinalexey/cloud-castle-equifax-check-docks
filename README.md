# cloud-castle/equifax-check-docks

Библиотека для проверки ИНН и СНИЛС физ. лиц по требованиям БКИ Эквифакс

#### ---------- Рекомендуемый способ установки --------------

composer require cloud-castle/equifax-check-docks

#### -------------------------------------------------

# version 2.2

```php

<?php

require_once 'vendor/autoload.php';

use CluodCastle\Check\Snils\Snils;
use CluodCastle\Check\Inn\Inn;
use CluodCastle\Check\Uid\Uidgen;

// Сгенерировать uid
$uid = new Uidgen();
// Получить uid без хеша
$uid->getUid();
// Получить uid с хешем (контрольным символом
$uid->getUidHash();


// Проверить ИНН
$inn = new Inn('246001622824');
// Вернет true если ИНН корректен или false в противном случае
$inn->verify();

// Проверить СНИЛС
$snils = new Snils('02846235860');
// Вернет true если СНИЛС корректен или false в противном случае
$snils->verify();

```

