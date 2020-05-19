<?php


namespace Dispirited\Mysql\Basic;


use Dispirited\Basic\Charset;
use Dispirited\Basic\Collate;
use Dispirited\Basic\Field;
use Dispirited\Basic\Index;

abstract class MField implements Field
{
    /**
     * 无符号
     * @var bool $_unsigned
     */
    protected  $_unsigned = false;
    /**
     * 默认值
     * @var string|int $_default
     */
    protected $_default;
    /**
     * 长度
     * @var int $_length
     */
    protected  $_length = 0;

    /**
     * 备注
     * @var string $_comment
     */
    protected  $_comment = "";
    /**
     * 精准度
     * @var int $_scale
     */
    protected  $_scale = 0;
    /**
     * 是否自动更新时间
     * @var bool $_onUpdate
     */
    protected  $_onUpdate = false;
    /**
     * 是否为空
     * @var string $_null
     */
    protected  $_null = "not null";
    /**
     * 字段索引
     * @var Index|null $_index
     */
    protected  $_index;
    /**
     * 字段名字
     * @var string $_name
     */
    protected  $_name;
    /**
     * 字段类型
     * @var string $_type
     */
    protected $_type;

    /**
     * 字符集
     * @var Charset $_charset
     */
    protected  $_charset = null;

    /**
     * 是否不要索引
     * @var bool $_filter
     */
    protected  $_filter = false;

    /**
     * @var Collate $_collate
     */
    protected  $_collate;

    /**
     * MField constructor.
     * @param string $name 字段名字
     * @param Index|null $index 字段索引
     */
    public function __construct(string $name, $index = null)
    {
        $this->_name = $name;
        $this->_index = $index;
    }

    /**
     * @param int|string $value
     * @return $this|Field
     */
    public function default($value): Field
    {
        $this->_default = $value;
        return $this;
    }

    public function length(int $value): Field
    {
        $this->_length = $value;
        return $this;
    }

    public function comment(string $value): Field
    {
        $this->_comment = $value;
        return $this;
    }

    public function scale(int $value): Field
    {
        $this->_scale = $value;
        return $this;
    }

    public function onUpdate(): Field
    {
        $this->_onUpdate = true;
        return $this;
    }

    public function null(): Field
    {
        $this->_null = "null";
        return $this;
    }

    public function unsigned(): Field
    {
        $this->_unsigned = true;
        return $this;
    }

    public function getName(): string
    {
        return $this->_name;
    }

    /**
     * @param Charset $charset
     * @return Field
     */
    public function charset($charset): Field
    {
        $this->_charset = $charset;
        return $this;
    }


    /**
     * @param Collate $collate
     * @return Field
     */
    public function collate($collate): Field
    {
        $this->_collate = $collate;
        return $this;
    }


    /**
     * @return string 表存在的时候进行字段的新增
     */
    public function alter(): string
    {
        $this->_filter = true;
        return
            sprintf("add COLUMN %s %s %s %s",
                $this->__toString(),
                "%s",
                "%s",
                is_null($this->_index) ? "" : sprintf(",add %s(%s)",
                    $this->_index,
                    $this->_name
                )
            );
    }


}