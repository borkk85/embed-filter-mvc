<?php
class Pages extends Controller {
    protected $review;
    protected $filter;

    public function __construct()
    {        
        $this->review = $this->model('Review');
        $this->filter = $this->model('Filter');
    }

    public function index() {
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get the form values
            $options = [
                'sort_rating' => $_POST['sort_rating'],
                'minimum_rating' => $_POST['minimum_rating'],
                'sort_by_date' => $_POST['sort_by_date'],
                'text_priority' => $_POST['text_priority']
            ];
            
            // Get the filtered reviews
            $filtered_reviews = $this->filter->filterReviews($this->review->getReview(), $options);
        } else {
            // Get all reviews when no filter is applied
            $filtered_reviews = $this->review->getReview();
        }
        
        if (!is_array($filtered_reviews)) {
            $filtered_reviews = [];
        }
        
        $data = [
            'reviews' => $filtered_reviews
        ];
        $this->view('index', $data);
    }


    public function filter() {
        $this->view('filter');
    }
}