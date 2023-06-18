<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Cart;
use Auth;
use Cache;
use Livewire\Component;

class MiniCart extends Component
{
    public $carts;
    public $user_col;
    public $user_id;

    protected $listeners = ['cartUpdated' => 'cartUpdated'];

    public function mount()
    {
        if (Auth::check()) {
            $this->user_col = 'user_id';
            $this->user_id = Auth::id();
        } else {
            $this->user_col = 'temp_user_id';
            $this->user_id = getTempUserId();
        }
    }

    public function remove($id)
    {
        Cart::where([
            'id' => $id,
            $this->user_col => $this->user_id,
        ])->delete();

        Cache::forget('user_cart_count_' . $this->user_id);

        $this->dispatchBrowserEvent('updateCartCount', [
            'count' => cartCount()
        ]);
    }

    public function render()
    {
        $this->carts = Cart::where($this->user_col, $this->user_id)->get();
        $this->carts->load('product');
        return view('livewire.frontend.mini-cart');
    }

    public function cartUpdated()
    {
        $this->render();
    }
}
