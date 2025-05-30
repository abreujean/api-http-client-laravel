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
    public function search($q, $pageSize = 10)
    {
        $results = $this->newsService->searchNews(
            $q,
            $pageSize
        );

        return $this->apiResponse($results);
    }

    /**
     * Top news by country (top-headlines)
     */
    public function topHeadlines($country, $pageSize = 10)
    {
        $results = $this->newsService->topHeadlines(
            $country,
            $pageSize
        );

        return $this->apiResponse($results);
    }

    /**
     * Sources by category and country (top-headlines/sources)
     */
    public function sources($category, $country)
    {
        $results = $this->newsService->sourcesByCategory(
            $category,
            $country
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
