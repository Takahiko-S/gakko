<?php

include_once 'db_op_image.php';

if(isset($_FILES['up_file']['name'])){
    if($_POST['title'] == ""){//titleが入ってないとき
        exit("タイトルがありません");
    }
    if($_FILES['up_file']['name'] == ""){//titleが入ってないとき
        exit("添付ファイルがありません");
    }
    
    /* print_r($_POST);
     print"<br>";
     print_r($_FILES); */
    
    $image_dir = "upload_images";  //マスター画像保存ディレクトリ名
    $thumb_dir = "upload_thumbs";  //サムネイル保存ディレクトリ名    57と結びつき
    
    //マスター画像保存
    $main_file_name = $_FILES['up_file']['name'];  //アップロードされたファイル名取得
    $main_tmp_file = $_FILES['up_file']['tmp_name'];  //サーバーに一時保存されたファイル名
    $fname = makeRandFile($main_file_name);
    //保存するパス
    $master_path = $image_dir . "/";
    $thumb_path = $thumb_dir . "/";
    //アップロードされた一時ファイルに名前をつけて保存
    move_uploaded_file($main_tmp_file, $master_path . $fname[0]);
    
    $thumb_file = makeThumb($master_path . $fname[0],$fname[1] ,$thumb_path,200,200);
    //print $thumb_file;
    
    $save_id = add_data($fname[0], $fname[1], $_POST['title']);
    ださい
    //print $save_id . "に保存しました";
    
    header("Location: upload_test.php");
}



if(isset($_FILES['upload_image'])){//トリミング付きアップロードの式
    print_r($_POST);
    print_r($_FILES);
    $image_dir = "upload_images";  //マスター画像保存ディレクトリ名
    $thumb_dir = "upload_thumbs";  //サムネイル保存ディレクトリ名    57と結びつき
    
    //マスター画像保存
    $main_file_name = $_FILES['upload_image']['name'];  //アップロードされたファイル名取得
    $main_tmp_file = $_FILES['upload_image']['tmp_name'];  //サーバーに一時保存されたファイル名
    $fname = makeRandFile($main_file_name);
    //保存するパス
    $master_path = $image_dir . "/";
    $thumb_path = $thumb_dir . "/";
    //アップロードされた一時ファイルに名前をつけて保存
    move_uploaded_file($main_tmp_file, $master_path . $fname[0]);
    
    $thumb_file = makeThumb($master_path . $fname[0],$fname[1] ,$thumb_path,200,200);
    //print $thumb_file;
    
    $save_id = add_data($fname[0], $fname[1], $_POST['title']);
    
    //print $save_id . "に保存しました";
    
    
    return;
}







//ランダムに文字列を生成するファンクション
function getTempName($num){
    $base = array("0","1","2","3","4","5","6","7","8","9",
        "a","b","c","d","e","f","g","h","i","j","k","l","m","n"
        ,"o","p","q","r","s","t","u","v","w","x","y","z",
        "A","B","C","D","E","F","G","H","I","J","K","L","M","N"
        ,"O","P","Q","R","S","T","U","V","W","X","Y","Z");
    

    
    $temp_array = array_rand($base,$num); //配列からランダムに取得、連想配列で戻す
    shuffle($temp_array); //連想配列をランダムに並べ替える
    $str = "";
    foreach ($temp_array as $d){
        $str .= $base[$d];
    }
    return $str;
}

//ランダムファイル名生成、サムネイル用ファイル名付き、配列で戻す
function makeRandFile($fname) {
    $p_info = pathinfo($fname);
    $rand_name = getTempName(12);
    $file_name = $rand_name . "." . $p_info['extension'];
    $thumb_name =  $rand_name . "_thumb." . $p_info['extension'];
    $files = array($file_name,$thumb_name);
    return $files;
}
//サムネイル生成ファンクション
function makeThumb($file,$thumb_name,$save_path,$width,$height){
    //イメージファイルサイズを取得
    $imagearray = getimagesize($file);
    $srcwidth = $imagearray[0];
    $srcheight = $imagearray[1];
    
    //縦横の元画像に対する比率をセット
    $scaleX = $width / $srcwidth;
    $scaleY = $height /$srcheight;
    
    //縦横の比率を比較して大きい方にスケールをセット
    if($scaleX >= $scaleY){
        $scale = $scaleX;
    }else{
        $scale = $scaleY;       
    }
    
    //ファイルの種類を取得
    $p_info = pathinfo($file);
    $ext = $p_info['extension'];
print_r($p_info);
        // 拡張子にあわせてビットマップを生成 画像処理するときビットマップにしてから処理する
    if ($ext == "jpg" || $ext == "JPG" || $ext == "jpeg" || $ext == "JPEG") {
        $srcimagefile = imagecreatefromjpeg($file);
    } elseif ($ext == "png" || $ext == "PNG") {
        $srcimagefile = imagecreatefrompng($file);
    }else{
        return;
        
    }
    
    //ビットマップをスケールダウン
    $newwidth = $srcwidth * $scale;
    $newheight= $srcheight* $scale;
    
  //新しいビットマップを生成する
  $newimgfile = imagecreatetruecolor($newwidth, $newheight);
  //ブレンドモードを無効にする
  imagealphablending($newimgfile, false);
 //完全なアルファチャンネル情報を保存するフラグをONにする
  imagesavealpha($newimgfile,true);//透明度を有効にする
  
  //スケールダウンの実効
  imagecopyresampled($newimgfile,$srcimagefile, 0, 0, 0, 0, $newwidth, $newheight, $srcwidth, $srcheight);
  
  //サムネイル用キャンパス生成
  $thumbimg = imagecreatetruecolor($width, $height);
  //ブレンドモードを無効にする
  imagealphablending($thumbimg, false);
  //完全なアルファチャンネル情報を保存するフラグをONにする
  imagesavealpha($thumbimg,true);
  
  //サイズにあわせてトリミング
  $ofsetX = ($newwidth - $width) / 2;
  $ofsetY = ($newheight - $height) / 2;
  
  //トリミングを実行
  imagecopy($thumbimg, $newimgfile, 0, 0, $ofsetX, $ofsetY, $width, $height);
  
  //サムネイル情報取得
  $p_info = pathinfo($thumb_name);
  $ext = $p_info['extension'];
  
  //サムネイルを指定形式で保存
  if ($ext == "jpg" || $ext == "JPG" || $ext == "jpeg" || $ext == "JPEG") {
      $savename = $save_path . $thumb_name;
      //ファイルが存在している場合は削除
      if(file_exists($savename)){
          unlink($savename);
      }
      //jpgでビットマップを保存
      imagejpeg($thumbimg,$savename);
  } elseif ($ext == "png" || $ext == "PNG"){
      $savename = $save_path . $thumb_name;
  //ファイルが存在している場合は削除
  if(file_exists($savename)){
      unlink($savename);
  }
  //jpgでビットマップを保存
  imagepng($thumbimg,$savename);
}else{
    return;
  
}
imagedestroy($srcimagefile);
imagedestroy($newimgfile);
imagedestroy($thumbimg);

//保存したファイル名を返す
return $savename;


}








?>