<?php

namespace App\Helpers;

use Spatie\Menu\Link;

class Menu
{

    protected  $menus=[];


    public function __consturct(){
        $this->menus['menus']['item']='General';
        //,'menu_item'=>['title'=>'Dashboard']]];
    }

    public static function render()
    {

    }

    public static function create($menu,\Closure $closure){


    }
}
