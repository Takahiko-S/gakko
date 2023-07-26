<x-base-layout>
<x-slot name="title"></x-slot>
<x-slot name="css">
<style type="text/css">

#draggable{
width:200px;
height:200px;
float:left
}
#draggable2{
width:100px;
height:100px;
margin-left:10px;
float:left
}
#draggable3{
width:100px;
height:150px;
margin-left:10px;
float:left
}

#box-a,#box-b{

height:350px;
}
</style>
</x-slot>
<x-slot name="main">
    <div class= "container">
    	<div class="row">
    		<div class="col-12 mb-5">
    			<h1 class="text-center text-primaryp-3">ドラッグアンドドロップテスト</h1>
    		</div>
    		<div class="col-6 mb-5 border">
        		<div id="box-a">
        		<p>BOX-A</p>
            		<div id="draggable" class="ui-widget-content">
                		<div id="sample_image1">
                          <p>画像をドラッグしてください</p>
                     </div>
                  </div>
                  <div id="draggable2" class="ui-widget-content">
                		<div id="sample_image2">
                          <p>画像をドラッグしてください</p>
                     </div>
                  </div>
                     <div id="draggable3" class="ui-widget-content">
                		<div id="sample_image3">
                          <p>画像をドラッグしてください</p>
                     </div>
                  </div>

        		</div>
           </div>
           	<div class="col-6 mb-5 border">
               	<div id="box-b">
               	<p>BOX-B</p>
               	
               	 	
               	</div>
           	</div>

    	</div>
    </div>


</x-slot>
<x-slot name="script">
<script>
//ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
//ファイルurl用変数
var u_file;

//エリア外へのドロップを無効に設定
$(document).on('drop dragover',function(e){
	e.stopPropagation();
	e.preventDefault();
});
//ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
//ドラッグアンドドロップファンクション
    $( "#draggable" ).draggable({
        stop:function(e,ui){//座標値が表示される
            console.log('top: ' + (ui.offset.top - $('body').position().top));
            console.log('left: ' + (ui.offset.left - $('body').position().left));
            var b = $("#draggable");
            console.log(b.width());//width内寸１９８がでる
            console.log(b.height());
            alert('top: ' + (ui.offset.top - $('body').position().top) + '\nleft: ' + (ui.offset.left - $('body').position().left));    
            }

        }).resizable({
        	 stop:function(e,ui){
            	 console.log(ui.size['widht']);
            	 console.log(ui.size['height']);
            	 alert('width: ' + ui.size['widht'] + '\nheight: ' + ui.size['height']);    
            	 var img_src= ($('#sample_image1').children('img').attr('src'));
            	 if(img_src != null){
            		 createThumbnail(img_src,function(thumbnail){
            			 var img =$('<img />');
             			img.attr('src',thumbnail);
        				$('#sample_image1').html(img);
            			// $('#sample_image1').children('img').attr('src',thumbnail));この書き方でもOK
        				});
        							
            	 }else{
                   console.log("なし");
        	 }
        	 
        	 }
        });
 //ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
    //ドラッグオーバー検知
$('#draggable').on('dragover',function(e){
	e.stopPropagation();
	e.preventDefault();
});
    
    //ドロップ検知
$('#draggable').on('drop',function(e){
	e.stopPropagation();
	e.preventDefault();
	onDropFile_1(e);
});

//ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー  
function onDropFile_1(event){//ファイルをドロップするファンクション
	var photArea =$('#draggable');
	var thumbArea = $('#sample_image1')
	//サムネイルを空にする
	thumbArea.empty();
	//ドロップされたファイルを取得
	var file = event.originalEvent.dataTransfer.files[0];
	console.log(file);
	
	//ファイルの種類チェック Linuxのchromeでドロップアンドドロップするとエラーが解消される
	if(!file ||!file.type.match(/^image\/(jpeg|png)$/)){//javascriptのファイルの種類を調べる方法 imageもしくはpngじゃないときはhtmlのメッセージ表示する
		thumbArea.css('color','#ff0000').html('この種類のファイルは使用できません');
		return;
		}
	var reader = new FileReader();
	reader.onload = function(e){
		var dataUrl = e.target.result;
		u_file = dataUrl;
		createThumbnail(dataUrl,function(thumbnail){
			var img = $('<img />');
			img.attr('src',thumbnail);
			thumbArea.append(img);
			});
		}
	reader.readAsDataURL(file);
	
}



//ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
    //表示用サムネイル作成ファンクション
    function createThumbnail(dataUrl,callback){
        //サムネイルの領域サイズ
        var thumbAreaWidth = $('#draggable').width();//draggableのwidthをthumbAreaWidthに代入
        var thumbAreaHeight = $('#draggable').height();

        var image = new Image();//Imageオブジェクト作成のオブジェクト使用
        image.onload = function(){//imageが読み込まれたときに実行されるファンクション
            var w = image.width;
            var h = image.height;
	        console.log("画像サイズ 高さ X 幅 :" + image.height + 'X' + image.width);

	        //表示エリアに対するスケール値算出
	        var sw = thumbAreaWidth / image.width;
	        var sh = thumbAreaHeight / image.height;
	        //上の式の大きい方のスケールを使用→状況によって小さい方のスケールも選択可能
	        var scale = Math.max(sw,sh);//Math＝javascript関数

	        //生成する画像の設定
	        var rw = parseInt(image.width * scale);//小数点を切り捨てて整数値に変える関数 小数点でインテジャー値は設定できないから。
	        var rh = parseInt(image.height * scale);

	        //画像を生成
	        var canvas = document.createElement('canvas');
	        var ctx = canvas.getContext('2d');
	        //生成するサイズを設定
	        canvas.width = thumbAreaWidth;
	        canvas.height = thumbAreaHeight;
	        //変換後の画像のサイズにあわせてオフセット値を設定 オフセット値とははみ出した値
	        var offsetX = 0;
	        var offsetY = 0;
	        if(rw >= thumbAreaWidth){
		        offsetX = parseInt(rw - thumbAreaWidth) / 2;
		     }else{
		    	 offsetY = parseInt(rh - thumbAreaHeight) / 2;
			        }
	        ctx.drawImage(image,-offsetX,-offsetY,rw,rh);
	        
	        callback(canvas.toDataURL());
	        
            }
        image.src = dataUrl;
        }




    
  //php_test/upload.phpからコピーして持ってきたーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー   
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
        } else if ($ext == "png" || $ext == "PNG") {
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
      
      //スケールダウンの実効;
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
      } else if ($ext == "png" || $ext == "PNG"){
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
            
    
  
</script>
</x-slot>

</x-base-layout>