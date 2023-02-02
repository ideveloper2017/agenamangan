<?php

namespace App\Repositories\Menu;

use App\Models\Menu;
use App\Repositories\RepositoryAbstract;

class MenuRepository extends RepositoryAbstract implements MenuInterface
{

    protected $menu;

    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }

    public function all()
    {
        return $this->menu->where('is_published', 1)->where('lang', $this->getLang())->orderBy('order', 'asc')->get();
    }

    public function generateFrontMenu($menu, $parentId = 0, $starter = false)
    {
        $result = null;

        foreach ($menu as $item) {
            if ($item->parent_id == $parentId) {
                $childItem = $this->hasChildItems($item->id);

                $result .= "<li class='menu-item ".(($childItem) ? 'dropdown' : null).(($childItem && $item->parent_id != 0) ? ' dropdown-submenu' : null)."'>
                                <a href='".url($item->url)."' ".(($childItem) ? 'class="dropdown-toggle" data-toggle="dropdown"' : null).">{$item->title}".(($childItem && $item->parent_id == 0) ? '<b class="caret"></b>' : null).'</a>'.$this->generateFrontMenu($menu, $item->id).'
                            </li>';
            }
        }

        return $result ? "\n<ul class='".(($starter) ? ' nav navbar-nav navbar-right ' : null).((!$starter) ? ' dropdown-menu ' : null)."'>\n$result</ul>\n" : null;
    }


    public function getFrontMenuHTML($items)
    {
        return $this->generateFrontMenu($items, 0, true);
    }

    public function hasChildItems($id)
    {
        $count = $this->menu->where('parent_id', $id)->where('is_published', 1)->where('lang', $this->getLang())->get()->count();
        if ($count === 0) {
            return false;
        }

        return true;
    }
}
