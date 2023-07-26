<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pref;
use App\Models\City;
use Spatie\FlareClient\FlareMiddleware\RemoveRequestIp;

class PageController extends Controller
{
    public function top() {
        $prefs= Pref::all();       
        return view('contents.index',compact('prefs',));
        
    }
    public function getCity(Request $request) {
       $cities = City::where('pref',$request->pref)->get();
       
        $html="<option value'' selected>市区町村を選択（" .$request->pref ."）</option>";
        foreach($cities as $city){
            $html .= "<option value='".$city -> id . "'>" . $city->city ."</options>";//idをcityとかにするとコンソール出る。
        }
              
       return $html;
    }
//ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
    public function sortList() {
        $list = file(storage_path('data/sort_list.csv'));
        $list_array = explode(",", $list[0]);
        //dd($list_array);
        $image = file(storage_path('data/sort_list2.csv'));
        $image_array = explode(",", $image[0]);
        // dd($image_array);
        
        return view('contents.sort',compact('list_array','image_array'));//contents/sort_list.csv
    }
    //ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
    //リスト並び順保存（ajax）
    public function saveList(Request $request){
        // print_r($request->all());
        if($request->type=="list"){//list"の場合
            $list = file(storage_path('data/sort_list.csv'));//sort_list.csvファイルを読み込み
            $list_array = explode(",", str_replace("\n","", $list[0]));//listarrayには元の並び
            $list_num = explode(",", $request->list);//並べ替えた並び
            $str = "";
            foreach ($list_num as $num){
                $str .= $list_array[$num] . ",";
            }
            $str = rtrim($str,",");
            print $str;
            //
            $fp = fopen(storage_path('data/sort_list.csv'), "w");//w,a,rのモードがある
            fputs($fp, $str);
            fclose($fp);//$fpを使ったらfcloseで閉じる
            return;
            
        }elseif($request->type=="image"){
            $list = file(storage_path('data/sort_list2.csv'));
            $list_array = explode(",", $list[0]);//listarrayには元の並び
            $list_num = explode(",", $request->list);//並べ替えた並び
            $str = "";
            foreach ($list_num as $num){
                $str .= $list_array[$num] . ",";
            }
            $str = rtrim($str,",");
            print $str;
            //
            $fp = fopen(storage_path('data/sort_list2.csv'), "w");//w,a,rのモードがある
            fputs($fp, $str);
            fclose($fp);//$fpを使ったらfcloseで閉じる
            return;
        }
    }


//ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー

    public function photo() {
        $image_array = [
            [
                'thumb' => "images/upload_thumbs/0NohESiqgPGl_thumb.jpg",
                'main' => "images/upload_images/0NohESiqgPGl.jpg",
                'title' => "タイトル1"
            ],
            [
                'thumb' => "images/upload_thumbs/1kZJ6QVTGOAW_thumb.jpeg",
                'main' => "images/upload_images/1kZJ6QVTGOAW.jpg",
                'title' => "タイトル2"
            ],
            [
                'thumb' => "images/upload_thumbs/3ydhOeAYQCRJ_thumb.jpg",
                'main' => "images/upload_images/3ydhOeAYQCRJ.jpg",
                'title' => "タイトル3"
            ]
            
        ];
        //この書き方もできる
    /*     $image = array(
            array('thumb' => "images/upload_thumbs/3ydhOeAYQCRJ_thumb.jpg",
                'main' => "images/upload_images/3ydhOeAYQCRJ.jpg",
                'title' => "タイトル",
            )
        ); */
        //dd($image_array);
        
        return view('contents.photo',compact('image_array'));
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
  


}