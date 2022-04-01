<?php

namespace App\Http\Livewire\Admin\Testimonial;

use Livewire\Component;
use App\Http\Traits\AlertMessage;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;

class CreateEdit extends Component
{
    use WithFileUploads;
    use AlertMessage;
    public $user_id, $ratings, $status, $description, $testimonial;
    public $isEdit = false;
    public $userList, $statusList = [], $ratingList = [];

    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($testimonial = null)
    {
        if ($testimonial) {
            //dd($testimonial);
            $this->testimonial = $testimonial;
            $this->fill($this->testimonial);
            $this->isEdit = true;
        } else {
            $this->testimonial = new Testimonial;
        }

        $this->userList = User::where('active', 1)->role('CLIENT')->get();

        $this->statusList = [
            ['value' => 0, 'text' => "Please select User"],
            ['value' => 1, 'text' => "Active"],
            ['value' => 0, 'text' => "Inactive"]
        ];
        $this->ratingList = [
            ['value' => 0, 'text' => "Please select ratings"],
            ['value' => 1, 'text' => "1 star"],
            ['value' => 2, 'text' => "2 star"],
            ['value' => 3, 'text' => "3 star"],
            ['value' => 4, 'text' => "4 star"],
            ['value' => 5, 'text' => "5 star"],
        ];
    }

    public function validationRuleForSave(): array
    {
        return [
            'user_id' => ['required'],
            'ratings' => ['required'],
            'status' => ['required'],
            'description' => ['required']
        ];
    }
    public function validationRuleForUpdate(): array
    {
        return [
            'user_id' => ['required'],
            'ratings' => ['required'],
            'status' => ['required'],
            'description' => ['required']
        ];
    }

    public function saveOrUpdate()
    {
        $this->testimonial->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();
        
        $msgAction = 'Testimonial was ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);
        return redirect()->route('testimonial.index');
    }

    public function render()
    {
        return view('livewire.admin.testimonial.create-edit');
    }
}
