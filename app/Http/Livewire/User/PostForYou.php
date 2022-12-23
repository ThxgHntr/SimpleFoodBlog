<?php

namespace App\Http\Livewire\User;

use App\Models\Post;
use App\Http\Livewire\Component\SinglePost;

class PostForYou extends SinglePost
{
    public $tags = [];

    public function mount()
    {
        $post = Post::latest()->get()->first();
        if ($post) {
            $this->post = $post;
            $this->tags = $post->tags()->select('id','name')->limit(5)->get();
        }
    }

    public function render()
    {
        return view('livewire.user.post-for-you');
    }
}
