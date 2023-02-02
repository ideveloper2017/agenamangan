<?php

namespace App\Repositories\Page;
use App\Models\Page;
use App\Repositories\RepositoryAbstract;
use Illuminate\Support\Facades\Config;
use Illuminate\Validation\ValidationException;
use stdClass;

class PageRepositoty extends RepositoryAbstract
{
    protected $perPage;
    protected $page;

    protected static $rules = [
        'title' => 'required|min:3',
        'content' => 'required|min:5', ];


    public function __construct(Page $page)
    {
        $config = Config::get('cms.php');
        $this->perPage = isset($config['per_page'])?$config['per_page']:10;
        $this->page = $page;
    }

    public function getBySlug($slug, $isPublished = false)
    {
        if ($isPublished === true) {
            return $this->page->where('slug', $slug)->where('is_published', true)->first();
        }

        return $this->page->where('slug', $slug)->first();
    }

    public function lists()
    {
        return $this->page->where('lang', $this->getLang())->pluck('title','id');
    }

    public function paginate($page = 1, $limit = 10, $all = false)
    {
        $result = new StdClass();
        $result->page = $page;
        $result->limit = $limit;
        $result->totalItems = 0;
        $result->items = array();

        $query = $this->page->orderBy('created_at', 'DESC')->where('lang', $this->getLang());

        if (!$all) {
            $query->where('is_published', 1);
        }
        $pages = $query->skip($limit * ($page - 1))->take($limit)->get();
        $result->totalItems = $this->totalPages($all);
        $result->items = $pages->all();
        return $result;
    }

    public function find($id)
    {
        return $this->page->find($id);
    }

    public function create($attributes)
    {
        $attributes['is_published'] = isset($attributes['is_published']) ? true : false;
        if ($this->isValid($attributes)) {
            $this->page->lang = $this->getLang();
            $this->page->slug= str_slug($attributes['title']);
            $this->page->fill($attributes)->save();
            return true;
        }
        throw new ValidationException('Page validation failed', $this->getErrors());
    }

    public function update($id, $attributes)
    {
        $attributes['is_published'] = isset($attributes['is_published']) ? true : false;

        $this->page = $this->find($id);

        if ($this->isValid($attributes)) {
            $this->page->slug=str_slug($attributes['title']);
            $this->page->fill($attributes)->save();

            return true;
        }

        throw new ValidationException('Category validation failed', $this->getErrors());
    }

    public function delete($id)
    {
        $this->page->findOrFail($id)->delete();
    }

    public function togglePublish($id)
    {
        $page = $this->page->find($id);
        $page->is_published = ($page->is_published) ? false : true;
        $page->save();

        return response()->json(array('result' => 'success', 'changed' => ($page->is_published) ? 1 : 0));
    }


    protected function totalPages($all = false)
    {
        if (!$all) {
            return $this->page->where('is_published', 1)->where('lang', $this->getLang())->count();
        }

        return $this->page->where('lang', $this->getLang())->count();
    }


}

