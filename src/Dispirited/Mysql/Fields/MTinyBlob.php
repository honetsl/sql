<?php


namespace Dispirited\Mysql\Fields;


use Dispirited\Mysql\Basic\MField;

class MTinyBlob extends MField
{
    protected $_type = "tinyblob";

    public function __toString(): string
    {
        $sql = implode(" ", [
            sprintf("`%s`", $this->_name),
            $this->_type,
            sprintf("%s", $this->_null),
            sprintf("comment '%s'", $this->_comment),
        ]);
        return !is_null($this->_index) && !$this->_filter ? implode(",", [$sql, $this->indexToS()]) : $sql;
    }
}