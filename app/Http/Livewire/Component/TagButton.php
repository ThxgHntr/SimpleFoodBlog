<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;

class TagButton extends Component
{
    public $tag;
    public $attributes;

    public function searchPost()
    {
        return to_route('posts.search', ['tag' => $this->tag->name]);
    }

    public function render()
    {
        return view('livewire.component.tag-button');
    }
}
