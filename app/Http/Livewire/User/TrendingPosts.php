<?php

namespace App\Http\Livewire\User;

use App\Http\Livewire\Component\SinglePost;

class TrendingPosts extends SinglePost
{
    public function render()
    {
        return view('livewire.user.trending-posts', [
            'tags' => $this->post->tags()->select('id','name')->limit(2)->get(),
        ]);
    }
}
