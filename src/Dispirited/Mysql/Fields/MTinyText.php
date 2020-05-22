<?php


namespace Dispirited\Mysql\Fields;


use Dispirited\Mysql\Basic\MField;

class MTinyText extends MField
{
    protected $_type = "tinytext";

    public function __toString(): string
    {
        $sql = implode(" ", [
            sprintf("`%s`", $this->_name),
            $this->_type,
            sprintf("%s", $this->_null),
            sprintf("comment '%s'", $this->_comment),
            is_null($this->_charset) ? "" : sprintf("CHARACTER set %s %s",
                (string)$this->_charset,
                !is_null($this->_collate) ? sprintf("COLLATE %s", $this->_collate) : ""
            ),
        ]);

        return !is_null($this->_index) && !$this->_filter ? implode(",", [$sql, $this->indexToS()]) : $sql;
    }
}