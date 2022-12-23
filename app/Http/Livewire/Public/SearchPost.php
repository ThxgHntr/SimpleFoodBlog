<?php

namespace App\Http\Livewire\Public;

use App\Models\Post;
use Livewire\Component;

class SearchPost extends Component
{
    public $tags = [];

    public function mount($tag)
    {
        array_push($this->tags, $tag);
    }

    public function render()
    {
        $tags = $this->tags;

        return view('livewire.public.search-post',[
            'posts' => Post::whereHas('tags',function ($query) use ($tags) {
                $query->whereIn('name', $tags);
            }, '=', count($tags))->paginate(10),
        ]);
    }
}
