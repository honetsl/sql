<?php
ini_set("display_errors", "On");

use Dispirited\Mysql\Basic\MCharset;
use Dispirited\Mysql\Basic\MCollate;
use Dispirited\Mysql\Basic\MEngine;
use Dispirited\Mysql\Basic\MIndex;
use Dispirited\Mysql\Facade\Facade;

require "./vendor/autoload.php";
echo "<pre>";
function test()
{
//    $table = Facade::Table("user1", MEngine::InnoDB())->add(
////            Facade::Int("id", MIndex::PRIMARY_KEY(), true)->comment("主键id"),
//        Facade::Varchar("name")->comment("名字")->length(128),
////            Facade::Text("desc")->comment("详情"),
//        Facade::Decimal("price")->length(11)->scale(2)->comment("价格"),
////            Facade::Datetime("created_at")->default("current_timestamp")->comment("创建时间"),
//        Facade::Datetime("update_at")->default("current_timestamp")->onUpdate()->comment("更新时间")
//    )->comment("用户表");

    $table = Facade::Table("test1", MEngine::InnoDB())->add(
        Facade::Int("id", MIndex::primaryKey(), 11)->comment("主键id"),
        Facade::Varchar("name")->comment("名字")->length(128),
        Facade::Text("tdesc")->comment("详情text"),
        Facade::Blob("bdesc")->comment("详情blob"),
        Facade::Decimal("price")->length(11)->scale(2)->comment("价格"),
        Facade::Date("created_at")->comment("创建时间")->default("2019-11-11"),
        Facade::Datetime("update_at")->default("current_timestamp")->onUpdate()->comment("更新时间")
    )->comment("用户表")->charset(MCharset::armscii8())->collate(MCollate::armscii8_general_ci());
    print_r((string)$table);
}

test();
