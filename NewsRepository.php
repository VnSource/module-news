<?php namespace VnsModules\News;

use Repositories\Post\PostRepository;

class NewsRepository extends PostRepository implements NewsRepositoryInterface
{
    public function getModel()
    {
        return News::class;
    }
}