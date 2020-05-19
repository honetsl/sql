<?php


namespace Dispirited\Basic;


interface Table
{
    public function __construct(string $name, Engine $engine);

    /**
     * @param Field ...$field
     * @return Table
     */
    public function add(...$field): Table;

    public function comment(string $comment): Table;

    /**
     * @param Charset $charset
     * @return Table
     */
    public function charset( $charset): Table;

    /**
     * @param Collate $collate
     * @return Table
     */
    public function collate( $collate): Table;

    public function filter(string ...$args);

    public function __toString();
}