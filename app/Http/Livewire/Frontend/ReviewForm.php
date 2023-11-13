<?php

namespace App\Http\Livewire\Frontend;

use App\Models\OrderDetail;
use App\Models\Review;
use Auth;
use Livewire\Component;

class ReviewForm extends Component
{
    public $commentable = [
        'can_comment' => false,
        'has_comment' => false,
    ];

    public $hasCommented = false;

    public $rating = 1;
    public $comment = '';
    public $product_id;
    public $user_id;

    public function mount($product)
    {
        $this->product_id = $product;
        if (Auth::check() && !isAdmin()) {
            $this->user_id = Auth::id();
            $this->commentable = canReview($this->product_id, $this->user_id);
        }
    }

    public function save()
    {
        if ($this->commentable['can_comment']) {
            $review = Review::create([
                'product_id' => $this->product_id,
                'user_id' => $this->user_id,
                'rating' => $this->rating,
                'comment' => $this->comment,
                'status' => 0,
                'viewed' => 0,
            ]);

            $this->hasCommented = true;

        }
        $this->commentable = [
            'can_comment' => false,
            'has_comment' => false,
        ];
    }

    public function render()
    {
        // if (Auth::check() && Auth::user()->user_type == 'customer') {
        //     $this->commentable = true;
        // }
        return view('livewire.frontend.review-form');
    }
}
