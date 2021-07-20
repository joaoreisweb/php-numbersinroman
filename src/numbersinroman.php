<?php

namespace joaoreisweb;

class NumbersInRoman
{

    private $units;
    private $units_convert;
    private $tens;
    private $tens_convert;
    private $hundreds;
    private $hundreds_convert;
    private $thousands;
    private $thousands_convert;
    private $tens_thousand;
    private $tens_thousand_convert;
    private $hundreds_thousand;
    private $hundreds_thousand_convert;
    private $million;
    private $million_convert;

    private $romans_to_convert;

    private $millions;
    private $millions_convert;
    private $tens_millions;
    private $tens_millions_convert;

    private $roman_symbols;
    private $roman_values;

    public function __construct()
    {

        $this->units = ["", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX"];
        //$this->units_convert = ["", "1", "2", "3", "4", "5", "6", "7", "8", "9"];

        $this->tens = ["", "X", "XX", "XXX", "XL", "L", "LX", "LXX", "LXXX", "XC"];
        //$this->tens_convert = ["", "10", "20", "30", "40", "50", "60", "70", "80", "90"];

        $this->hundreds = ["", "C", "CC", "CCC", "CD", "D", "DC", "DCC", "DCCC", "CM"];
        //$this->hundreds_convert = ["", "100", "200", "300", "400", "500", "600", "700", "800", "900"];

        $this->thousands = ["", "M", "MM", "MMM", "I̅V̅", "V̅", "V̅I̅", "V̅I̅I̅", "V̅I̅I̅I̅", "I̅X̅"];
        //$this->thousands_convert = ["", "1000", "2000", "3000", "4000", "5000", "6000", "7000", "8000", "9000"];

        $this->tens_thousand = ["", "X̅", "X̅X̅", "X̅X̅X̅", "X̅L̅", "L̅", "L̅X̅", "L̅X̅X̅", "L̅X̅X̅X̅", "X̅C̅"];
        //$this->tens_thousand_convert = ["", "10000", "20000", "30000", "40000", "50000", "60000", "70000", "80000", "90000"];

        $this->hundreds_thousand = ["", "C̅", "C̅C̅", "C̅C̅C̅", "C̅D̅", "D̅", "D̅C̅", "D̅C̅C̅", "D̅C̅C̅C̅", "C̅M̅"];
        //$this->hundreds_thousand_convert = ["", "100000", "200000", "300000", "400000", "500000", "600000", "700000", "800000", "900000"];

        $this->million = "M̅";
        //$this->million_convert = "1000000";

        ///// UNCERTAIN
        /* $this->millions = ["", "M̅", "M̅M̅", "M̅M̅M̅", "M̅(V̅)", "(V̅)", "(V̅)M̅", "(V̅)M̅M̅", "(V̅)M̅M̅M̅", "M̅(X̅)"];
        $this->millions_convert = ["", "1000000", "2000000", "3000000", "4000000", "5000000", "6000000", "7000000", "8000000", "9000000"];

        $this->tens_millions = "(X̅)";
        $this->tens_millions_convert = "10000000"; */

        ///// END UNCERTAIN

        $this->romans_to_convert = [
            'M̅' => 1000000,
            'C̅M̅'=> 900000,
            'D̅' => 500000,
            'C̅D̅'=> 400000,
            'C̅' => 100000,
            'L̅' => 50000,
            'X̅L̅'=> 40000,
            'X̅' => 10000,
            'I̅X̅'=> 9000,
            'V̅' => 5000,
            'I̅V̅'=> 4000,
            'M' => 1000,
            'CM'=> 900,
            'D' => 500,
            'CD'=> 400,
            'C' => 100,
            'XC'=> 90,
            'XL'=> 40,
            'L' => 50,
            'X' => 10,
            'IX'=> 9,
            'IV'=> 4,
            'V' => 5,
            'I' => 1 
        ];
    }

    public function convertIntToRoman($n)
    {
        $len = strlen($n);

        $number_arr = str_split($n);
        $writing =  '';

        foreach ($number_arr as $n) {

            ////////// above 1 million there is a lot of uncertainty

            /* if($len>=8){
                $diff_total=substr($n, 0, -7);
                for($i=1; $i <= $diff_total; $i++){
                    $writing .= $this->tens_millions;
                }
            }
            if($len==7){
                $writing .= $this->millions[$n];
            } */

            ////////// 1 MILLION
            if ($len >= 7) {
                $diff_total = substr($n, 0, -6);
                for ($i = 1; $i <= $diff_total; $i++) {
                    $writing .= $this->million;
                }
            }
            if ($len == 6) {
                $writing .= $this->hundreds_thousand[$n];
            }
            if ($len == 5) {
                $writing .= $this->tens_thousand[$n];
            }
            if ($len == 4) {
                $writing .= $this->thousands[$n];
            }
            if ($len == 3) {
                $writing .= $this->hundreds[$n];
            }
            if ($len == 2) {
                $writing .= $this->tens[$n];
            }
            if ($len == 1) {
                $writing .= $this->units[$n];
            }
            $len--;
        }
        return $writing;
    }


    public function convertRomanToInt($n)
    {
        //// prepare array = add plus sign to split
        $prepare_array = function ($a){ return '+'.$a; };
        $r = array_map($prepare_array, $this->romans_to_convert);
        //// replace all values and convert to array
        $numbers_arr = explode( '+', strtr($n, $r) );
        //// calculate - sum all values in array
        $roman_result = array_sum(array_filter($numbers_arr));
        return $roman_result;         
    }

}
