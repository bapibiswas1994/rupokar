<?php

namespace App\Http\Livewire\Admin\CMS;

use App\Models\PrivacyPolicy as ModelsPrivacyPolicy;
use Livewire\Component;
use App\Http\Traits\AlertMessage;

class PrivacyPolicy extends Component
{

    use AlertMessage;
    public $title, $description,$privacy_policy;
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount()
    {
        $cms_privacy_policy = ModelsPrivacyPolicy::first();
        if ($cms_privacy_policy) {
            $this->privacy_policy = $cms_privacy_policy;
            $this->fill($cms_privacy_policy);
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
        $this->privacy_policy->fill($this->validate($this->validationRuleForUpdate()))->save();

        $msgAction = 'Privacy Policy updated successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('admin.cms.privacy-policy');
    }

    public function render()
    {
        return view('livewire.admin.c-m-s.privacy-policy');
    }
}
