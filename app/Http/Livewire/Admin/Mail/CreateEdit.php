<?php

namespace App\Http\Livewire\Admin\Mail;

use App\Http\Livewire\Traits\AlertMessage;
use App\Models\MailTemplate;
use App\Models\MailType;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateEdit extends Component
{
    use AlertMessage;
    public $mail_name, $mail_subject, $mail_type_id, $mail_body, $mail_cc, $terms_conditions, $active;
    public $isEdit = false;
    public  $blankArr, $mail, $statusList = [], $mailtypes = [];

    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($mail = null)
    {
        if ($mail) {
            $this->mail = $mail;
            $this->fill($this->mail);
            $this->isEdit = true;
        } else {
            $this->mail = new MailTemplate();
        }

        $this->blankArr = [
            "value" => "", "text" => "== Select One =="
        ];

        $this->statusList = [
            ['value' => 1, 'text' => "Active"],
            ['value' => 0, 'text' => "Inactive"]
        ];

        $this->mailtypes = MailType::where('active', 1)->get()->toArray();

        // $this->mailtypes = [
        //     ["id" => "1", "text" => "Successful Register Email"],
        //     ["id" => "2", "text" => "Account Deactivated Email"],
        //     ["id" => "3", "text" => "Successful Payment Email"],
        //     ["id" => "4", "text" => "Accepting Delivery Request Email"],
        //     ["id" => "5", "text" => "Auto Generated Email"],
        //     ["id" => "6", "text" => "Reminder Email"],
        //     ["id" => "7", "text" => "Feedback Survey Email"],
        // ];

        //successful registration//account deactivated//payment successful//accepting the delivery request//auto generated emails//contact us
    }

    public function validationRuleForSave(): array
    {
        return [
            'mail_name' => ['required'],
            'mail_type_id' => ['required'],
            'mail_subject' => ['required'],
            'mail_cc' => ['required', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
            'mail_body' => ['required'],
            'terms_conditions' => ['nullable'],
            //'active' => ['required']
        ];
    }
    public function validationRuleForUpdate(): array
    {
        return [
            'mail_name' => ['required'],
            'mail_subject' => ['required'],
            'mail_type_id' => ['required'],
            'mail_cc' => ['required', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
            'mail_body' => ['required'],
            'terms_conditions' => ['nullable'],
            //'active' => ['required']
        ];
    }
    protected $messages = [
        'mail_cc.required' => 'The Mail CC field is required',
        'mail_cc.regex' => 'Mail format is not correct.',
    ];

    public function saveOrUpdate()
    {
        DB::beginTransaction();
        try {

            // $data=[
            //     $this->mail_name,
            //     $this->mail_subject,
            //     $this->mail_type_id,
            //     $this->mail_cc,
            //     $this->mail_body,
            //     $this->terms_conditions,
            //     //$this->active
            // ];
            // dd($data);
            $getMailTemp = MailTemplate::where('mail_type_id', $this->mail_type_id)->first();
            if ($getMailTemp) {
                $this->showModal('warning', 'Warning', 'This mail type template already has been added');
            } else {

                $this->mail->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();
                DB::commit();
                $msgAction = 'Mail Template  was ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
                $this->showToastr("success", $msgAction);
                return redirect()->route('mail.index');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            //dd($th->getMessage());
            $this->showToastr("error", $th->getMessage());
            return redirect()->back();
        }
    }
    public function render()
    {
        return view('livewire.admin.mail.create-edit');
    }
}
