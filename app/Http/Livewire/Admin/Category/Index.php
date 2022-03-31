<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;

class Index extends Component
{
    public $categories;

    public function mount()
    {
        //dd('hi');
    }
    public function render()
    {
        return view('livewire.admin.category.index');
    }
}
