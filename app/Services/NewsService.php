<?php

namespace App\Services;

use jcobhams\NewsApi\NewsApi;
use Illuminate\Support\Facades\Log;

class NewsService
{
    protected $newsApi;

    public function __construct()
    {
        $this->newsApi = new NewsApi(env('NEWS_API_KEY'));
    }

    /**
     * find news by term
     */
   public function searchNews(string $query, int $pageSize = 10)
    {
        try {
            return $this->newsApi->getEverything(
                q: $query,
                pageSize: $pageSize
            );
        } catch (\Exception $e) {
            Log::error('NewsAPI search error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * find top headlines by country
     */
    public function topHeadlines(string $country, int $pageSize = 10)
    {
        try {
            return $this->newsApi->getTopHeadlines(
                country: $country,
                pageSize: $pageSize
            );
        } catch (\Exception $e) {
            Log::error('NewsAPI top headlines error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Find top headlines by category and country
     */
   public function sourcesByCategory(string $category, string $country)
    {
        try {
            return $this->newsApi->getSources(
                category: $category,
                country: $country
            );
        } catch (\Exception $e) {
            Log::error('NewsAPI sources error: ' . $e->getMessage());
            return null;
        }
    }


}