<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeIcon;
use App\Models\Service;
use App\Models\Page;
use App\Models\PageSection;
use App\Models\ServiceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    public function __construct()
    {

    }

    public function index(){
        $posts = Service::get();
        $pageSlug = 'our-services';

        return view('admin.services.index', compact('posts','pageSlug'));
    }

    public function create(){
        $pageSlug = 'our-services';
        return view('admin.services.create',compact('pageSlug'));
    }

    public function store(Request $request){
        $input['name'] = $request->input('name');
        $input['content'] = $request->input('content');
        $input['content_bottom'] = $request->input('content_bottom');

        $service = Service::create($input);

        $items = $request->input('item');
        $files = $request->file('image');

        foreach ($items as $index=>$item){
            $it = [];

            $it['title'] = $item['title'];
            $it['content'] = $item['content'];

            if($it['title']){

                if(isset($files[$index])){
                    $destinationPath = 'public/uploads/services';

                    $thumbnailName =  Str::random(32).'.'.$files[$index]->getClientOriginalExtension();
                    Image::make($files[$index]->getRealPath())->fit(271, 232)->save($destinationPath.'/'.$thumbnailName);
                    $it['image'] = 'uploads/services/'. $thumbnailName;
                }

                $service->items()->create($it);
            }

        }

        return redirect(url('admin/services'));
    }

    public function edit($id){
        $pageSlug = 'our-services';
        $data = Service::find($id);

        return view('admin.services.edit', compact('data','pageSlug'));
    }

    public function update(Request $request){

        $target = Service::find($request->input('id'));
        $input['name'] = $request->input('name');
        $input['content'] = $request->input('content');
        $input['content_bottom'] = $request->input('content_bottom');

        $target->update($input);

        $items = $request->input('item');
        $files = $request->file('image');

        foreach ($items as $index=>$item){
            $it = [];
            $targetItem = ServiceItem::find($index);

            $it['title'] = $item['title'];
            $it['content'] = $item['content'];

            if($it['title']){

                if(isset($files[$index])){
                    $destinationPath = 'public/uploads/services';

                    $thumbnailName =  Str::random(32).'.'.$files[$index]->getClientOriginalExtension();
                    Image::make($files[$index]->getRealPath())->fit(271, 232)->save($destinationPath.'/'.$thumbnailName);
                    $it['image'] = 'uploads/services/'. $thumbnailName;
                }

                $targetItem->update($it);
            }

        }

        $newitems = $request->input('new_item');
        $newfiles = $request->file('new_image');

        foreach ($newitems as $index=>$item){
            $it = [];

            $it['title'] = $item['title'];
            $it['content'] = $item['content'];

            if($it['title']){

                if(isset($newfiles[$index])){
                    $destinationPath = 'public/uploads/services';

                    $thumbnailName =  Str::random(32).'.'.$newfiles[$index]->getClientOriginalExtension();
                    Image::make($newfiles[$index]->getRealPath())->fit(271, 232)->save($destinationPath.'/'.$thumbnailName);
                    $it['image'] = 'uploads/services/'. $thumbnailName;
                }

                $target->items()->create($it);
            }

        }

        return redirect()->back();
    }

    public function delete($id){
        $data = Service::find($id);

        if($data){
            $data->delete();
        }

        return redirect(url('admin/services'));
    }

    public function deleteItem($id){
        $data = ServiceItem::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->back();
    }
}
