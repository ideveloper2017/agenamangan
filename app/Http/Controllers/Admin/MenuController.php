<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;

class MenuController extends Controller
{
    protected $menu;


    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }

    public function index()
    {
        $menu = $this->menu->find(null);

        $items = $this->menu->orderBy('order', 'asc')->get();
        $menus = $this->menu->getMenuHTML($items);
        $langs=   Language::pluck('code','code');
        $options = $this->menu->getMenuOptions();
        return view('backend.menu.index', compact('menus','menu','langs','options'));
    }

    public function create()
    {

        return view('backend.menu.create');
    }


    public function store(Request $request)
    {
        $formData = $request->all();

        if ($formData['type'] == 'module') {
            $option = $formData['option'];
            $url = $this->menu->getUrl($option);
            $formData['url'] = $url;
        }

        $host = $_SERVER['SERVER_NAME'];
        $urlInfo = parse_url($formData['url']);

        $rules = array(
            'title' => 'required',
            'url' => 'required',
        );

        $validation = Validator::make($formData, $rules);

        if ($validation->fails()) {
            return redirect(route('admin.menu.create'))->withErrors($validation)->withInput();
        }

        $this->menu->fill($formData);
        $this->menu->order = $this->menu->getMaxOrder() + 1;

        if (isset($urlInfo['host'])) {
            $url = ($host == $urlInfo['host']) ? $urlInfo['path'] : $formData['url'];
        } else {
            $url = ($formData['type'] == 'module') ? $formData['url'] : 'http://'.$formData['url'];
        }

        $this->menu->lang = $formData['lang'];
        $this->menu->parent_id=0;

        $this->menu->is_published=$formData['is_public'];
        $this->menu->url = $url;
        $this->menu->save();

          Flash::message('Menu was successfully added');

        return redirect(route('admin.menus.index'));
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $menu = $this->menu->find($id);

        $items = $this->menu->orderBy('order', 'asc')->get();
        $menus = $this->menu->getMenuHTML($items);
        $langs=   Language::pluck('code','code');
        $options = $this->menu->getMenuOptions();
        return view('backend.menu.edit',compact('menus','langs','menu', 'options'));
    }


    public function update(Request $request, $id)
    {
        $formData = $request->all();

        if ($formData['type'] == 'module') {
            $option = $formData['option'];
            $url = $this->menu->getUrl($option);
            $formData['url'] = $url;
        }

        $host = $_SERVER['SERVER_NAME'];
        $urlInfo = parse_url($formData['url']);

        $rules = array(
            'title' => 'required',
            'url' => 'required',
        );

        $validation = Validator::make($formData, $rules);

        if ($validation->fails()) {
            return redirect(route('admin.menu.create'))->withErrors($validation)->withInput();
        }

        $this->menu = $this->menu->find($id);
        $this->menu->fill($formData);

        if (isset($urlInfo['host'])) {
            $url = ($host == $urlInfo['host']) ? $urlInfo['path'] : $formData['url'];
        } else {
            $url = ($formData['type'] == 'module') ? $formData['url'] : 'http://'.$formData['url'];
        }

        $this->menu->lang = $formData['lang'];
        $this->menu->is_published=$formData['is_public'];
        $this->menu->url = $url;
        $this->menu->save();


//        Flash::message('Menu was successfully updated');

        return redirect(route('admin.menus.index'));
    }

    public function destroy($id)
    {
        //
    }

    public function save()
    {
        $this->menu->changeParentById($this->menu->parseJsonArray(json_decode(request()->get('json'), true)));

        return response()->json(array('result' => 'success'));
    }

    public function togglePublish($id)
    {
        $this->menu = $this->menu->find($id);
        $this->menu->is_published = ($this->menu->is_published) ? false : true;
        $this->menu->save();

        return response()->json(array('result' => 'success', 'changed' => ($this->menu->is_published) ? 1 : 0));
    }
}
