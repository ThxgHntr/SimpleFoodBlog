<?php

namespace App\Http\Livewire\User;

use App\Http\Livewire\Component\PostUploadForm;
use App\Models\Post;

class EditPost extends PostUploadForm
{
    public $post;
    public $title;
    public $content;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->title = $post->title;
        $this->content = $post->content;
    }

    public function savePost()
    {
        $this->validate();

        $this->post->title = $this->title;
        $this->post->content = $this->content;
        $this->post->save();

        $this->emit('saveUpdatedTags');
        $this->emit('saveUpdatedFiles');
    }

    public function render()
    {
        return view('livewire.user.edit-post');
    }
}
