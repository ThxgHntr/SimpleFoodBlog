<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LikeButton extends Component
{
    public Post $post;
    public $liked;

    public function mount()
    {
        $this->liked = $this->liked();
    }

    public function liked()
    {
        return Auth::user()->likes->firstWhere('post_id', $this->post->id) != null;
    }

    public function like()
    {
        $this->liked()
        ? Auth::user()->likes->firstWhere('post_id', $this->post->id)->delete()
        : $this->post->addLikeByUser(Auth::user());
        
        return $this->post->likes->fresh();
    }

    public function render()
    {
        return view('livewire.post.like-button');
    }
}
