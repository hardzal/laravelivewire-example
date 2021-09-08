<?php

namespace App\Http\Livewire;

use App\Models\Page;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;

class Pages extends Component
{
    use WithPagination;

    public $modalFormVisible = false;
    public $modalId;
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

    public function read()
    {
        return Page::paginate(5);
    }

    public function update()
    {
        $this->validate();
        Page::find($this->modalId)->update($this->modalData());
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
        $this->resetValidation();
        $this->resetForm();
        $this->modalFormVisible = true;
    }

    public function updateShowModal($id)
    {
        $this->resetValidation();
        $this->resetForm();
        $this->modalId = $id;
        $this->modalFormVisible = true;
        $this->loadModel();
    }

    public function loadModel()
    {
        $data = Page::find($this->modalId);
        $this->title = $data->title;
        $this->slug = $data->slug;
        $this->content = $data->content;
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
        $this->modalId = null;
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
        return view('livewire.pages', [
            'data' => $this->read()
        ]);
    }
}
