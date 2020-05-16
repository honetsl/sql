<?php
ini_set("display_errors", "On");
use Dispirited\Mysql\Basic\MEngine;
use Dispirited\Mysql\Basic\MIndex;
use Dispirited\Mysql\Facade\Facade;

require "./vendor/autoload.php";

function test()
{
    $table = Facade::Table("user1", MEngine::InnoDB())->add(
//            Facade::Int("id", MIndex::PRIMARY_KEY(), true)->comment("主键id"),
        Facade::Varchar("name")->comment("名字")->length(128),
//            Facade::Text("desc")->comment("详情"),
        Facade::Decimal("price")->length(11)->scale(2)->comment("价格"),
//            Facade::Datetime("created_at")->default("current_timestamp")->comment("创建时间"),
        Facade::Datetime("update_at")->default("current_timestamp")->onUpdate()->comment("更新时间")
    )->comment("用户表");

    $table = Facade::Table("user1", MEngine::InnoDB())->add(
        Facade::Int("id", MIndex::primaryKey(), true)->comment("主键id"),
        Facade::Varchar("name")->comment("名字")->length(128),
        Facade::Text("desc")->comment("详情"),
        Facade::Decimal("price")->length(11)->scale(2)->comment("价格"),
        Facade::Datetime("created_at")->default("current_timestamp")->comment("创建时间"),
        Facade::Datetime("update_at")->default("current_timestamp")->onUpdate()->comment("更新时间")
    )->comment("用户表");
    print_r((string)$table);
}