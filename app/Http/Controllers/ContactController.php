<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\Setting;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function contact(Request $request){
        return view('pages.contact.index',[
            'Setting' => Setting::where('id',1)->first(),
        ]);
    }
    public function contactsubmit(Request $request){
        $request->validate([
            'email' => ['required','email'],
            'mobile' => ['required'],
            'subject' => ['required'],
            'details' => ['required'],
        ]);
        if(session('user.name') != null)
        Contact::create([
            'name' => e($request->name),
            'email' => e($request->email),
            'mobile' => e($request->mobile),
            'subject' => e($request->subject),
            'details' => e($request->details),
            'removed' => 0
        ]);
        return redirect(route('contact'))->with('success', __('تم التوصل برسالتكم بنجاح'));

    }

}
