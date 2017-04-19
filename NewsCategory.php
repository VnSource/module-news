<?php namespace VnsModules\News;

class NewsCategory extends \Models\Term {

    protected $fillable = ['name', 'slug', 'title', 'content', 'order', 'parent', 'status'];

    public function childrens()
    {
        return $this->hasMany('VnsModules\News\NewsCategory', 'parent');
    }
}
