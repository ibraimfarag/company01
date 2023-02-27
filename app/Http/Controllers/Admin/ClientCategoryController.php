<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ClientCategoryController extends Controller
{

    public function __construct()
    {

    }

    public function index(){
        $posts = ClientCategory::get();
        $pageSlug = 'our-clients';

        return view('admin.client-categories.index', compact('posts','pageSlug'));
    }

    public function create(){
        $pageSlug = 'our-clients';
        return view('admin.client-categories.create',compact('pageSlug'));
    }

    public function store(Request $request){
        $input['title'] = $request->input('title');
        $input['slug'] = Str::slug($request->input('title'));

        ClientCategory::create($input);

        return redirect(url('admin/client-categories'));
    }

    public function edit($id){
        $pageSlug = 'our-clients';
        $data = ClientCategory::find($id);

        return view('admin.client-categories.edit', compact('data','pageSlug'));
    }

    public function update(Request $request){

        $target = ClientCategory::find($request->input('id'));
        $input['title'] = $request->input('title');
        $input['slug'] = Str::slug($request->input('title'));

        $target->update($input);

        return redirect()->back();
    }

    public function delete($id){
        $data = ClientCategory::find($id);

        if($data){
            $data->delete();
        }

        return redirect(url('admin/client-categories'));
    }
}
