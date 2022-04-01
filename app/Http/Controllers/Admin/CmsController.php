<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faqs;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    public function privacyPolicy()
    {
        return view('admin.cms.privacy-policy');
    }
    public function termsAndCondition()
    {
        return view('admin.cms.terms-and-condition');
    }
    public function peoIllustration()
    {
        # code...
    }
    public function quotationSubmissionTutorial()
    {
        # code...
    }
    public function faqs()
    {
        return view('admin.cms.faqs');
    }
    public function addFaq()
    {
        return view('admin.cms.create-edit-faqs',['faqs'=>null]);
    }
    public function editFaq(Faqs $faqs)
    {
        return view('admin.cms.create-edit-faqs',compact('faqs'));
    }
    
}
