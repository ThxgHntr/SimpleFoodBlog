<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;

class Carousel extends Component
{
    public $post;
    public $pictures = [];
    public $attributes = "";

    public function mount()
    {
        if ($this->post) {
            foreach ($this->post->getAllPreviewPictures() as $picture) {
                array_push($this->pictures, url('/', $picture->file_path));
            }
        }
    }

    public function render()
    {
        return view('livewire.component.carousel');
    }
}
