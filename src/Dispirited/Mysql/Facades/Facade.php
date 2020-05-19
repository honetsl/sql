<?php


namespace Dispirited\Mysql\Facades;

use Dispirited\Basic\Engine;
use Dispirited\Basic\Index;

/**
 * @link https://dev.mysql.com/doc/refman/8.0/en/data-types.html
 *
 * @method static \Dispirited\Mysql\Basic\MTable Table(string $name, Engine $engine)
 *
 * @method static \Dispirited\Mysql\Imp\Numeric\MTinyInt TinyInt(string $name, ?Index $index = null, int $length = 11)
 * @method static \Dispirited\Mysql\Imp\Numeric\MSmallInt SmallInt(string $name, ?Index $index = null, int $length = 11)
 * @method static \Dispirited\Mysql\Imp\Numeric\MMediumInt MediumInt(string $name, ?Index $index = null, int $length = 11)
 * @method static \Dispirited\Mysql\Imp\Numeric\MInt Int(string $name, ?Index $index = null, int $length = 11)
 * @method static \Dispirited\Mysql\Imp\Numeric\MBigInt BigInt(string $name, ?Index $index = null, int $length = 11)
 *
 * @method static \Dispirited\Mysql\Imp\Numeric\MDecimal Decimal(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Imp\Numeric\MFloat  Float (string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Imp\Numeric\MDouble   Double  (string $name, ?Index $index = null)
 *
 * @method static \Dispirited\Mysql\Imp\String\MVarchar Varchar(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Imp\String\MChar Char(string $name, ?Index $index = null)
 *
 * @method static \Dispirited\Mysql\Imp\String\MText Text(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Imp\String\MLongText LongText(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Imp\String\MTinyText TinyText(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Imp\String\MMediumText MediumText(string $name, ?Index $index = null)
 *
 * @method static \Dispirited\Mysql\Imp\String\MTinyBlob TinyBlob(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Imp\String\MBlob Blob(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Imp\String\MMediumBlob MediumBlob(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Imp\String\MLongBlob LongBlob(string $name, ?Index $index = null)
 *
 *
 * @method static \Dispirited\Mysql\Imp\Date\MDatetime Datetime(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Imp\Date\MDate Date(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Imp\Date\MTime Time(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Imp\Date\MTimeStamp TimeStamp(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Imp\Date\MYear Year(string $name, ?Index $index = null)
 * Class Facade
 * @package Dispirited\Mysql\Facades
 */
class Facade
{
    public static function __callStatic($name, $arguments)
    {
        switch ($name) {
            case strtolower($name) != str_replace(["table"], "", strtolower($name)):
                $name = "Dispirited\Mysql\Basic\M" . $name;
                break;
            case strtolower($name) != str_replace(["int", "float", "decimal", "double"], "", strtolower($name)):
                $name = "Dispirited\Mysql\Imp\Numeric\M" . $name;
                break;
            case strtolower($name) != str_replace(["char", "text", "blob"], "", strtolower($name)):
                $name = "\Dispirited\Mysql\Imp\String\M" . $name;
                break;
            case strtolower($name) != str_replace(["date", "time", "year"], "", strtolower($name)):
                $name = "\Dispirited\Mysql\Imp\Date\M" . $name;
                break;
        }

        return new $name(...$arguments);
    }
}