<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;

class SinglePost extends Component
{
    public $post;

    public function readMore()
    {
        return to_route('post.show', $this->post->slug);
    }

    public function render()
    {
        return view('livewire.component.single-post', [
            'tags' => $this->post->tags()->select('id','name')->limit(5)->get(),
        ]);
    }
}
