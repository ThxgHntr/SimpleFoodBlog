<?php

namespace App\Http\Livewire\Component;

use App\Models\Post;
use App\Models\Tag;
use Livewire\Component;

class TagsArea extends Component
{
    public $post;
    public $tags = [];
    public $tag;

    protected $listeners = [
        'saveTags',
        'saveUpdatedTags',
    ];

    public function mount($post = null)
    {
        if ($post) {
            $this->post = $post;
            foreach ($post->tags as $tag) {
                array_push($this->tags, $tag->name);
            }
        }
    }

    public function saveTags($post_id)
    {
        foreach ($this->tags as $tag) {
            $newTag = Tag::firstOrCreate([
                'name' => $tag,
            ]);
            Post::find($post_id)->tags()->attach($newTag->id);
        }
    }

    public function saveUpdatedTags()
    {
        $this->post->tags()->detach();
        foreach ($this->tags as $tag) {
            $newTag = Tag::firstOrCreate([
                'name' => $tag,
            ]);
            $this->post->tags()->attach($newTag->id);
        }
    }

    public function render()
    {
        return view('livewire.component.tags-area');
    }
}
