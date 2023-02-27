<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Benefit;

class BenefitController extends Controller
{
    public function __construct()
    {

    }

    public function index(){
        $posts = Benefit::get();
        $pageSlug = 'why-us';

        return view('admin.benefits.index', compact('posts','pageSlug'));
    }

    public function create(){
        $pageSlug = 'why-us';
        return view('admin.benefits.create',compact('pageSlug'));
    }

    public function store(Request $request){
        $input['title'] = $request->input('title');
        $input['content'] = $request->input('content');
        $input['content_bottom'] = $request->input('content_bottom');

        Benefit::create($input);

        return redirect(url('admin/benefits'));
    }

    public function edit($id){
        $pageSlug = 'why-us';
        $data = Benefit::find($id);

        return view('admin.benefits.edit', compact('data','pageSlug'));
    }

    public function update(Request $request){

        $target = Benefit::find($request->input('id'));
        $input['title'] = $request->input('title');
        $input['content'] = $request->input('content');

        $target->update($input);

        return redirect()->back();
    }

    public function delete($id){
        $data = Benefit::find($id);

        if($data){
            $data->delete();
        }

        return redirect(url('admin/benefits'));
    }
}
