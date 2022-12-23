<?php

namespace App\Http\Livewire\Public;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;

class ShowPost extends Component
{
    use WithPagination;

    public Post $post;
    public $confirmingPostDeletion = false;

    protected $listeners = [
        'resetComments',
        'confirmPostDeletion',
    ];

    public function resetComments()
    {
        $this->resetPage();
    }

    public function confirmPostDeletion()
    {
        $this->confirmingPostDeletion = true;
    }

    public function deletePost()
    {
        $this->post->delete();
        
        return redirect('/');
    }

    public function render()
    {
        return view('livewire.public.show-post',[
            'comments' => $this->post->getPaginatedComments(),
        ]);
    }
}
