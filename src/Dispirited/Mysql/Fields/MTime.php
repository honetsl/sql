<?php


namespace Dispirited\Mysql\Fields;


use Dispirited\Mysql\Basic\MField;

class MTime extends MField
{
    protected $_type = "time";

    public function __toString(): string
    {
        $sql = implode(" ", [
            sprintf("`%s`", $this->_name),
            sprintf("%s(%d)", $this->_type, $this->_scale),
            empty($this->_default) ? "" : sprintf("default %s", "'{$this->_default}'"),
            sprintf("%s", $this->_null),
            sprintf("comment '%s'", $this->_comment),
        ]);

        return !is_null($this->_index) && !$this->_filter ? implode(",", [$sql, $this->indexToS()]) : $sql;
    }
}