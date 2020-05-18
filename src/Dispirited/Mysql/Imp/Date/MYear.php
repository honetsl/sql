<?php


namespace Dispirited\Mysql\Imp\Date;


class MYear extends MTime
{
    protected string $_type = "year";
    protected int $_scale = 4;
}