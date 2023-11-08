<?php

namespace App\Http\Livewire\Frontend;

use App\Mail\Admin\NewCareer;
use App\Models\Frontend\Careers;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mail;

class Career extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $phone_number;
    public $qualification;
    public $current_status = 'Employed';
    public $gender = 'Male';
    public $years_of_experience;
    public $resume;

    public $resume_file;

    protected $rules = [
        'name' => ['required'],
        'email' => ['required', 'email'],
        'phone_number' => ['required'],
        'qualification' => ['required'],
        'current_status' => ['required'],
        'gender' => ['required'],
        'years_of_experience' => ['required'],
        'resume_file' => ['required', 'file', 'max:3024'],
    ];

    protected $message = [
        'name.required' => 'Please enter your name',
        'email.required' => 'Please enter your email',
        'email.email' => 'Please enter a valid email',
        'phone_number.required' => 'Please enter your phone number',
        'qualification.required' => 'Please enter your qulification',
        'current_status.required' => 'Please enter your current work status',
        'gender.required' => 'Please select your gender',
        'years_of_experience.required' => 'Please enter your years of experiance',
        'resume_file.required' => 'Please upload your resume',
    ];

    public function submit()
    {
        $this->validate();

        $fileName = $this->resume_file->getClientOriginalName();
        $this->resume = $this->resume_file->storeAs('resumes', time() . '-' . $fileName, 'public');

        $career = Careers::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'qualification' => $this->qualification,
            'current_status' => $this->current_status,
            'gender' => $this->gender,
            'years_of_experience' => $this->years_of_experience,
            'resume' => $this->resume,
        ]);

        Mail::to(getAdminEmail())->queue(new NewCareer($career));

        $this->reset();

        session()->flash('status', 'Your resume has been succefully submited.');
    }

    public function render()
    {
        return view('livewire.frontend.career');
    }
}
