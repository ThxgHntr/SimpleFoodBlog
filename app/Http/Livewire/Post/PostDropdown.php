<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostDropdown extends Component
{

    public Post $post;
    public $actions = [];

    public function makeAction(string $action)
    {
        if ($action == 'edit') {
            to_route('post.edit', [
                'user' => Auth::user(),
                'post' => $this->post->slug,
            ]);
        } else if ($action == 'delete') {
            $this->emitUp('confirmPostDeletion');
        } else if ($action == 'report') {

        }
    }

    public function render()
    {
        return view('livewire.post.post-dropdown'); 
    }
}
