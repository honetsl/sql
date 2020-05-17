<?php


namespace Dispirited\Basic;


interface Field
{
    public function __construct(string $name, ?Index $index = null);

    public function default($value):Field;

    public function length(int $value):Field;

    public function comment(string $value):Field;

    public function scale(int $value):Field;

    public function onUpdate():Field;

    public function null():Field;

    public function unsigned():Field;

    public function charset(Charset $charset):Field;
    public function collate(Collate $collate):Field;

    public function alter();

    public function getName();

    public function __toString();
}