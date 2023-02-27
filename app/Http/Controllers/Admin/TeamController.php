<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeIcon;
use App\Models\Team;
use App\Models\Page;
use App\Models\PageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class TeamController extends Controller
{
    public function __construct()
    {

    }

    public function index(){
        $posts = Team::orderBy('order','ASC')->get();
        $pageSlug = 'our-team';

        return view('admin.our-team.index', compact('posts','pageSlug'));
    }

    public function create(){
        $pageSlug = 'our-team';
        return view('admin.our-team.create',compact('pageSlug'));
    }

    public function store(Request $request){
        $input['name'] = $request->input('name');
        $input['bio'] = $request->input('bio');
        $input['title'] = $request->input('title');
        $input['is_hidden'] = $request->input('is_hidden');
        $input['order'] = $request->input('order');

        $file = $request->file('photo');

        if($file){
            $destinationPath = 'public/uploads/our-team';

            $thumbnailName =  Str::random(32).'.'.$file->getClientOriginalExtension();
            Image::make($file->getRealPath())->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$thumbnailName);
            $input['photo'] = 'uploads/our-team/'. $thumbnailName;
        }

        Team::create($input);
        return redirect(url('admin/our-team'));
    }

    public function edit($id){
        $pageSlug = 'our-team';
        $data = Team::find($id);

        return view('admin.our-team.edit', compact('data','pageSlug'));
    }

    public function update(Request $request){
        $input['name'] = $request->input('name');
        $input['bio'] = $request->input('bio');
        $input['title'] = $request->input('title');
        $input['is_hidden'] = $request->input('is_hidden');
        $input['order'] = $request->input('order');

        $file = $request->file('photo');
        $target = Team::find($request->input('id'));

        if($file){
            $destinationPath = 'public/uploads/our-team';

            $thumbnailName =  Str::random(32).'.'.$file->getClientOriginalExtension();
            Image::make($file->getRealPath())->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$thumbnailName);
            $input['photo'] = 'uploads/our-team/'. $thumbnailName;
        }

        $target->update($input);

        $team = Team::orderBy('order','ASC')->get();

        $loop = 1;
        foreach ($team as $member){

            if($member->id != $target->id)
                $member->update(['order'=>$loop]);

            $loop++;
        }

        return redirect()->back();
    }

    public function delete($id){
        $data = Team::find($id);

        if($data){
            $data->delete();
        }

        return redirect(url('admin/our-team'));
    }
}
