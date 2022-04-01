<?php

namespace App\Http\Livewire\Admin\CMS;

use Livewire\Component;
use App\Models\Faqs;
use App\Http\Traits\AlertMessage;
class CreateEditFaqs extends Component
{
    use AlertMessage;
    public $question, $answer, $status, $faqs;
    public $isEdit = false;
    public $statusList = [];
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($faqs = null)
    {
        if ($faqs) {
            $this->faqs = $faqs;
            $this->fill($this->faqs);
            $this->isEdit = true;
        } else
            $this->faqs = new Faqs();

        $this->statusList = [
            ['value' => 0, 'text' => "Please select one"],
            ['value' => 1, 'text' => "Active"],
            ['value' => 0, 'text' => "Inactive"]
        ];
    }

    public function validationRuleForSave(): array
    {
        return [
            'question' => ['required', 'max:255'],
            'answer' => ['required'],
            'status' => ['required'],
        ];
    }
    public function validationRuleForUpdate(): array
    {
        return [
            'question' => ['required', 'max:255'],
            'answer' => ['required'],
            'status' => ['required'],
        ];
    }

    public function saveOrUpdate()
    {
        $this->faqs->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();

        $msgAction = 'Faqs was ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('admin.cms.faqs');
    }
    public function render()
    {
        return view('livewire.admin.c-m-s.create-edit-faqs');
    }
}
