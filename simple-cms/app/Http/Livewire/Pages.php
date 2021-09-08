<?php

namespace App\Http\Livewire;

use App\Models\Page;
use Livewire\Component;
use Illuminate\Validation\Rule;


class Pages extends Component
{
    public $modalFormVisible = false;
    public $title;
    public $slug;
    public $content;

    public function rules()
    {
        return [
            'title' => 'required',
            'slug' => ['required', Rule::unique('pages', 'slug')],
            'content' => 'required'
        ];
    }

    public function updatedTitle($title)
    {
        $this->generatedSlug($title);
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        $this->validate();
        Page::create($this->modalData());
        $this->modalFormVisible = false;
        $this->resetForm();
    }

    /**
     * createShowModal
     * show the form modal of the create function
     * @return void
     */
    public function createShowModal()
    {
        $this->modalFormVisible = true;
    }


    /**
     * modalData
     *
     * @return void
     */
    public function modalData()
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content
        ];
    }

    public function resetForm()
    {
        $this->title = null;
        $this->slug = null;
        $this->content = null;
    }

    private function generatedSlug($value)
    {
        $result = strtolower(str_replace(' ', '-', $value));
        $this->slug = $result;
    }

    /**
     * render
     * the livewire render function
     * @return void
     */
    public function render()
    {
        return view('livewire.pages');
    }
}
