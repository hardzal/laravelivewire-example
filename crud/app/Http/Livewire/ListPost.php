<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class ListPost extends Component
{
    public $updateStateId = 0;
    public $body = "";

    protected $listeners = [
        'postCreated' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.list-post', [
            'posts' => Post::latest()->get()
        ]);
    }

    public function showUpdateForm($postId)
    {
        $post = Post::find($postId);
        $this->body = $post->body;
        $this->updateStateId = $postId;
    }

    public function updatePost($postId)
    {
        $post = Post::find($postId);
        $post->body = $this->body;
        $post->save();

        $this->updateStateId = 0;
    }

    public function deletePost($postId)
    {
        $post = Post::find($postId);
        $post->delete();
    }
}
