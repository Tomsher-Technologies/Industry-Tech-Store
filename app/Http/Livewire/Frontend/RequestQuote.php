<?php

namespace App\Http\Livewire\Frontend;

use App\Models\RequestQuote as ModelsRequestQuote;
use Livewire\Component;

class RequestQuote extends Component
{

    public $name;
    public $email;
    public $phone_number;
    public $message_body;

    protected $rules = [
        'name' => ['required'],
        'email' => ['required', 'email'],
        'phone_number' => ['required'],
        'message_body' => ['required'],
    ];

    protected $message = [
        'name.required' => 'Please enter your name',
        'email.required' => 'Please enter your email',
        'email.email' => 'Please enter a valid email',
        'phone_number.required' => 'Please enter your phone number',
        'message_body.required' => 'Please enter a message',
    ];

    public function save()
    {
        $this->validate();

        ModelsRequestQuote::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'message' => $this->message_body,
        ]);

        $this->reset();

        session()->flash('status', 'Your request has been send successfully.');
    }

    public function render()
    {
        return view('livewire.frontend.request-quote');
    }
}
