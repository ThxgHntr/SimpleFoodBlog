<?php

namespace App\Http\Livewire\Public;

use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class Tags extends Component
{
    use WithPagination;
    
    public $search = '';
 
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.public.tags',[
            'tags' => Tag::withCount('posts')->where('name', 'like', '%'.$this->search.'%')->paginate(20)
        ]);
    }
}
