<?php


namespace Dispirited\Mysql;

use Dispirited\Basic\Engine;
use Dispirited\Basic\Index;

/**
 * @link https://dev.mysql.com/doc/refman/8.0/en/data-types.html
 *
 * @method static \Dispirited\Mysql\Basic\MTable Table(string $name, Engine $engine)
 *
 * @method static \Dispirited\Mysql\Fields\MTinyInt TinyInt(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Fields\MSmallInt SmallInt(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Fields\MMediumInt MediumInt(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Fields\MInt Int(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Fields\MBigInt BigInt(string $name, ?Index $index = null)
 *
 * @method static \Dispirited\Mysql\Fields\MDecimal Decimal(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Fields\MFloat  Float (string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Fields\MDouble   Double  (string $name, ?Index $index = null)
 *
 * @method static \Dispirited\Mysql\Fields\MVarchar Varchar(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Fields\MChar Char(string $name, ?Index $index = null)
 *
 * @method static \Dispirited\Mysql\Fields\MText Text(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Fields\MLongText LongText(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Fields\MTinyText TinyText(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Fields\MMediumText MediumText(string $name, ?Index $index = null)
 *
 * @method static \Dispirited\Mysql\Fields\MTinyBlob TinyBlob(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Fields\MBlob Blob(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Fields\MMediumBlob MediumBlob(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Fields\MLongBlob LongBlob(string $name, ?Index $index = null)
 *
 *
 * @method static \Dispirited\Mysql\Fields\MDatetime Datetime(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Fields\MDate Date(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Fields\MTime Time(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Fields\MTimeStamp TimeStamp(string $name, ?Index $index = null)
 * @method static \Dispirited\Mysql\Fields\MYear Year(string $name, ?Index $index = null)
 *
 * Class Factory
 * @package Dispirited\Mysql
 */
class Factory
{
    private static function valid(string $method, ...$arguments)
    {
        $class = [
            "table",
            "tinyint",
            "smallint",
            "mediumint",
            "int",
            "bigint",
            "decimal",
            "float",
            "double",
            "varchar",
            "char",
            "text",
            "longtext",
            "tinytext",
            "mediumtext",
            "tinyblob",
            "blob",
            "mediumblob",
            "longblob",
            "datetime",
            "date",
            "time",
            "timestamp",
            "year",
        ];
        if (!in_array(strtolower($method), $class, true)) {
            throw new \RuntimeException(sprintf("class:[%s] not exist!", $method));
        }
        $fieldClass = __NAMESPACE__ . '\\Fields\\M' . $method;

        if (strtolower($method) === "table") {
            $fieldClass = __NAMESPACE__ . '\\Basic\\M' . $method;
        }
        $instance = new \ReflectionClass($fieldClass);
        return $instance->newInstanceArgs($arguments);
    }


    public static function __callStatic($name, $arguments)
    {
        return self::valid($name, ...$arguments);
    }
}