<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Page\PageRepositoty;
use App\Services\Pagination;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Laracasts\Flash\Flash;

class PageController extends Controller
{
    protected $page;
    protected $perPage;

    public function __construct(PageRepositoty $page)
    {
       // View::share('active', 'modules');
        $this->page = $page;
        $this->perPage = config('cms.per_page');
    }


    public function index()
    {
        $pagiData = $this->page->paginate(request()->get('page', 1), $this->perPage, true);
        $pages = Pagination::makeLengthAware($pagiData->items, $pagiData->totalItems, $this->perPage);

        return view('backend.page.index', compact('pages'));
    }


    public function create()
    {
        return view('backend.page.create');
    }


    public function store(Request $request)
    {

        try {
            $data=$request->except('_tokent');
            $this->page->create($data);
            Flash::message('Page was successfully added');
            return redirect(route('admin.page.index'));
        } catch (ValidationException $e) {
            return redirect(route('backend.page.create'))->withInput()->withErrors($e->getErrors());
        }
    }


    public function show($id)
    {
        $page = $this->page->find($id);
        return view('backend.page.show', compact('page'));
    }


    public function edit($id)
    {
        $page = $this->page->find($id);
        return view('backend.page.edit', compact('page'));
    }

    public function update($id)
    {
        try {
            $this->page->update($id, request()->all());
            Flash::message('Page was successfully updated');

            return redirect(route('admin.page.index'));
        } catch (ValidationException $e) {
            return redirect(route('admin.page.edit'))->withInput()->withErrors($e->getErrors());
        }
    }


    public function destroy($id)
    {
        $this->page->delete($id);
        Flash::message('Page was successfully deleted');

        return redirect(route('admin.page.index'));
    }


    public function confirmDestroy($id)
    {
        $page = $this->page->find($id);

        return view('backend.page.confirm-destroy', compact('page'));
    }

    public function togglePublish($id)
    {
        return $this->page->togglePublish($id);
    }
}
