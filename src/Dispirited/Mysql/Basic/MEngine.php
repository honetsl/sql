<?php


namespace Dispirited\Mysql\Basic;

use Dispirited\Basic\Engine;

/**
 * @method static Engine MyISAM()
 * @method static Engine InnoDB()
 * @method static Engine Memory()
 * Class MEngine
 * @package Dispirited\Mysql\Basic
 */
class MEngine implements Engine
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