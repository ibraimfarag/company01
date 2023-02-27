<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeIcon;
use App\Models\Leadership;
use App\Models\Page;
use App\Models\PageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class LeadershipController extends Controller
{
    public function __construct()
    {

    }

    public function index(){
        $posts = Leadership::get();
        $pageSlug = 'about-us';

        return view('admin.leadership.index', compact('posts','pageSlug'));
    }

    public function create(){
        $pageSlug = 'about-us';
        return view('admin.leadership.create',compact('pageSlug'));
    }

    public function store(Request $request){
        $input['name'] = $request->input('name');
        $input['title'] = $request->input('title');
        $input['bio'] = $request->input('bio');

        $file = $request->file('photo');

        if($file){
            $destinationPath = 'public/uploads/leadership';

            $thumbnailName =  Str::random(32).'.'.$file->getClientOriginalExtension();
            Image::make($file->getRealPath())->fit(38, 38)->save($destinationPath.'/'.$thumbnailName);
            $input['photo'] = 'uploads/leadership/'. $thumbnailName;
        }

        Leadership::create($input);
        return redirect(url('admin/leadership'));
    }

    public function edit($id){
        $pageSlug = 'about-us';
        $data = Leadership::find($id);

        return view('admin.leadership.edit', compact('data','pageSlug'));
    }

    public function update(Request $request){
        $input['name'] = $request->input('name');
        $input['title'] = $request->input('title');
        $input['bio'] = $request->input('bio');

        $file = $request->file('photo');
        $target = Leadership::find($request->input('id'));

        if($file){
            $destinationPath = 'public/uploads/leadership';

            $thumbnailName =  Str::random(32).'.'.$file->getClientOriginalExtension();
            Image::make($file->getRealPath())->fit(38, 38)->save($destinationPath.'/'.$thumbnailName);
            $input['photo'] = 'uploads/leadership/'. $thumbnailName;
        }

        $target->update($input);

        return redirect()->back();
    }

    public function delete($id){
        $data = Leadership::find($id);

        if($data){
            $data->delete();
        }

        return redirect(url('admin/leadership'));
    }
}
