<?php


namespace Dispirited\Mysql\Imp;


use Dispirited\Mysql\Basic\MField;

class MText extends MField
{
    protected string $_type = "text";

    public function __toString(): string
    {
        $sql = implode(" ", [
            sprintf("`%s`", $this->_name),
            $this->_type,
            sprintf("%s", $this->_null),
            sprintf("comment '%s'", $this->_comment),
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