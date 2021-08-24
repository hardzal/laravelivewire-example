<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreatePost extends Component
{
    public $description;
    public $title;

    public function render()
    {
        return view('livewire.create-post');
    }

    public function createPost()
    {

        Post::create([
            'user_id' => Auth::id(),
            'title' => $this->title,
            'body' => $this->description
        ]);
        $this->title = "";
        $this->description = "";

        $this->emit('postCreated');
    }
}
