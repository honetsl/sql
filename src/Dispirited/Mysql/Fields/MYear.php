<?php


namespace Dispirited\Mysql\Fields;


class MYear extends MTime
{
    protected $_type = "year";
    protected $_scale = 4;
}