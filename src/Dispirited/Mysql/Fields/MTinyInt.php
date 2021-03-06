<?php


namespace Dispirited\Mysql\Fields;


use Dispirited\Basic\Index;
use Dispirited\Mysql\Basic\MField;

/**
 * @link    https://dev.mysql.com/doc/refman/8.0/en/integer-types.html
 * Class MTinyInt
 * @package Dispirited\Mysql\Fields
 */
class MTinyInt extends MField
{

    protected $_type     = "tinyint";
    protected $_zerofill = false;
    protected $_auto     = false;

    /**
     * MTinyInt constructor.
     * @param string     $name  字段名字
     * @param Index|null $index 索引
     *                          Integer display width is deprecated and will be removed in a future release
     *                          int $length 长度
     */
    public function __construct(string $name, Index $index = null)
    {
        parent::__construct($name, $index);
    }

    public function auto(): MTinyInt
    {
        $this->_auto = true;
        return $this;
    }

    public function zerofill(): MTinyInt
    {
        $this->_zerofill = true;
        return $this;
    }


    public function __toString(): string
    {
        $sql = implode(" ", [
            // 字段名字
            sprintf("`%s`", $this->_name),
            // 长度和是否无符号和类型
            sprintf("%s %s",
                $this->_type,
                $this->_unsigned && !$this->_zerofill ? "unsigned " : ""
            ),
            // 是否自动填充0
            $this->_zerofill ? "zerofill" : "",
            // 默认值 自增则没有默认值
            !is_null($this->_index) && $this->_auto || $this->_null == 'null' ? "" : sprintf("default %d",
                $this->_default),
            // 是否为空
            sprintf("%s", $this->_null),
            // 注释
            sprintf("comment '%s'", $this->_comment),
            // 字符集
            is_null($this->_charset) ? "" : sprintf("CHARACTER set %s %s",
                (string) $this->_charset,
                !is_null($this->_collate) ? sprintf("COLLATE %s", $this->_collate) : ""
            ),
            // 自增
            sprintf("%s", $this->_auto ? "auto_increment" : ""),
        ]);

        return !is_null($this->_index) && !$this->_filter ? implode(",", [$sql, $this->indexToS()]) : $sql;
    }
}