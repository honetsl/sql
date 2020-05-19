<?php


namespace Dispirited\Basic;


interface Field
{
    /**
     * Field constructor.
     * @param string $name
     * @param Index|null $index
     */
    public function __construct(string $name, $index = null);

    public function default($value): Field;

    public function length(int $value): Field;

    public function comment(string $value): Field;

    public function scale(int $value): Field;

    public function onUpdate(): Field;

    public function null(): Field;

    public function unsigned(): Field;

    /**
     * @param Charset $charset
     * @return Field
     */
    public function charset($charset): Field;

    /**
     * @param Collate $collate
     * @return Field
     */
    public function collate($collate): Field;

    public function alter();

    public function getName();

    public function __toString();
}