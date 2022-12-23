<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\Models\Post;
use App\Models\Comment;

class CommentArea extends Component
{
    public Post $post;
    public $comment;

    protected $rules = [
        'comment' => 'string|max:1000',
    ];

    public function comment()
    {
        $this->validate();

        $this->post->addCommentByUser(auth()->user(), $this->comment);

        $this->comment = "";

        $this->emitUp('resetComments');
    }

    public function render()
    {
        return view('livewire.post.comment-area');
    }
}
