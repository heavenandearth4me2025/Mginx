<?php

namespace App\Livewire\Rough;

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
    
    public function render()
    {
        return view('livewire.rough.login-flow');
    }
}
