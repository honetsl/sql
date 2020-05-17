<?php


namespace Dispirited\Mysql\Basic;


use Dispirited\Basic\Collate;

/**
 * @link https://dev.mysql.com/doc/refman/8.0/en/Collate-Collates.html
 * 
 * @method static Collate armscii8_general_ci ()
 * @method static Collate ascii_general_ci()
 * @method static Collate big5_chinese_ci()
 * @method static Collate binary()
 * @method static Collate cp1250_general_ci()
 * @method static Collate cp1251_general_ci()
 * @method static Collate cp1256_general_ci()
 * @method static Collate cp1257_general_ci()
 * @method static Collate cp850_general_ci()
 * @method static Collate cp852_general_ci()
 * @method static Collate cp866_general_ci()
 * @method static Collate cp932_japanese_ci()
 * @method static Collate dec8_swedish_ci()
 * @method static Collate eucjpms_japanese_ci()
 * @method static Collate euckr_korean_ci()
 * @method static Collate gb18030_chinese_ci()
 * @method static Collate gb2312_chinese_ci()
 * @method static Collate gbk_chinese_ci()
 * @method static Collate geostd8_general_ci()
 * @method static Collate greek_general_ci()
 * @method static Collate hebrew_general_ci()
 * @method static Collate hp8_english_ci()
 * @method static Collate keybcs2_general_ci()
 * @method static Collate koi8r_general_ci()
 * @method static Collate koi8u_general_ci()
 * @method static Collate latin1_swedish_ci()
 * @method static Collate latin2_general_ci()
 * @method static Collate latin5_turkish_ci()
 * @method static Collate latin7_general_ci()
 * @method static Collate macce_general_ci()
 * @method static Collate macroman_general_ci()
 * @method static Collate sjis_japanese_ci()
 * @method static Collate swe7_swedish_ci()
 * @method static Collate tis620_thai_ci()
 * @method static Collate ucs2_general_ci()
 * @method static Collate ujis_japanese_ci()
 * @method static Collate utf16_general_ci()
 * @method static Collate utf16le_general_ci()
 * @method static Collate utf32_general_ci()
 * @method static Collate utf8_general_ci()
 * @method static Collate utf8mb4_0900_ai_ci()
 * Class MCollate
 * @package Dispirited\Mysql\Basic
 */
class MCollate implements Collate
{
    private string $_name;

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