<?php


namespace Dispirited\Basic;


interface Charset
{
    public static function __callStatic($name, $arguments);
    public function __toString();
}