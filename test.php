<?php
ini_set("display_errors", "On");

use Dispirited\Mysql\Basic\MCharset;
use Dispirited\Mysql\Basic\MCollate;
use Dispirited\Mysql\Basic\MEngine;
use Dispirited\Mysql\Basic\MIndex;
use Dispirited\Mysql\Factory;

require "./vendor/autoload.php";
echo "<pre>";
function test()
{
//    $table = Factory::Table("user1", MEngine::InnoDB())->add(
////            Factory::Int("id", MIndex::PRIMARY_KEY(), true)->comment("主键id"),
//        Factory::Varchar("name")->comment("名字")->length(128),
////            Factory::Text("desc")->comment("详情"),
//        Factory::Decimal("price")->length(11)->scale(2)->comment("价格"),
////            Factory::Datetime("created_at")->default("current_timestamp")->comment("创建时间"),
//        Factory::Datetime("update_at")->default("current_timestamp")->onUpdate()->comment("更新时间")
//    )->comment("用户表");

    $table = Factory::Table("test3", MEngine::InnoDB())->addFields(
        Factory::Int("id", MIndex::primaryKey())->comment("主键id"),
        Factory::BigInt("ids")->comment("主键id"),
        Factory::Varchar("name")->comment("名字")->length(128),
        Factory::Text("tdesc", MIndex::fulltext())->comment("详情text"),
        Factory::Blob("bdesc")->comment("详情blob"),
        Factory::Decimal("price")->length(11)->scale(2)->comment("价格"),
        Factory::Date("created_at")->comment("创建时间")->default("2019-11-11"),
        Factory::Datetime("update_at")->default("current_timestamp")->onUpdate()->comment("更新时间")
    )->comment("用户表")->charset(MCharset::armscii8())->collate(MCollate::armscii8_general_ci());
    print_r((string)$table);
}

test();
