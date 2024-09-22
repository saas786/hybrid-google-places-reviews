<?php

namespace Hybrid\GoogleReviews;

use Illuminate\Support\Facades\Http;
use Hybrid\Tools\Collection;

class GoogleReviews
{
    protected $apiKey;
    protected $placeId;
    protected $maxReviews;

    public function __construct()
    {
        $this->apiKey = config('google-reviews.api_key');
        $this->placeId = config('google-reviews.place_id');
        $this->maxReviews = config('google-reviews.max_reviews');
    }

    /**
     * Fetch reviews from Google Places API.
     *
     * @return Collection
     */
    public function fetchReviews(): Collection {
        $url = "https://maps.googleapis.com/maps/api/place/details/json";
        $response = Http::get($url, [
            'place_id' => $this->placeId,
            'fields' => 'reviews',
            'key' => $this->apiKey,
        ]);

        // Check for API errors
        if ($response->failed() || !$response->json('result.reviews')) {
            return collect([]);
        }

        // Transform the response into a collection of reviews
        return collect($response->json('result.reviews'))
            ->take($this->maxReviews)
            ->map(function ($review) {
                return [
                    'author_name' => $review['author_name'],
                    'profile_photo_url' => $review['profile_photo_url'] ?? null,
                    'rating' => $review['rating'],
                    'text' => $review['text'],
                    'relative_time_description' => $review['relative_time_description'],
                ];
            });
    }
}
