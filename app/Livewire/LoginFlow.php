<?php

namespace App\Livewire;

use Livewire\Component;

class LoginFlow extends Component
{
    public $step = 'email';
    public $email;
    public $password;

    public function submitEmail()
    {
        $this->validate([
            'email' => 'required|email',
        ]);

        // Optionally check if user exists
        $this->step = 'password';
    }

    public function submitPassword()
    {
        $this->validate([
            'password' => 'required',
        ]);

        //if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
        //     session()->flash('message', 'Login successful!');
        //     return redirect()->to('/dashboard');
        // } else {
        //     session()->flash('error', 'Invalid credentials.');
        // }
    }

    public function render()
    {
        return view('livewire.login-flow');
    }

    public function redirectToMicrosoft()
    {
        $this->dispatchBrowserEvent('redirect-to-microsoft');
    }

}
