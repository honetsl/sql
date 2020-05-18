<?php


namespace Dispirited\Basic;


interface Table
{
    public function __construct(string $name, Engine $engine);

    public function add(Field ...$field): Table;

    public function comment(string $comment): Table;

    public function charset(Charset $charset): Table;

    public function collate(Collate $collate): Table;

    public function filter(string ...$args);

    public function __toString();
}