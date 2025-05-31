<?php

namespace App\Services;

use jcobhams\NewsApi\NewsApi;

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
                page_size: $pageSize
            );
        } catch (\Exception $e) {
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
                page_size: $pageSize
            );
        } catch (\Exception $e) {
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
            return null;
        }
    }


}