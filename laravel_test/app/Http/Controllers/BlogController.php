<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class BlogController extends Controller
{
    public function top(){
       $data = Article::all();
        return view('contents.index',compact('data'));
    }
    //編集
    public function edit(Request $request){
       // dd($request->all());
        if($request->has('edit_id')){
            $data = Article::find($request->edit_id);
            return view('contents.edit',compact('data'));
        }else{
            return redirect(route('index'));
        }
    }
    
    //編集データ保存
    public function editSave(Request $request){
        //dd($request->all());
        $data = Article::find($request->d_id);
        $data->title = $request->title;
        $data->body = $request->body;
        $data->save();
        return redirect(route('index'));
    }
    
    //削除
    public function delete(Request $request){
        //dd($request->all());
        if($request->has('delete_id')){
            Article::destroy($request->delete_id);
        }
        return redirect(route('index'));            
        
    }
    
    //新規追加
    public function newSave(Request $request){
       // dd($request->all());
        $data = new Article();
        $data->title= $request->title;
        $data->body =$request->body;
        $data->save();
        return redirect(route('index'));
    }
    
    
    
    
    
    
    
    
}
