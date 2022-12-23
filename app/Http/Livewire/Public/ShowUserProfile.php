<?php

namespace App\Http\Livewire\Public;

use App\Models\User;
use App\Models\Post;
use Livewire\Component;

class ShowUserProfile extends Component
{
    public User $user;

    public function render()
    {
        return view('livewire.public.show-user-profile',
            [
                'posts' => $this->user->posts()->orderByDesc('created_at')->paginate(10),
            ]);
    }
}
