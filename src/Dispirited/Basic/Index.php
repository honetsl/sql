<?php


namespace Dispirited\Basic;


interface Index
{
    public static function __callStatic($name, $arguments);

    public function __toString();
}