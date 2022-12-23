<?php

namespace App\Http\Livewire\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Upload extends Component
{
    public function render()
    {
        return view('livewire.user.upload', 
        [
            'user' => Auth::user(),
        ]);
    }
}
