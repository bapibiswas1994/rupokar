<?php

namespace App\Http\Livewire\Admin\CMS;

use App\Http\Livewire\Traits\AlertMessage;
use App\Models\TermsAndCondition as ModelsTermsAndCondition;
use Livewire\Component;

class TermsAndCondition extends Component
{
    use AlertMessage;
    public $title, $description,$terms_and_condition;
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount()
    {
        $cms_terms_and_condition =ModelsTermsAndCondition::first();
        if ($cms_terms_and_condition) {
            $this->terms_and_condition = $cms_terms_and_condition;
            $this->fill($cms_terms_and_condition);
        }
    }

    public function validationRuleForUpdate(): array
    {
        return [
            'title' => ['required', 'max:255'],
            'description' => ['required'],
        ];
    }

    public function Update()
    {
        $this->terms_and_condition->fill($this->validate($this->validationRuleForUpdate()))->save();

        $msgAction = 'Terms and condition updated successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('admin.cms.terms-and-condition');
    }

    public function render()
    {
        return view('livewire.admin.c-m-s.terms-and-condition');
    }

}
