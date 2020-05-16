<?php


namespace Dispirited\Mysql\Basic;


use Dispirited\Basic\Index;

/**
 * @method static Index PrimaryKey()
 * @method static Index UniqueKey()
 * @method static Index Index()
 * @method static Index FullText()
 * Class MIndex
 * @package Dispirited\Mysql\Basic
 */
final class MIndex implements Index
{
    private string $_name;

    private function __construct(string $name)
    {
        $this->_name = $name;
    }

    public static function __callStatic($name, $arguments)
    {
        return new static($name);
    }

    public function __toString()
    {
        return $this->_name;
    }
}