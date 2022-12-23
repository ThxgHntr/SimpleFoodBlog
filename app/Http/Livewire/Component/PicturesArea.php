<?php

namespace App\Http\Livewire\Component;

use App\Models\Picture;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class PicturesArea extends Component
{
    use WithFileUploads;

    public Post $post;
    public $oldPictures = [];
    public $pictures = [];

    protected $listeners = [
        'saveFiles',
        'saveUpdatedFiles',
    ];

    public function mount($post = null)
    {
        if ($post) {
            $this->post = $post;
            foreach ($post->pictures as $picture) {
                array_push($this->oldPictures, $picture->file_path);
            }
        }
    }

    public function remove($index)
    {
        array_splice($this->pictures, $index, 1);
    }

    public function removeOld($index)
    {
        array_splice($this->oldPictures, $index, 1);
    }

    public function saveFiles($post_id)
    {
        $this->validate([
            'pictures.*' => 'image|max:10240',
        ]);

        foreach ($this->pictures as $picture) {
            Post::find($post_id)->pictures()->create([
                'file_path' => $picture->store('posts-pictures'),
            ]);
        }
    }

    public function saveUpdatedFiles()
    {
        $picturesToDelete = Picture::select('file_path')->where('post_id', $this->post->id)->get();
        foreach ($picturesToDelete as $delPic) {
            if (!in_array($delPic->file_path, $this->oldPictures)) {
                Picture::where('file_path', $delPic->file_path)->delete();
                Storage::delete($delPic->file_path);
            }
        }

        $this->saveFiles($this->post->id);
    }

    public function render()
    {
        return view('livewire.component.pictures-area');
    }
}
