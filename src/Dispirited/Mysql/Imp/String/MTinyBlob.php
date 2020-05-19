<?php


namespace Dispirited\Mysql\Imp\String;


use Dispirited\Mysql\Basic\MField;

class MTinyBlob extends MField
{
    protected string $_type = "tinyblob";

    public function __toString(): string
    {
        $sql = implode(" ", [
            sprintf("`%s`", $this->_name),
            $this->_type,
            sprintf("%s", $this->_null),
            sprintf("comment '%s'", $this->_comment),
        ]);

        if ($this->_index !== null && !$this->_filter) {
            $sql = implode(",", [
                $sql,
                sprintf("%s (`%s`)", (string)$this->_index, $this->_name)
            ]);
        }
        return $sql;
    }
}