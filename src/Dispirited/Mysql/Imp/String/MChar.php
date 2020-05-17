<?php


namespace Dispirited\Mysql\Imp\String;


use Dispirited\Mysql\Basic\MField;

class MChar extends MField
{
    protected string $_type = "char";
    public function __toString(): string
    {
        $sql = implode(" ", [
            sprintf("`%s`", $this->_name),
            sprintf("%s(%d)", $this->_type, $this->_length),
            sprintf("default '%s'", $this->_default),
            sprintf("%s", $this->_null),
            sprintf("comment '%s'", $this->_comment),
            is_null($this->_charset) ? "" : sprintf("CHARACTER set %s %s",
                (string)$this->_charset,
                !is_null($this->_collate)?sprintf("COLLATE %s",$this->_collate):""
            ),
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