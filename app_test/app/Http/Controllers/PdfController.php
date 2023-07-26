<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Imagick;
use App\Models\PdfPool;
use Symfony\Component\Mime\Encoder\Base64Encoder;
use Spatie\FlareClient\FlareMiddleware\RemoveRequestIp;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    //PDFメインページ表示
    public function pdf_main(){
        $image_array = array();
        $pdf_list = PdfPool::all();
        foreach($pdf_list as $list){
            if(is_file(storage_path('app/pdf_thumbs/' .$list->thumb_name))){
                
            $thumb = file_get_contents(storage_path('app/pdf_thumbs/' .$list->thumb_name));
            $type = "data:images/png;base64,";
            $image_array[] = array('id' => $list->id,
                'pdf_name'=> $list->pdf_name,
                'img' =>$type . base64_encode($thumb),
                'title' => $list->title,
                'biko' => $list->biko);
            }
           
        }
        return view('contents.pdf_main',compact('image_array'));//作ったimage_array配列を受け渡す
    }
//ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
    //pdfファイルアップロード
    public function save_Pdf(Request $request){
       // dd($request->all());
        $params = $request->validate([
            'pdf'=>'required|mimes:pdf|max:20000',
        ]); 
        $file =$params['pdf'];
         //アップロードされたファイル名取得
        $pdf_name = $file->getClientOriginalName();
        //ファイル名をランダムに保存
        $file_name =$file->store('pdf');
        //dd('$file_name');
        $f_name = str_replace("pdf/", "", $file_name);
        //pdfからpngを生成
        $size=600;
        $png = $this->pdfToPng($f_name,$size);
        //保存する画像名を生成
        $f_info = pathinfo($f_name);
        $thumb_file_name = $f_info['filename'] . ".png";
        //変換データをPNGで保存
        if(!is_dir(storage_path('app/pdf_thumbs'))){
            mkdir(storage_path('app/pdf_thumbs'));
        }
        file_put_contents(storage_path('app/pdf_thumbs/' . $thumb_file_name), $png);//引数が二つ以上必要
        //dd($thumb_file_name);
        //データベースに保存
        $data = new PdfPool();
        $data->title = $request->title;
        $data->pdf_name = $pdf_name;
        $data->master_name = $f_name;
        $data->thumb_name = $thumb_file_name;
        $data->biko = $request->biko;
        $data->save();
        
        
        return redirect(route('pdf_main'));
        
       
    }
    //ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
    
    //PDFからPNGを生成するファンクション
    public function pdfToPng($pdfName,$size){
        $rf = storage_path('app/pdf/' .$pdfName);
        $im = new Imagick();
        $im->setresolution(144,144);//解像度
        $im->readimage($rf);
        $im->setImageIndex(0);
        $im->transformimagecolorspace(Imagick::COLORSPACE_SRGB);
        $im->setimageformat("png");
        $im->thumbnailimage($size, $size,true);
        
        //BLOB形式で戻す場合に$pngを戻す 今回はそのまま返すからコメントしておく
        //$png = "data:image/png:base64," . base64_encode($im);
       
        return $im;
    }
//ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
    
    public function delete_Pdf(Request $request){
        $del_id = $request->delete_id;
        $pdf = PdfPool::find($del_id);
        Storage::delete("pdf/" . $pdf -> master_name);
        Storage::delete("pdf_thumbs/" . $pdf->thumb_name);
        PdfPool::destroy($del_id);
        
        return;
                
    }
    
    public function load_Pdf(Request $request) {
        $data = PdfPool::find($request->pdf_id);
        $pdf = file_get_contents(storage_path('app/pdf/' . $data->master_name));
        
        return base64_encode($pdf);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
