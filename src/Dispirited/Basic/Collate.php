<?php


namespace Dispirited\Basic;


interface Collate
{
    public static function __callStatic($name, $arguments);
    public function __toString();
}