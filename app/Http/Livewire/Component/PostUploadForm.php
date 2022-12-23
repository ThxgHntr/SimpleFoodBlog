<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;
class PostUploadForm extends Component
{
    public $user;
    public $title;
    public $content;

    protected $rules = [
        'title' => 'required|min:6',
        'content' => 'required|min:12',
    ];

    public function savePost()
    {
        $post = $this->user->posts()->create($this->validate());

        $this->emit('saveTags', $post->id);
        $this->emit('saveFiles', $post->id);

        to_route('upload');
    }

    public function render()
    {
        return view('livewire.component.post-upload-form');
    }
}
