<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Repositories\Article\ArticleRepository;
use App\Repositories\Category\CategoryRepository;
use App\Services\Pagination;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Laracasts\Flash\Flash;

class ArticleController extends Controller
{
    protected $article;
    protected $category;
    protected $perPage;

    public function __construct(ArticleRepository $article, CategoryRepository $category)
    {
//        View::share('active', 'blog');
        $this->article = $article;
        $this->category = $category;
        $this->perPage = config('cms.modules.article.per_page');
    }

    public function index()
    {
        $pagiData = $this->article->paginate(request()->get('page', 1), $this->perPage, true);
        $articles = Pagination::makeLengthAware($pagiData->items, $pagiData->totalItems, $this->perPage);
        return view('backend.article.index', compact('articles'));
    }


    public function create()
    {
        $categories = $this->category->lists();
//        $categories = Categories::all();

        return view('backend.article.create', compact('categories'));
    }


    public function store(Request $request)
    {
        try {
            $this->article->create($request->all());
            Flash::message('Article was successfully added');

            return langRedirectRoute('admin.article.index');
        } catch (ValidationException $e) {
            return langRedirectRoute('admin.article.create')->withInput()->withErrors($e->getErrors());
        }
    }

    public function show($id)
    {
        $article = $this->article->find($id);

        return view('backend.article.show', compact('article'));
    }


    public function edit($id)
    {
        $article = $this->article->find($id);
        $tags = null;

        foreach ($article->tags as $tag) {
            $tags .= ','.$tag->name;
        }

        $tags = substr($tags, 1);
        $categories = $this->category->lists();

        return view('backend.article.edit', compact('article', 'tags', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id)
    {
        try {
            $this->article->update($id, request()->all());
            Flash::message('Article was successfully updated');

            return langRedirectRoute('admin.article.index');
        } catch (\App\Exceptions\Validation\ValidationException $e) {
            return langRedirectRoute('admin.article.edit')->withInput()->withErrors($e->getErrors());
        }
    }

    public function destroy($id)
    {
        $this->article->delete($id);
        Flash::message('Article was successfully deleted');
        return langRedirectRoute('admin.article.index');
    }

    public function confirmDestroy($id)
    {
        $article = $this->article->find($id);
        return view('backend.article.confirm-destroy', compact('article'));
    }

    public function togglePublish($id)
    {
        return $this->article->togglePublish($id);
    }
}
