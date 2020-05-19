<?php


namespace Dispirited\Mysql\Basic;


use Dispirited\Basic\Charset;

/**
 * @link https://dev.mysql.com/doc/refman/8.0/en/charset-charsets.html
 *
 * @method static Charset armscii8 ()
 * @method static Charset ascii()
 * @method static Charset big5()
 * @method static Charset binary()
 * @method static Charset cp1250()
 * @method static Charset cp1251()
 * @method static Charset cp1256()
 * @method static Charset cp1257()
 * @method static Charset cp850()
 * @method static Charset cp852()
 * @method static Charset cp866()
 * @method static Charset cp932()
 * @method static Charset dec8()
 * @method static Charset eucjpms()
 * @method static Charset euckr()
 * @method static Charset gb18030()
 * @method static Charset gb2312()
 * @method static Charset gbk()
 * @method static Charset geostd8()
 * @method static Charset greek()
 * @method static Charset hebrew()
 * @method static Charset hp8()
 * @method static Charset keybcs2()
 * @method static Charset koi8r()
 * @method static Charset koi8u()
 * @method static Charset latin1()
 * @method static Charset latin2()
 * @method static Charset latin5()
 * @method static Charset latin7()
 * @method static Charset macce()
 * @method static Charset macroman()
 * @method static Charset sjis()
 * @method static Charset swe7()
 * @method static Charset tis620()
 * @method static Charset ucs2()
 * @method static Charset ujis()
 * @method static Charset utf16()
 * @method static Charset utf16le()
 * @method static Charset utf32()
 * @method static Charset utf8()
 * @method static Charset utf8mb4()
 *
 * Class MCharset
 * @package Dispirited\Mysql\Basic
 */
class MCharset implements Charset
{
    /**
     * @var string $_name
     */
    private $_name;

    private function __construct(string $name)
    {
        $this->_name = $name;
    }

    public static function __callStatic($name, $arguments)
    {
        return new static($name);
    }

    public function __toString()
    {
        return $this->_name;
    }
}