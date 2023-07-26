<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MakePdfController extends Controller
{
    public function make_pdf(){
        $data ="サンプルテキストがこれ";
        $today = new \DateTime();
        $today_text = $today->format("Y年m月d日");
        
        //dd($today_text);
        $pdf = \PDF::loadView('pdf.test_pdf',compact('data','today_text'));
        return $pdf->stream('sample.pdf');
        
        //return $pdf->download('sample.pdf');//ダウンロードさせる場合
    }
    public function test_pdf(){
        $data ="サンプルテキストがこれ";
        $today = new \DateTime();
        $today_text = $today->format("Y年m月d日");
       
        return view('pdf.test_pdf',compact('data','today_text'));
        
      
    }
    public function nohin(){
    
            $data ="サンプルテキストがこれ";
            $today = new \DateTime();
            $today_text = $today->format("Y年m月d日");
            
            //dd($today_text);
            $pdf = \PDF::loadView('pdf.nohin_pdf',compact('data','today_text'));
            return $pdf->stream('nohin.pdf');
    }
    public function nohintest_pdf(){
        $data ="サンプルテキストがこれ";
        $today = new \DateTime();
        $today_text = $today->format("Y年m月d日");
        
        return view('pdf.nohin_pdf',compact('data','today_text'));
    }
}
