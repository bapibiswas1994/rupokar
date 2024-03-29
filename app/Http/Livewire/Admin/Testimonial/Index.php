<?php

namespace App\Http\Livewire\Admin\Testimonial;

use App\Http\Traits\AlertMessage;
use App\Http\Traits\WithSorting;
use App\Models\Testimonial;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use AlertMessage;
    public $perPageList = [];
    public $badgeColors = ['info', 'success', 'brand', 'dark', 'primary', 'warning'];


    protected $paginationTheme = 'bootstrap';

    public $searchName, $searchRating, $searchDescription, $searchStatus = -1, $perPage = 5;
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
        $this->searchRating = "";
        $this->searchDescription = "";
        $this->searchStatus = -1;
    }

    public function render()
    {
        $testimonialQuery = Testimonial::query();

        if ($this->searchName)
            $testimonialQuery->WhereRaw(
                "concat(first_name,' ', last_name) like '%" . $this->searchName . "%' "
            );
        if ($this->searchRating)
            $testimonialQuery->orWhere('ratings','=',$this->searchRating);
        if ($this->searchDescription)
            $testimonialQuery->orWhere('description', 'like', '%' . $this->searchDescription . '%');
        if ($this->searchStatus >= 0)
            $testimonialQuery->orWhere('status', $this->searchStatus);

        return view('livewire.admin.testimonial.index', [
            'testimonial' => $testimonialQuery
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->perPage)
        ]);
    }

    //
    public function deleteAttempt($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "You won't be able to recover this testimonial!", 'Yes, delete!', 'deleteConfirm', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }
    public function deleteConfirm($id)
    {
        Testimonial::destroy($id);
        $this->showModal('success', 'Success', 'Testimonial has been deleted successfully');
    }

    //
    public function changeStatusConfirm($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "Do you want to change this status?", 'Yes, Change!', 'changeStatus', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }
    public function changeStatus(Testimonial $user)
    {
        $user->fill(['status' => ($user->status == 1) ? 0 : 1])->save();

        $this->showModal('success', 'Success', 'Testimonial status has been changed successfully');
    }
    
}
