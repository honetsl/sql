<?php


namespace Dispirited\Mysql\Facade;

use Dispirited\Basic\Engine;
use Dispirited\Basic\Index;

/**
 *
 * @method static \Dispirited\Mysql\Basic\MTable Table(string $name, Engine $engine)
 *
 * @method static \Dispirited\Mysql\Imp\MTinyInt TinyInt(string $name, ?Index $index = null, bool $auto = false)
 * @method static \Dispirited\Mysql\Imp\MSmallInt SmallInt(string $name, ?Index $index = null, bool $auto = false)
 * @method static \Dispirited\Mysql\Imp\MMediumInt MediumInt(string $name, ?Index $index = null, bool $auto = false)
 * @method static \Dispirited\Mysql\Imp\MInt Int(string $name, ?Index $index = null, bool $auto = false)
 * @method static \Dispirited\Mysql\Imp\MBigInt BigInt(string $name, ?Index $index = null, bool $auto = false)
 *
 * @method static \Dispirited\Mysql\Imp\MVarchar Varchar(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Imp\MChar Char(string $name, ?Index $index = null)
 *
 * @method static \Dispirited\Mysql\Imp\MText Text(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Imp\MLongText LongText(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Imp\MTinyText TinyText(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Imp\MMediumText MediumText(string $name, ?Index $index = null)
 *
 * @method static \Dispirited\Mysql\Imp\MBlob TinyBlob(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Imp\MBlob Blob(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Imp\MMediumBlob MediumBlob(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Imp\MLongBlob LongBlob(string $name, ?Index $index = null)
 *
 * @method static \Dispirited\Mysql\Imp\MDecimal Decimal(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Imp\MFloat  Float (string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Imp\MDouble   Double  (string $name, ?Index $index = null)
 *
 * @method static \Dispirited\Mysql\Imp\MDatetime Datetime(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Imp\MDate Date(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Imp\MTime Time(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Imp\MTimeStamp TimeStamp(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Imp\MYear Year(string $name, ?Index $index = null)
 * Class Facade
 * @package Dispirited\Mysql\Facade
 */
class Facade
{
    public static function __callStatic($name, $arguments)
    {
        if(ucfirst($name) == "Table") {
            $name = "Dispirited\Mysql\Basic\M".$name;
        }else {
            $name = "Dispirited\Mysql\Imp\M".$name;
        }
        return new $name(...$arguments);
    }
}