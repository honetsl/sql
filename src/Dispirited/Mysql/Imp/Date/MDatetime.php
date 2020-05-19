<?php


namespace Dispirited\Mysql\Imp\Date;


use Dispirited\Mysql\Basic\MField;

class MDatetime extends MField
{
    protected $_type = "datetime";

    public function __toString(): string
    {
        $sql = implode(" ", [
            sprintf("`%s`", $this->_name),
            sprintf("%s(%d)", $this->_type, $this->_scale),
            empty($this->_default) ? "" : sprintf("default %s", strtoupper($this->_default) === "CURRENT_TIMESTAMP" ? "CURRENT_TIMESTAMP" : "'{$this->_default}'"),
            sprintf("%s", $this->_onUpdate ? "on update current_timestamp" : ""),
            sprintf("%s", $this->_null),
            sprintf("comment '%s'", $this->_comment),
        ]);

        if (!is_null($this->_index) && !$this->_filter) {
            $sql = implode(",", [
                $sql,
                sprintf("%s (`%s`)", (string)$this->_index, $this->_name)
            ]);
        }
        return $sql;
    }
}