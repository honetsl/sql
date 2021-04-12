<?php


namespace Dispirited\Mysql\Fields;


use Dispirited\Mysql\Basic\MField;

/**
 * @see     https://dev.mysql.com/doc/refman/8.0/en/json.html
 * Class MJson
 * @package Dispirited\Mysql\Fields
 */
class MJson extends MField
{
    protected $_type = "json";

    public function __toString()
    {
        $sql = implode(" ", [
            // 字段名字
            sprintf("`%s`", $this->_name),
            $this->_type,
            // 默认值 自增则没有默认值
            $this->_null === 'not null' ? sprintf("default '%s' %s ", $this->_default,
                $this->_null) : sprintf("default %s", $this->_null),
            // 注释
            sprintf("comment '%s'", $this->_comment),
            // 字符集
            is_null($this->_charset) ? "" : sprintf("CHARACTER set %s %s",
                (string) $this->_charset,
                !is_null($this->_collate) ? sprintf("COLLATE %s", $this->_collate) : ""
            ),
        ]);

        return !is_null($this->_index) && !$this->_filter ? implode(",", [$sql, $this->indexToS()]) : $sql;
    }
}