<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\ClientCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ClientController extends Controller
{
    public function __construct()
    {

    }

    public function index(){
        $posts = Client::get();
        $pageSlug = 'our-clients';

        return view('admin.clients.index', compact('posts','pageSlug'));
    }

    public function create(){
        $pageSlug = 'our-clients';
        $cats = ClientCategory::get();
        return view('admin.clients.create',compact('pageSlug','cats'));
    }

    public function store(Request $request){
        $input['name'] = $request->input('name');
        $input['url'] = $request->input('url');
        $input['client_category_id'] = $request->input('client_category_id');

        $file = $request->file('photo');

        if($file){
            $destinationPath = 'public/uploads/clients';

            $thumbnailName =  Str::random(32).'.'.$file->getClientOriginalExtension();
            Image::make($file->getRealPath())->fit(200, 150)->save($destinationPath.'/'.$thumbnailName);
            $input['photo'] = 'uploads/clients/'. $thumbnailName;
        }

        Client::create($input);
        return redirect(url('admin/clients'));
    }

    public function edit($id){
        $pageSlug = 'our-clients';
        $data = Client::find($id);
        $cats = ClientCategory::get();

        return view('admin.clients.edit', compact('data','pageSlug','cats'));
    }

    public function update(Request $request){

        $input['name'] = $request->input('name');
        $input['url'] = $request->input('url');
        $input['client_category_id'] = $request->input('client_category_id');

        $file = $request->file('photo');
        $target = Client::find($request->input('id'));

        if($file){
            $destinationPath = 'public/uploads/clients';

            $thumbnailName =  Str::random(32).'.'.$file->getClientOriginalExtension();
            Image::make($file->getRealPath())->fit(38, 38)->save($destinationPath.'/'.$thumbnailName);
            $input['photo'] = 'uploads/clients/'. $thumbnailName;
        }

        $target->update($input);

        return redirect()->back();
    }

    public function delete($id){
        $data = Client::find($id);

        if($data){
            $data->delete();
        }

        return redirect(url('admin/clients'));
    }
}
