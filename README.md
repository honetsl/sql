#### 版本更新 

#### 宗旨：快速生成mysql可用可执行无报错的sql

```
### 0.9.8 
    mysql8.x 去除整数定义width 
    整改类命名 
    todo:初步增加表联合索引定义


### 0.9.5 
    增加一些基础字段设置 可设置主键名字

### v0.9
    主分支适配php7.x
    修复tinyblob
    修复限定



### v0.8
    修复时间类型year 默认为4长度
    完善接口代码
    后续增加json等之类的字段类型支持
```

```
composer require hone1st/sql
```
#### php版本必须大于等于7.4

#### 时间类型
```php
// 传入字段名字和索引类型（可为空）
/**
 * @method static \Dispirited\Mysql\Fields\MDatetime Datetime(string $name, ?Dispirited\Basic\Index $index = null)
 * @method static \Dispirited\Mysql\Fields\MDate Date(string $name, ?Dispirited\Basic\Index $index = null)
 * @method static \Dispirited\Mysql\Fields\MTime Time(string $name, ?Dispirited\Basic\Index $index = null)
 * @method static \Dispirited\Mysql\Fields\MTimeStamp TimeStamp(string $name, ?Dispirited\Basic\Index $index = null)
 * @method static \Dispirited\Mysql\Fields\MYear Year(string $name, ?Dispirited\Basic\Index $index = null)
*/

// 不支持毫秒级
Dispirited\Mysql\Factorys\Facade::Date("");

// 支持scale精准度毫秒级几位
Dispirited\Mysql\Factorys\Facade::Time("");

// 支持显示2位或者4四位 需要确定scale 默认为4
// 不支持毫秒级
Dispirited\Mysql\Factorys\Facade::Year("");

// 支持scale精准度毫秒级几位
// 支持onupdate 默认更新为最新时间
// 支持defalut('current_timestamp')
Dispirited\Mysql\Factorys\Facade::Datetime("");
Dispirited\Mysql\Factorys\Facade::TimeStamp("");
```

#### 数字类型number
```PHP
/**
 * @method static \Dispirited\Mysql\Fields\MTinyInt TinyInt(string $name, ?Dispirited\Basic\Index $index = null, int $length = 11)
 * @method static \Dispirited\Mysql\Fields\MSmallInt SmallInt(string $name, ?Dispirited\Basic\Index $index = null, int $length = 11)
 * @method static \Dispirited\Mysql\Fields\MMediumInt MediumInt(string $name, ?Dispirited\Basic\Index $index = null, int $length = 11)
 * @method static \Dispirited\Mysql\Fields\MInt Int(string $name, ?Dispirited\Basic\Index $index = null, int $length = 11)
 * @method static \Dispirited\Mysql\Fields\MBigInt BigInt(string $name, ?Dispirited\Basic\Index $index = null, int $length = 11)
 *
 * @method static \Dispirited\Mysql\Fields\MDecimal Decimal(string $name, ?Dispirited\Basic\Index $index = null)
 * @method static \Dispirited\Mysql\Fields\MFloat  Float (string $name, ?Dispirited\Basic\Index $index = null)
 * @method static \Dispirited\Mysql\Fields\MDouble   Double  (string $name, ?Dispirited\Basic\Index $index = null)
*/

// 整数类型 默认长度都是11 得自己重新设置length
Dispirited\Mysql\Factorys\Facade::TinyInt("TinyInt")->length(1)->comment("TinyInt");

// 浮点数类型可以设置scale 精准度保留多少位
Dispirited\Mysql\Factorys\Facade::Decimal("MDecimal")->length(10)->scale(2)->comment("MDecimal");
```

#### Text类型 暂不支持索引 
#### interface Field
```php
interface Field
{
    // i字段名字  索引类型
    public function __construct(string $name, ?Index $index = null);
    // 设置默认值
    public function default($value): Field;
    // 设置长度
    public function length(int $value): Field;
    // 设置备注
    public function comment(string $value): Field;
   // 设置精准度
    public function scale(int $value): Field;
     // 时间类型是否自动更新
    public function onUpdate(): Field;
    // 是否为空
    public function null(): Field;
    // 整数类型无符号支持
    public function unsigned(): Field;
    // 单独设置 字符集
    public function charset(Charset $charset): Field;
    // 单独设置 结果集排序
    public function collate(Collate $collate): Field;
    
    // 
    public function alter();
    //
    public function getName();
    // 返回sql
    public function __toString();
}
```

```php
interface Table
{
    // 表名字 存储引擎
    public function __construct(string $name, Engine $engine);
    // 添加字段
    public function add(Field ...$field): Table;
   // 表备注
    public function comment(string $comment): Table;
    // 表字符集
    public function charset(Charset $charset): Table;
    // 表结果集
    public function collate(Collate $collate): Table;
    // 此方法为表存在的时候调用 传入已经存在的字段 自动过滤 生成alter sql
    public function filter(string ...$args);
    // sql
    public function __toString();
}
```
