<?php namespace VnsModules\News\Controllers;

use Illuminate\Http\Request;
use VnsModules\News\NewsRepositoryInterface as NewsRepository;

class NewsController extends \Http\Controllers\FrontEndController
{
    protected $news;

    public function __construct(NewsRepository $news)
    {
        parent::__construct();
        $this->news = $news;
    }

    public function displayCategory($category) {
        $data = [
            'category' => $category,
            'list' => $this->news->pagination($category->id),
            'breadcrumb' => breadcrumb($category->name)
        ];

        return view('VnsModules\News::list', $data);
    }

    public function displayPost($post) {
        $data = [
            'post' => $post,
            'breadcrumb' => breadcrumb($post->name)
        ];

        return view('VnsModules\News::detail', $data);
    }
}