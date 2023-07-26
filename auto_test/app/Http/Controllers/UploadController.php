<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\File;

class UploadController extends Controller
{
    public function showForm(Request $request){
        return view('file_upload');
    }
    
    
    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            
            // ファイルバリデーション
            $maxFileSize = 20 * 1024; // 20MBのファイルサイズ制限
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'pdf']; // 許可される拡張子
            $originalFileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            
            if ($file->getSize() <= $maxFileSize && in_array($extension, $allowedExtensions)) {
                // ランダムファイル名を生成
                $randomFileName = Str::random(40).'.'.$extension;
                
                // ファイルを保存
                $filePath = $file->storeAs('upload_data', $randomFileName);
                
                // データベースにファイル情報を保存
                $savedFile = File::create([
                    'original_name' => $originalFileName,
                    'random_name' => $randomFileName,
                    'file_path' => $filePath,
                ]);
                
                return 'ファイルがアップロードされました。保存先: ' . $filePath;
            } else {
                return 'ファイルサイズが大きすぎるか、許可されていない拡張子です。';
            }
        }
        
        return 'ファイルが選択されていません。';
        
    }
}