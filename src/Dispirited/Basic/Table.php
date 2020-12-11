<?php


namespace Dispirited\Basic;


interface Table {
    public function __construct(string $name, Engine $engine);

    /**
     * @param Field ...$field
     *
     * @return Table
     */
    public function addFields(Field ...$field): Table;

    public function comment(string $comment): Table;

    /**
     * @param Charset $charset
     *
     * @return Table
     */
    public function charset(Charset $charset): Table;

    /**
     * @param Collate $collate
     *
     * @return Table
     */
    public function collate(Collate $collate): Table;

    public function dropIfExist(): string;

    public function filter(string ...$args);

    public function addMultiIndex(Index $index, string $name, string ...$fields): Table;

    public function __toString();

    public function addIndex(Index $index, string ...$field): Table;
}