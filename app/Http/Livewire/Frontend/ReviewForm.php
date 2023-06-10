<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Review;
use Auth;
use Livewire\Component;

class ReviewForm extends Component
{
    public $commentable = true;

    public $rating = 0;
    public $comment;
    public $product_id;

    public function mount($product)
    {
        $this->product_id = $product;
    }

    public function save()
    {

        dd($this->rating);

        if ($this->commentable) {
            $review = Review::create([
                'product_id' => $this->product_id,
                'user_id' => $this->product_id,
            ]);
        }
    }

    public function render()
    {
        if (Auth::check() && Auth::user()->user_type == 'customer') {
            $this->commentable = true;
        }
        return view('livewire.frontend.review-form');
    }
}
