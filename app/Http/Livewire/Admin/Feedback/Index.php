<?php

namespace App\Http\Livewire\Admin\Feedback;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\WithSorting;
use App\Models\Feedback;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use AlertMessage;
    public $perPageList = [];
    public $badgeColors = ['info', 'success', 'brand', 'dark', 'primary', 'warning'];

    protected $paginationTheme = 'bootstrap';

    public $searchName, $searchEmail, $searchPhone, $searchStatus = -1, $perPage = 5;
    protected $listeners = ['deleteConfirm', 'changeStatus'];

    public function mount()
    {
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
        $this->searchName = "";
        $this->searchEmail = "";
        $this->searchPhone = "";
        $this->searchStatus = -1;
    }

    public function render()
    {
        $feedbackQuery = Feedback::query();
        if ($this->searchName)
            $feedbackQuery->WhereRaw(
                "concat(first_name,' ', last_name) like '%" . $this->searchName . "%' "
            );

        if ($this->searchEmail)
            $feedbackQuery->orWhere('email', 'like', '%' . $this->searchEmail . '%');

        if ($this->searchPhone)
            $feedbackQuery->orWhere('phone', 'like', '%' . $this->searchPhone . '%');

        if ($this->searchStatus >= 0)
            $feedbackQuery->orWhere('active', $this->searchStatus);

        return view('livewire.admin.feedback.index', [
            'feedbacks' => $feedbackQuery
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->perPage)
        ]);
    }

    //
    public function deleteAttempt($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "You won't be able to recover this user!", 'Yes, delete!', 'deleteConfirm', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }
    public function deleteConfirm($id)
    {
        Feedback::destroy($id);
        $this->showModal('success', 'Success', 'Feedback has been deleted successfully');
    }


    //
    public function changeStatusConfirm($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "Do you want to change this status?", 'Yes, Change!', 'changeStatus', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatus(Feedback $feedback)
    {
        $feedback->fill(['active' => ($feedback->active == 1) ? 0 : 1])->save();

        $this->showModal('success', 'Success', 'Feedback status has been changed successfully');
    }
}
