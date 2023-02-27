<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FormEntry;
use App\Models\FormEntryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class FormController extends Controller
{

    public function index(){
        $pageSlug = 'newsletters';
        $entries = FormEntry::where('form','contact-us-form')->get();

        return view('admin.inquiries.index', compact('entries','pageSlug'));
    }

    public function show($id){
        $pageSlug = 'newsletters';
        $data = FormEntry::with('items')->find($id);

        if(!$data)
            return 'Post not found!';

        return view('admin.inquiries.view', compact('data','pageSlug'));
    }

    public function delete($id){
        $data = FormEntry::find($id);
        $slug = $data->title;

        if(!$data)
            return 'Post not found!';

        $data->delete();
        return redirect('admin/forms/'.$slug);
    }

    function newsletterStore(Request $request){

        Session::flash('success','Thank you for your registering.');

        $formEntry = FormEntry::create($request->except('_token'));

        if(!$formEntry)
            Session::flash('error','There was an error while saving. Please try again later.');

        return redirect()->back();
    }


    public function export()
    {
        return Excel::download(new FormExports(), 'test.xlsx');
    }


}
