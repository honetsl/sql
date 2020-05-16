<?php


namespace Dispirited\Basic;


interface Field
{
    public function __construct(string $name, ?Index $index = null);

    public function default($value);
    public function length(int $value);
    public function comment(string $value);
    public function scale(int $value);
    public function onUpdate();
    public function null();
    public function unsigned();

    public function alter();
    public function getName();
    public function __toString();
}