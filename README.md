# php-numbersinroman
This library convert numbers into roman numerals.


## USAGE
```php
<?php

require_once realpath("vendor/autoload.php");

use joaoreisweb\NumbersInRoman;

$number_convert = new NumbersInRoman();

$number = 1500;
echo '<br>'.$number.' - '.$number_convert->convertIntToRoman($number);

$number = 1600;
echo '<br>'.$number.' - '.$number_convert->convertIntToRoman($number);

$number = 1000;
echo '<br>'.$number.' - '.$number_convert->convertIntToRoman($number);

$number = 1550;
echo '<br>'.$number.' - '.$number_convert->convertIntToRoman($number);

$roman = 'MDDCXXI';
echo '<br>'.$roman.' - '.$number_convert->convertRomanToInt($roman);

$roman = 'MCDDXIV';
echo '<br>'.$roman.' - '.$number_convert->convertRomanToInt($roman);
```

## RESULTS
```bash
1500 - MD
1600 - MDC
1000 - M
1550 - MDL
MDDCXXI - 2121
MCDDXIV - 1914
```


