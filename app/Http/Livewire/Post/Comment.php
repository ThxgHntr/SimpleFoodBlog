<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;

class Comment extends Component
{
    public $comment;
    public $confirmingCommentDeletion = false;

    protected $listeners = [
        'confirmCommentDeletion',
    ];

    public function confirmCommentDeletion()
    {
        $this->confirmingCommentDeletion = true;
    }

    public function deleteComment()
    {
        $this->comment->delete();

        $this->emitUp('resetComments');
    }

    public function render()
    {
        return view('livewire.post.comment');
    }
}
