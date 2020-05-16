<?php


namespace Dispirited\Mysql\Basic;


use Dispirited\Basic\Field;
use Dispirited\Basic\Index;

abstract class MField implements Field
{
    /**
     * 无符号
     * @var bool $_unsigned
     */
    protected bool $_unsigned = false;
    /**
     * 默认值
     * @var string|int $_default
     */
    protected $_default;
    /**
     * 长度
     * @var int $_length
     */
    protected int $_length = 0;

    /**
     * 备注
     * @var string $_comment
     */
    protected string $_comment = "";
    /**
     * 精准度
     * @var int $_scale
     */
    protected int $_scale = 0;
    /**
     * 是否自动更新时间
     * @var bool $_onUpdate
     */
    protected bool $_onUpdate = false;
    /**
     * 是否为空
     * @var string $_null
     */
    protected string $_null = "not null";
    /**
     * 字段索引
     * @var Index|null $_index
     */
    protected ?Index $_index;
    /**
     * 字段名字
     * @var string $_name
     */
    protected string $_name;
    /**
     * 字段类型
     * @var string $_type
     */
    protected string $_type;

    /**
     * 是否不要索引
     * @var bool $_filter
     */
    protected bool $_filter = false;

    /**
     * MField constructor.
     * @param string $name 字段名字
     * @param Index|null $index 字段索引
     */
    public function __construct(string $name, ?Index $index = null)
    {
        $this->_name = $name;
        $this->_index = $index;
    }

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
     * @return string 表存在的时候进行字段的新增
     */
    public function alter(): string
    {
        $this->filter = true;
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

    abstract public function __toString(): string;

}