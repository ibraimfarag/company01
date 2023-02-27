<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageSection;
use App\Models\SectionPhoto;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class SectionController extends Controller
{
    public function __construct(PageSection $model)
    {
        $this->model = $model;
    }

    public function edit($id){
        $data = PageSection::where('page_id',$id)->get()->toArray();
        $pageSlug  = Page::find($id)->slug;

        return view('admin.sections.edit', compact('data','pageSlug'));
    }

    public function delete($id){

        $post = $this->model->find($id);

        if(!$post)
            return 'Post not found!';

        $post->delete();

        Session::flash('success','Item deleted successfully');

        return redirect('dms-cms/sections/');
    }

    public function deleteSlide($id){

        $post = Upload::find($id);

        if(!$post)
            return 'Post not found!';

        $post->delete();

        Session::flash('success','Item deleted successfully');

        return redirect()->back();
    }


    public function update(Request $request){
        $page = $request->input('page');
        $pageData = $request->input('pageData');

        $currentPage = Page::where('slug',$page)->first();

        foreach ($pageData as $key => $item){
            $content = PageSection::where('page_id',$currentPage->id)->where('slug',$key)->first();

            if($content){
                $content->content = $item['content'];
            }

            $content->save();
        }

        $files = $request->file('pageData');

        if($files){
            foreach ($files as $key => $file){

                //Move Uploaded File
                $destinationPath = 'uploads/pages/'.$page;
                $newFileName = Str::random(32).'.'.$file['content']->getClientOriginalExtension();

                $file['content']->move('public/'.$destinationPath,$newFileName);

                $imgUrl = $destinationPath .'/'. $newFileName;
                $data = PageSection::where('page_id',$currentPage->id)->where('slug',$key)->first();

                if($data){
                    $data->content = $imgUrl;
                    $data->save();
                }

            }
        }

        return redirect()->back();
    }

}
