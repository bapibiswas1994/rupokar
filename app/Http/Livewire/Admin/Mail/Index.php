<?php

namespace App\Http\Livewire\Admin\Mail;

use Livewire\Component;
use App\Http\Traits\AlertMessage;
use App\Models\User;
use Livewire\WithPagination;
use App\Http\Traits\WithSorting;
use App\Models\MailTemplate;
use App\Models\MailType;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use AlertMessage;
    public $perPageList = [];
    public $badgeColors = ['info', 'success', 'brand', 'dark', 'primary', 'warning'];

    protected $paginationTheme = 'bootstrap';

    public $searchMailName, $searchMailSubject, $searchMailType = -1,$searchMailCC, $searchStatus = -1, $perPage = 5;
    public $mailTypes=[];
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
        $this->mailTypes = MailType::where('active', 1)->get()->toArray();
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
        $this->searchMailName = "";
        $this->searchMailSubject = "";
        $this->searchMailType = "";
        $this->searchMailCC = "";
        $this->searchStatus = -1;
    }

    public function render()
    {
        $mailQuery = MailTemplate::query();

        if ($this->searchMailName)
            $mailQuery->WhereRaw('mail_name', 'like', '%' . $this->searchMailName . '%');

        if ($this->searchMailSubject)
            $mailQuery->WhereRaw('mail_subject', 'like', '%' . $this->searchMailSubject . '%');

        if ($this->searchMailType >= 0)
            $mailQuery->orWhere('mail_type_id', '=', $this->searchMailType);

        if ($this->searchMailCC)
            $mailQuery->orWhere('mail_cc', 'like', '%' . $this->searchMailCC . '%');

        if ($this->searchStatus >= 0)
            $mailQuery->orWhere('active', $this->searchStatus);

        return view('livewire.admin.mail.index', [
            'mail_templates' => $mailQuery
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->perPage)
        ]);
    }

    //
    public function deleteAttempt($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "You won't be able to recover this mail template!", 'Yes, delete!', 'deleteConfirm', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }
    public function deleteConfirm($id)
    {
        MailTemplate::destroy($id);
        $this->showModal('success', 'Success', 'Template has been deleted successfully');
    }

    //
    public function changeStatusConfirm($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "Do you want to change this status?", 'Yes, Change!', 'changeStatus', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatus(MailTemplate $mailTemplate)
    {
        $mailTemplate->fill(['active' => ($mailTemplate->active == 1) ? 0 : 1])->save();

        $this->showModal('success', 'Success', 'Template status has been changed successfully');
    }

}
