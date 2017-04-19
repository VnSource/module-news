<?php namespace VnsModules\News;

class News extends \Models\Post {

    protected $fillable = ['name', 'slug', 'title', 'image', 'excerpt', 'parent', 'content', 'status', 'comment'];

}
