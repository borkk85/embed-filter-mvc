<?php

class Filter
{


    public function filterReviews($reviews, $options)
    {
        $reviews = $this->filterByRating($reviews, $options['minimum_rating']);
        $reviews = $this->sortByRating($reviews, $options['sort_rating']);
        $reviews = $this->prioritizeTxt($reviews, $options['text_priority']);
        $reviews = $this->sortByDate($reviews, $options['sort_by_date']);

        return $reviews;
    }


    public function sortByRating($reviews, $sort_rating)
    {
        usort($reviews, function ($a, $b) use ($sort_rating) {
            return $sort_rating === 'highest' ? $b['rating'] <=> $a['rating'] : $a['rating'] <=> $b['rating'];
        });
        return $reviews;
    }

    public function filterByRating($reviews, $minimum_rating)
    {
        $filtered_reviews = [];

        foreach ($reviews as $review) {
            if ($review['rating'] >= $minimum_rating) {
                $filtered_reviews[] = $review;
            }
        }

        return $filtered_reviews;
    }

    public function sortByDate($reviews, $sort_by_date)
    {
        $sorted_reviews = [];
        for ($rating = 5; $rating >= 1; $rating--) {
            $reviews_by_rating = array_filter($reviews, function ($review) use ($rating) {
                return $review['rating'] == $rating;
            });

            usort($reviews_by_rating, function ($a, $b) use ($sort_by_date) {
                $comparison = strtotime($a['reviewCreatedOnDate']) - strtotime($b['reviewCreatedOnDate']);
                return $sort_by_date === 'newest' ? -$comparison : $comparison;
            });

            $sorted_reviews = array_merge($sorted_reviews, $reviews_by_rating);
        }
        return $sorted_reviews;
    }


    public function prioritizeTxt($reviews, $text_priority)
    {
        if ($text_priority === 'yes') {
            usort($reviews, function ($a, $b) {
                return strlen($b['reviewText']) <=> strlen($a['reviewText']);
            });
        } else {
            // Remove reviews with empty reviewText
            $reviews = array_filter($reviews, function ($review) {
                return !empty($review['reviewText']);
            });
        }
        return $reviews;
    }
}
