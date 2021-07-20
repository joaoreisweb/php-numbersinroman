<?php
//require_once __DIR__ . '/vendor/autoload.php';
require_once realpath("vendor/autoload.php");

use joaoreisweb\NumbersInRoman;

$number_convert = new NumbersInRoman();

echo '<br>'.$number_convert->convertIntToRoman(1500);

echo '<br>'.$number_convert->convertIntToRoman(1600);

echo '<br>'.$number_convert->convertIntToRoman(1000);

echo '<br>'.$number_convert->convertIntToRoman(1550);

echo '<br>'.$number_convert->convertRomanToInt('MDDCIX');

$num = 'MCDDIXIIIII';
echo '<br>'.$num.' - '.$number_convert->convertRomanToInt($num);

