<?php


namespace Dispirited\Mysql\Basic;


use Dispirited\Basic\Index;

/**
 * @method static Index primaryKey()
 * @method static Index unique()
 * @method static Index index()
 * @method static Index fulltext()
 * Class MIndex
 * @package Dispirited\Mysql\Basic
 */
final class MIndex implements Index
{
    /**
     * @var string $_name
     */
    private  $_name;

    private function __construct(string $name)
    {
        $name = (string)preg_replace("/([A-Z])/", " " . strtolower('${1}'), $name);
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