<?php
use Phalcon\Mvc\Model;

class Extension extends Model {
public static function convertCommaNoneDecimal($amount){
$amountNewFormat = number_format($amount, 0);
return $amountNewFormat;
}

public static function substrDate ($date){
    return substr($date, 0,16);
}
}