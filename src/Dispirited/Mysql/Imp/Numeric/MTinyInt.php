<?php


namespace Dispirited\Mysql\Imp\Numeric;


use Dispirited\Basic\Index;
use Dispirited\Mysql\Basic\MField;

/**
 * @link https://dev.mysql.com/doc/refman/8.0/en/integer-types.html
 * Class MTinyInt
 * @package Dispirited\Mysql\Imp
 */
class MTinyInt extends MField
{
    protected string $_type = "tinyint";
    protected bool $_zerofill;
    protected bool $_auto;

    /**
     * MTinyInt constructor.
     * @param string $name 字段名字
     * @param Index|null $index 索引
     * @param bool $auto 是否自增
     * @param int $length 长度
     * @param bool $zerofill 是否填充0
     */
    public function __construct(string $name, ?Index $index = null, bool $auto = false, int $length = 11, bool $zerofill = false)
    {
        $this->_length = $length;
        $this->_auto = $auto;
        $this->_zerofill = $zerofill;
        parent::__construct($name, $index);
    }

    public function __toString(): string
    {
        $sql = implode(" ", [
            // 字段名字
            sprintf("`%s`", $this->_name),
            // 长度和是否无符号和类型
            sprintf("%s %s(%d)", $this->_unsigned && !$this->_zerofill ? "unsigned " : "", $this->_type, $this->_length),
            // 是否自动填充0
            $this->_zerofill ? "zerofill" : "",
            // 默认值 自增则没有默认值
            !is_null($this->_index) && $this->_auto ? "" : sprintf("default %d", $this->_default),
            // 是否为空
            sprintf("%s", $this->_null),
            // 注释
            sprintf("comment '%s'", $this->_comment),
            // 字符集
            is_null($this->_charset) ? "" : sprintf("CHARACTER set %s %s",
                (string)$this->_charset,
                !is_null($this->_collate) ? sprintf("COLLATE %s", $this->_collate) : ""
            ),
            // 自增
            sprintf("%s", $this->_auto ? "auto_increment" : "")
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