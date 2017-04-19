<?php namespace VnsModules\News\Controllers\Backend;

use Illuminate\Http\Request;
use VnsModules\News\StoreRequest;
use VnsModules\News\UpdateRequest;
use VnsModules\News\NewsRepositoryInterface as NewsRepository;

class NewsController extends \App\Http\Controllers\Controller
{
    protected $news;

    public function __construct(NewsRepository $news)
    {
        $this->news = $news;
    }

    public function index(Request $request)
    {
        list($news, $total) = $this->news->filter($request->all());
        return response()->json($news)->header('total', $total);
    }

    public function show($id)
    {
        $news = $this->news->find($id);
        return response()->json($news);
    }

    public function store(StoreRequest $request)
    {
        $news = $this->news->create($request->all());
        return response()->json($news);
    }

    public function update(UpdateRequest $request, $id)
    {
        $news = $this->news->update($id, $request->all());
        return response()->json($news);
    }

    public function destroy($id)
    {
        $news = $this->news->delete($id);
        return response()->json($news);
    }
}
