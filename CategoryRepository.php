<?php namespace VnsModules\News;

use Repositories\Term\TermRepository;

class CategoryRepository extends TermRepository implements CategoryRepositoryInterface
{
    public function getModel()
    {
        return NewsCategory::class;
    }
}