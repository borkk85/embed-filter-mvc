<?php

class Review {
    private $reviews;

    public function __construct()
    {
        $this->loadReview();
    }

    public function loadReview() {
        $jsonPath = '../public/data/reviews.json';
        $jsonData = file_get_contents($jsonPath);
        $this->reviews = json_decode($jsonData, true);
    }

    public function getReview() {
        return $this->reviews;
    }

}