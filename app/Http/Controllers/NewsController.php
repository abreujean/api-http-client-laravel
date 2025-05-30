<?php

namespace App\Http\Controllers;
use App\Services\NewsService;
use Illuminate\Http\Request;

class NewsController extends Controller
{
protected $newsService;

    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    /**
     * find new by term (q)
     */
    public function search(Request $request)
    {
        $request->validate([
            'q' => 'required|string|min:2',
            'pageSize' => 'sometimes|integer|min:1|max:100'
        ]);

        $results = $this->newsService->searchNews(
            $request->q,
            $request->input('pageSize', 10)
        );

        return $this->apiResponse($results);
    }

    /**
     * Top news by country (top-headlines)
     */
    public function topHeadlines(Request $request)
    {
        $request->validate([
            'country' => 'required|string|size:2',
            'pageSize' => 'sometimes|integer|min:1|max:100'
        ]);

        $results = $this->newsService->topHeadlines(
            $request->country,
            $request->input('pageSize', 10)
        );

        return $this->apiResponse($results);
    }

    /**
     * Sources by category and country (top-headlines/sources)
     */
    public function sources(Request $request)
    {
        $request->validate([
            'category' => 'required|string',
            'country' => 'required|string|size:2'
        ]);

        $results = $this->newsService->sourcesByCategory(
            $request->category,
            $request->country
        );

        return $this->apiResponse($results);
    }

    /**
     * Method to format the API response
     */
    protected function apiResponse($data)
    {
        if (!$data) {
            return response()->json([
                'message' => 'Falha ao buscar notícias',
                'success' => false
            ], 502);
        }

        return response()->json([
            'data' => $data,
            'success' => true
        ]);
    }
}
