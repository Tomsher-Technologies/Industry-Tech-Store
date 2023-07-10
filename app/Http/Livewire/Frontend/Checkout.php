<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\CouponUsage;
use Auth;
use Livewire\Component;

class Checkout extends Component
{

    public $user_col = "";
    public $user_id = "";
    public $carts;
    public $country;
    public $addresses;

    public $sub_total = 0;
    public $coupon_rate = 0;
    public $shipping_rate = 0;
    public $copupn_applied = false;
    public $total = 0;

    public function mount()
    {
        if (Auth::check()) {
            $this->user_col = "user_id";
            $this->user_id = Auth::id();
        } else {
            $this->user_col = "temp_user_id";
            $this->user_id = getTempUserId();
        }

        $this->carts = Cart::where($this->user_col, $this->user_id)->with('product')->get();

        if ($this->carts->count()) {
            // Apply coupons
            $coupon_code = null;
            foreach ($this->carts as $cart) {
                $this->sub_total += $cart->quantity * $cart->price;
                if ($cart->coupon_applied) {
                    $this->coupon_rate += $cart->discount;
                    $coupon_code = $cart->coupon_code;
                    $this->copupn_applied  = true;
                }
            }

            

            if ($coupon_code) {
                $coupon = Coupon::whereCode($coupon_code)->first();
                if ($coupon) {
                    $can_use_coupon = false;
                    if (strtotime(date('d-m-Y')) >= $coupon->start_date && strtotime(date('d-m-Y')) <= $coupon->end_date) {
                        $coupon_used = CouponUsage::where($this->user_col, $this->user_id)->where('coupon_id', $coupon->id)->first();
                        if ($coupon->one_time_use && $coupon_used == null) {
                            $can_use_coupon = true;
                        }
                    } else {
                        $can_use_coupon = false;
                    }
                }

                if ($can_use_coupon) {
                    $coupon_details = json_decode($coupon->details);

                    if ($coupon->type == 'cart_base') {
                        $sum = 0;

                        foreach ($this->carts  as $key => $cartItem) {
                            $sum += $cartItem['price'] * $cartItem['quantity'];
                        }

                        if ($sum >= $coupon_details->min_buy) {
                            if ($coupon->discount_type == 'percent') {
                                $coupon_discount = ($sum * $coupon->discount) / 100;
                                if ($coupon_discount > $coupon_details->max_discount) {
                                    $coupon_discount = $coupon_details->max_discount;
                                }
                            } elseif ($coupon->discount_type == 'amount') {
                                $coupon_discount = $coupon->discount;
                            }
                        }
                    } elseif ($coupon->type == 'product_base') {
                        $coupon_discount = 0;
                        foreach ($this->carts as $key => $cartItem) {
                            foreach ($coupon_details as $key => $coupon_detail) {
                                if ($coupon_detail->product_id == $cartItem['product_id']) {
                                    if ($coupon->discount_type == 'percent') {
                                        $coupon_discount += ($cartItem['price'] * $coupon->discount / 100) * $cartItem['quantity'];
                                    } elseif ($coupon->discount_type == 'amount') {
                                        $coupon_discount += $coupon->discount * $cartItem['quantity'];
                                    }
                                }
                            }
                        }
                    }

                    $this->copupn_applied = true;
                }
            }
        }

        if ($this->carts->count() && Auth::check()) {
            $this->addresses = Address::with([
                'country',
                'city',
                'state',
            ])->whereUserId($this->user_id)->orderBy('set_default', 'desc')->get();
        }

        // dd($this->copupn_applied);

        $this->total = ($this->sub_total - $this->coupon_rate) + $this->shipping_rate;

        // $country = Country::whereStatus(1);
    }



    public function render()
    {
        
        return view('livewire.frontend.checkout')->extends('frontend.layouts.app');
    }
}
