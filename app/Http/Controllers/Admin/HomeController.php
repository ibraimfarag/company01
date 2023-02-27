<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeIcon;
use App\Models\Page;
use App\Models\PageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    public function __construct()
    {

    }

    public function icons(){
        $data = HomeIcon::get();
        $pageSlug = 'home';

        return view('admin.home.icons', compact('data','pageSlug'));
    }

    public function update(Request $request){
        $data = HomeIcon::get();
        $pageSlug = 'home';
        $files = $request->file();

        foreach($request->input('pageData') as $id=>$icon){
            $target = HomeIcon::find($id);

            $input = [];

            $input['content'] = $icon['content'];

            if(isset($files['pageData'][$id])){

                if(isset($files['pageData'][$id]['photo'])){
                    //Move Uploaded File
                    $destinationPath = 'public/uploads/home-icons';

                    $thumbnailName =  Str::random(32).'.'.$files['pageData'][$id]['photo']->getClientOriginalExtension();
                    Image::make($files['pageData'][$id]['photo']->getRealPath())->fit(38, 38)->save($destinationPath.'/'.$thumbnailName);
                    $input['photo'] = 'uploads/home-icons/'. $thumbnailName;
                }

                if(isset($files['pageData'][$id]['photo_active'])){
                    //Move Uploaded File
                    $destinationPath = 'public/uploads/home-icons';

                    $thumbnailName =  Str::random(32).'.'.$files['pageData'][$id]['photo_active']->getClientOriginalExtension();
                    Image::make($files['pageData'][$id]['photo_active']->getRealPath())->fit(38, 38)->save($destinationPath.'/'.$thumbnailName);
                    $input['photo_active'] = 'uploads/home-icons/'. $thumbnailName;
                }
            }

            $target->update($input);
        }

        return view('admin.home.icons', compact('data','pageSlug'));
    }
}
