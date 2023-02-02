<?php

namespace App\Repositories\Category;

use App\Models\Categories;
use App\Repositories\RepositoryAbstract;
use Illuminate\Support\Facades\Config;
use Illuminate\Validation\ValidationException;
use stdClass;

class CategoryRepository extends RepositoryAbstract{
    protected $perPage;
    protected $category;

    protected static $rules = [
        'title' => 'required|min:3|unique:categories',
    ];

    public function __construct(Categories $category)
    {
        $this->category = $category;
        $config = Config::get('cms');
        $this->perPage = $config['per_page'];
    }

    public function all()
    {
        return $this->category->where('lang', $this->getLang())->get();
    }

    public function paginate($page = 1, $limit = 10, $all = false)
    {
        $result = new StdClass();
        $result->page = $page;
        $result->limit = $limit;
        $result->totalItems = 0;
        $result->items = array();
        $query = $this->category->orderBy('title');
        $categories = $query->skip($limit * ($page - 1))->take($limit)->where('lang', $this->getLang())->get();
        $result->totalItems = $this->totalCategories();
        $result->items = $categories->all();
        return $result;
    }

    public function lists()
    {
        return $this->category->where('lang', $this->getLang())->pluck('name', 'id');
    }

    public function find($id)
    {
        return $this->category->findOrFail($id);
    }

    public function getArticlesBySlug($slug)
    {
        return $this->category->where('slug', $slug)->where('lang', $this->getLang())->first()->articles()->paginate($this->perPage);
    }

    public function create($attributes)
    {
        if ($this->isValid($attributes)) {
            $this->category->lang = $this->getLang();
            $this->category->fill($attributes)->save();
            return true;
        }
        throw new ValidationException('Category validation failed', $this->getErrors());
    }

    public function update($id, $attributes)
    {
        $this->category = $this->find($id);

        if ($this->isValid($attributes)) {
            $this->category->resluggify();
            $this->category->fill($attributes)->save();

            return true;
        }

        throw new ValidationException('Category validation failed', $this->getErrors());
    }

    public function delete($id)
    {
        $this->category = $this->category->find($id);
        $this->category->articles()->delete($id);
        $this->category->delete();
    }

    protected function totalCategories()
    {
        return $this->category->where('lang', $this->getLang())->count();
    }
}
