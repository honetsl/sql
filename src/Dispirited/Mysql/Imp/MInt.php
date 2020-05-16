<?php


namespace Dispirited\Mysql\Imp;


use Dispirited\Basic\Index;
use Dispirited\Mysql\Basic\MField;

class MInt extends MField
{
    protected bool $_auto;
    protected string $_type = "int";

    public function __construct(string $name, ?Index $index = null, bool $auto = false, int $length = 11)
    {
        $this->_length = $length;
        $this->_auto = $auto;
        parent::__construct($name, $index);
    }

    public function __toString(): string
    {
        $sql = implode(" ", [
            sprintf("`%s`", $this->_name),
            sprintf("%s %s(%d)", $this->_unsigned ? "unsigned " : "", $this->_type, $this->_length),
            $this->_auto ? "" : sprintf("default %d", $this->_default),
            sprintf("%s", $this->_null),
            sprintf("comment '%s'", $this->_comment),
            sprintf("%s", $this->_auto ? "auto_increment" : "")
        ]);

        if (is_null($this->_index) && !$this->_filter) {
            $sql = implode(",", [
                $sql,
                sprintf("%s (`%s`)", (string)$this->_index, $this->_name)
            ]);
        }
        return $sql;
    }
}