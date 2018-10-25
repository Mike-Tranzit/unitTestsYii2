<?php

namespace app\models;

class FabricExample
{
    public function run()
    {
        $m = new DorFabric(100, 200);
        echo $m->getW();
        echo $m->getH();
    }
}

class Dor
{
    public $w, $h;

    public function __constructor($w, $h)
    {
        list($this->w, $this->h) = [$w, $h];
    }

    public function getW()
    {
        return $this->w;
    }

    public function getH()
    {
        return $this->h;
    }
}

class DorFabric
{
    public function __constructor($w, $h)
    {
        return new Dor($w, $h);
    }
}

