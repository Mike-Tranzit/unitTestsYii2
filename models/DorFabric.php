<?php

namespace app\models;

class DorFabric
{
    public static function run($w, $h)
    {
        return new Dor($w, $h);
    }
}

class Dor
{
    public $w, $h, $x = 1;
    
    /**
     * __construct
     *
     * @param  mixed $w
     * @param  mixed $h
     *
     * @return void
     */
    public function __construct($w, $h)
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

    public function extr($x)
    {
        $global = 'Zanyato'; // Тестовый комментарий
        extract($x, EXTR_PREFIX_SAME, "wddx");
        echo $test;
        echo $wddx_global;
    }
    
    public function __unset($payload)
    {
        echo 'remove' . $payload;
    }

}