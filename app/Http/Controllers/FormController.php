<?php

namespace App\Http\Controllers;

use App\Models\FormEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class FormController extends Controller
{
    public function submit(Request $request){

        $input = $request->input();

        $subject = 'ACOTA Website Form Submission';

        $emailData = [
            'full_name' => $input['full_name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'message' => $input['message'],
        ];

//        $emails = array("pedram@acota.com.au", "balaji@acota.com.au");
        $emails = array("info@acota.com.au");

        $this->saveToDb($request,$emailData,'contact-us-form');

        try {
            Mail::send('mail.form', ['data' => $emailData], function ($message) use ($input, $subject, $emails) {
                //
                $message->from('info@acota.com.au', 'Admin')->to($emails)->subject($subject);
            });
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }

        Session::flash('success','Thank you for contacting us. We will get back to you shortly.');

        return redirect()->back();
    }

    public function saveToDb($request, $emailData,$form){
        $entry = FormEntry::create([
            'ip'=>$request->ip(),
            'form'=>$form
        ]);

        foreach($emailData as $key=>$item)
            $entry->items()->create([
                'slug' => $key,
                'value' => $item,
            ]);
    }
}
