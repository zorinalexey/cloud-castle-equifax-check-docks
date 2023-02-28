# cloud-castle/equifax-check-docks

Библиотека для проверки ИНН и СНИЛС физ. лиц по требованиям 
БКИ Эквифакс


#### ---------- Рекомендуемый способ установки --------------

composer require cloud-castle/equifax-check-docks

#### -------------------------------------------------


# version 1.0



```php

<?php

require_once 'vendor/autoload.php';

use CluodCastle\Check\Snils\Snils;
use CluodCastle\Check\Inn\Inn;

$inn = new Inn('246001622824');
$snils = new Snils('02846235860');

var_dump($snils->verify(), $inn->verify());

```

