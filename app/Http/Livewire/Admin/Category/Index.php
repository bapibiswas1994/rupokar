<?php

namespace App\Http\Livewire\Admin\Category;

use App\Http\Traits\AlertMessage;
use App\Http\Traits\CategoryTraits;
use App\Http\Traits\WithSorting;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use AlertMessage;
    use CategoryTraits;
    public $perPageList = [];
    public $badgeColors = ['info', 'success', 'brand', 'dark', 'primary', 'warning'];

    protected $paginationTheme = 'bootstrap';

    public $allCategories, $searchId, $searchQuestion, $searchAnswer, $searchStatus = -1, $perPage = 5;

    protected $listeners = ['deleteConfirm', 'changeStatus'];

    public function mount()
    {
        $this->allCategories = $this->getCategories();

        $this->perPageList = [
            ['value' => 5, 'text' => "5"],
            ['value' => 10, 'text' => "10"],
            ['value' => 20, 'text' => "20"],
            ['value' => 50, 'text' => "50"],
            ['value' => 100, 'text' => "100"]
        ];
    }
    public function getRandomColor()
    {
        $arrIndex = array_rand($this->badgeColors);
        return $this->badgeColors[$arrIndex];
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function search()
    {
        $this->resetPage();
    }
    public function resetSearch()
    {
        $this->searchId = "";
        $this->searchQuestion = "";
        $this->searchAnswer = "";
        $this->searchStatus = -1;
    }

    public function render()
    {
        // $userQuery = Category::query();
        // if ($this->searchId)
        //     $userQuery->orWhere('id', '=', $this->searchId);
        // if ($this->searchQuestion)
        //     $userQuery->orWhere('question', 'like', '%' . $this->searchQuestion . '%');
        // if ($this->searchAnswer)
        //     $userQuery->orWhere('answer', 'like', '%' . $this->searchAnswer . '%');
        // if ($this->searchStatus >= 0)
        //     $userQuery->orWhere('status', $this->searchStatus);
        return view('livewire.admin.category.index', [
            'categories' => $this->allCategories
        ]);

        //return view('livewire.admin.category.index');
    }

    //
    public function deleteAttempt($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "You won't be able to recover this FAQ's!", 'Yes, delete!', 'deleteConfirm', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }
    public function deleteConfirm($id)
    {
        Category::destroy($id);
        $this->showModal('success', 'Success', "FAQ's has been deleted successfully");
    }

    //
    public function changeStatusConfirm($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "Do you want to change this status?", 'Yes, Change!', 'changeStatus', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatus(Category $faq)
    {
        $faq->fill(['status' => ($faq->status == 1) ? 0 : 1])->save();

        $this->showModal('success', 'Success', "FAQ's status has been changed successfully");
    }
}
