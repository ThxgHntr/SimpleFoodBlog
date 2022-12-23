<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;

class CommentDropdown extends Component
{
    public $comment;
    public $actions = [];

    public function makeAction(string $action)
    {
        if ($action == 'edit') {

        } else if ($action == 'delete') {
            $this->emitUp('confirmCommentDeletion');
        } else if ($action == 'report') {

        }
    }

    public function render()
    {
        return view('livewire.post.comment-dropdown');
    }
}
