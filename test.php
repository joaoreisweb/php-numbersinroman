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

$roman = 'MDDCIX';
echo '<br>'.$roman.' - '.$number_convert->convertRomanToInt('MDDCIX');

$roman = 'MCDDIXIIIII';
echo '<br>'.$roman.' - '.$number_convert->convertRomanToInt('MCDDIXIIIII');

