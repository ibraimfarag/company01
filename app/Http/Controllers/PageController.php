<?php

namespace App\Http\Controllers;

use App\Models\PageSection;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PageController extends Controller
{
    public function page($page){

        if (view()->exists($page)){
            $currentPage = $page;

            return view($page,compact('currentPage'));
        }

        return view('404');
    }

    public function download(){

        $pdf = App::make('dompdf.wrapper');

        $heading = PageSection::find(35);
        $content = PageSection::find(36);

        $pdf->loadView('pdf.tnc',$content);
//        return $pdf->stream();
        return $pdf->download('ACOTA Terms and Conditions.pdf');
    }
}
