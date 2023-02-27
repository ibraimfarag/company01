<?php

namespace App\Services;
use App\Models\Benefit;
use App\Models\ClientCategory;
use App\Models\HomeContent;
use App\Models\HomeIcon;
use App\Models\HomeItem;
use App\Models\Leadership;
use App\Models\Page;
use App\Models\PageSub;
use App\Models\PageSection;
use App\Models\Service;
use App\Models\Team;
use Database\Seeders\BenefitSeed;
use Database\Seeders\HomeIconSeeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Psy\Util\Str;

class ContentProvider
{
    public function getPageSections($id){
        $data = PageSection::where('page_id',$id)->get();

        $sections = [];
        foreach ($data as $item){
            $sections[$item->slug] = $item->content;
        }

        return $sections;
    }

    public function getHomeIcons(){
        return HomeIcon::get();
    }

    public function getLeadership(){
        return Leadership::get();
    }

    public function getServices(){
        return Service::with('items')->get();
    }

    public function getBenefits(){
        return Benefit::get();
    }

    public function getClientCats(){
        return ClientCategory::with('clients')->get();
    }

    public function getTeam(){
        return Team::orderBy('order','ASC')->where('is_hidden',0)->get();
    }

    public function getPageNavs(){
        $q =  Page::with('sections')->get();
        return $q;
    }

    public function getSection($page,$sectionId){
        $data = PageSection::where('id',$sectionId)->whereHas('page',function($q) use ($page) {
            return $q->where('slug',$page);
        })->get();

        $rets = [];

        foreach($data as $item){
            $rets[$item->slug]['name'] = $item->title_en;
            $rets[$item->slug]['name_en'] = $item->title_en;
            $rets[$item->slug]['name_ar'] = $item->title_ar;
            $rets[$item->slug]['de'] = $item->content;
            $rets[$item->slug]['ar'] = $item->content_ar;
            $rets[$item->slug]['en'] = $item->content_en;
            $rets[$item->slug]['type'] = $item->type;
            $rets[$item->slug]['slug'] = $item->slug;
        }

        return $rets;
    }

    public function getSettings(){
        $data = PageContent::whereHas('page',function($q) {
            return $q->where('slug','settings');
        })->select('name','content','content_ar','slug','type')->get();

        $rets = [];

        foreach($data as $item){
            $rets[$item->slug] = $item->content;
        }

        return $rets;
    }

}
