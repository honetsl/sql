<?php


namespace Dispirited\Basic;


interface Engine
{
    public static function __callStatic($name, $arguments);

    public function __toString();
}