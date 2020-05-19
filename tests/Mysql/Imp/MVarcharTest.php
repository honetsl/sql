<?php

use Dispirited\Mysql\Basic\MCharset;
use Dispirited\Mysql\Basic\MCollate;
use Dispirited\Mysql\Basic\MEngine;
use Dispirited\Mysql\Basic\MIndex;
use Dispirited\Mysql\Facades\Facade;
use PHPUnit\Framework\TestCase;

class MVarcharTest extends TestCase
{
    public function testVarchar()
    {
        $varchar = Facade::Varchar("varchar")
            ->length("256")
            ->comment("varchar类型")
            ->default("dada")
            ->null();
        $this->assertInstanceOf(\Dispirited\Basic\Field::class, $varchar, "");
    }

    public function testTable()
    {
        $table = Facade::Table("xxx",1);

        $table = Facade::Table("test1", MEngine::InnoDB())->add(
            Facade::Int("id", MIndex::primaryKey(), 11)->comment("主键id"),
            Facade::Varchar("name")->comment("名字")->length(128),
            Facade::Text("tdesc")->comment("详情text"),
            Facade::Blob("bdesc")->comment("详情blob"),
            Facade::Decimal("price")->length(11)->scale(2)->comment("价格"),
            Facade::Date("created_at")->comment("创建时间")->default("2019-11-11"),
            Facade::Datetime("update_at")->default("current_timestamp")->onUpdate()->comment("更新时间")
        )->comment("用户表")->charset(MCharset::armscii8())->collate(MCollate::armscii8_general_ci());
        $this->assertInstanceOf(\Dispirited\Basic\Table::class, $table, "");

        $table = Facade::Table("test1", MEngine::Memory())->add(
            Facade::Int("id", MIndex::primaryKey(), 11)->comment("主键id"),
            Facade::Varchar("name")->comment("名字")->length(128),
            Facade::Text("tdesc")->comment("详情text"),
            Facade::Blob("bdesc")->comment("详情blob"),
            Facade::Decimal("price")->length(11)->scale(2)->comment("价格"),
            Facade::Date("created_at")->comment("创建时间")->default("2019-11-11"),
            Facade::Datetime("update_at")->default("current_timestamp")->onUpdate()->comment("更新时间")
        )->comment("用户表")->charset(MCharset::armscii8())->collate(MCollate::armscii8_general_ci());
        $this->assertInstanceOf(\Dispirited\Basic\Table::class, $table, "");

        $table = Facade::Table("test1", MEngine::MyISAM())->add(
            Facade::Int("id", MIndex::primaryKey(), 11)->comment("主键id"),
            Facade::Varchar("name")->comment("名字")->length(128),
            Facade::Text("tdesc")->comment("详情text"),
            Facade::Blob("bdesc")->comment("详情blob"),
            Facade::Decimal("price")->length(11)->scale(2)->comment("价格"),
            Facade::Date("created_at")->comment("创建时间")->default("2019-11-11"),
            Facade::Datetime("update_at")->default("current_timestamp")->onUpdate()->comment("更新时间")
        )->comment("用户表")->charset(MCharset::armscii8())->collate(MCollate::armscii8_general_ci());
        $this->assertInstanceOf(\Dispirited\Basic\Table::class, $table, "");
    }

    public function testAll()
    {
        $table = Facade::Table("test1", MEngine::InnoDB())->add(
            Facade::Varchar("varchar1", MIndex::primaryKey())->length(23),
            Facade::Varchar("varchar2", MIndex::unique())->length(23),
            Facade::Varchar("varchar3", MIndex::index())->length(23),
            Facade::Varchar("varchar4", MIndex::fulltext())->length(23)
        )->comment("test1表");
        print_r((string)$table);
        $this->assertInstanceOf(\Dispirited\Basic\Table::class, $table, "");

        $table = Facade::Table("test2", MEngine::InnoDB())->add(
            Facade::Date("date"),
            Facade::Time("time"),
            Facade::Datetime("datetime"),
            Facade::Year("year")->scale(4),
            Facade::TimeStamp("timestamp"),
        )->comment("time类型");
        print_r((string)$table);
        $this->assertInstanceOf(\Dispirited\Basic\Table::class, $table, "");
        $table = Facade::Table("test3", MEngine::InnoDB())->add(
            Facade::Date("date"),
            Facade::Time("time")->scale(3),
            Facade::Datetime("datetime")->scale(3),
            Facade::Year("year")->scale(4),
            Facade::TimeStamp("timestamp")->scale(3),
        )->comment("time类型");
        print_r([(string)$table]);
        $this->assertInstanceOf(\Dispirited\Basic\Table::class, $table, "");
    }


}