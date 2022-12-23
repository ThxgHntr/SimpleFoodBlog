<?php

namespace App\Http\Livewire\Component;

use App\Models\User;
use Livewire\Component;

class UserLink extends Component
{
    public User $user;

    public function userProfile()
    {
        return to_route('profile.show', $this->user);
    }

    public function render()
    {
        return view('livewire.component.user-link');
    }
}
