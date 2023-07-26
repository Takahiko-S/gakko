<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function upload(Request $request) {
      // dd($request->all());
       $params = $request->validate([
           'up_file'=> 'required|image|max:20000',
       ]);
       $file=$params['up_file'];
       //アップロードされたファイル名取得
       $img_name=$file->getClientOriginalName();
       
       $id = 1;
       $id_str = sprintf('%05d',$id);
       //ファイル名をそのまま保存
       $file_name=$file->storeAs($id_str,$img_name);
       //dd($file_name);
       //ファイル名をランダムに保存
        $file_name = $file->store('upload_temp/'.$id_str);

           
        return redirect(route('index'));
        
    }
    
}
