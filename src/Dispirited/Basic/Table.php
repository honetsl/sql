<?php


namespace Dispirited\Basic;



interface Table
{
    public function __construct(string $name, Engine $engine);
    public function add(Field $field);
//    public function charset();
    public function comment(string $comment);
    public function filter();
    public function __toString();
}