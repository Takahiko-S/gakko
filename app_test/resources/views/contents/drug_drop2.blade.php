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

#draggable4{
width:200px;
height:200px;
float:left
}
#draggable5{
width:200px;
height:200px;
float:left;
margin-left:10px;
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
            		<div id="draggable" class="ui-widget-content dd_div">
                		<div id="sample_image1" class="img_area">
                          <p>画像をドラッグしてください</p>
                     </div>
                  </div>
                  <div id="draggable2" class="ui-widget-content dd_div">
                		<div id="sample_image2" class="img_area">
                          <p>画像をドラッグしてください</p>
                     </div>
                  </div>
                     <div id="draggable3" class="ui-widget-content dd_div">
                		<div id="sample_image3" class="img_area">
                          <p>画像をドラッグしてください</p>
                     </div>
                  </div>

        		</div>
           </div>
           	<div class="col-6 mb-5 border">
               	<div id="box-b">
               	<p>BOX-B</p>
               		<div id="draggable4" class="ui-widget-content dd-area">
                    		<div id="sample_image4" class="img_area">
                              <p>画像をドラッグしてください</p>
                         </div>
                 		 </div>
               	 	<div id="draggable5" class="ui-widget-content dd-area">
                    		<div id="sample_image5" class="img_area">
                              <p>画像をドラッグしてください</p>
                         </div>
                 		 </div>
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
//ドラッグアンドドロップファンクション 要素をドラッグアンドドロップできるようにし、ドラッグ操作が完了したときに要素の座標値を表示する
$( ".dd_div" ).draggable({
    stop:function(e,ui){//座標値が表示される
        console.log('top: ' + (ui.offset.top - $('body').position().top));
        console.log('left: ' + (ui.offset.left - $('body').position().left));
        var b = $(this);
        console.log(b.width());//width内寸１９８がでる
        console.log(b.height());
        alert('top: ' + (ui.offset.top - $('body').position().top) + '\nleft: ' + (ui.offset.left - $('body').position().left));    
        }

    }).resizable({
    	 stop:function(e,ui){
        	 console.log(ui.size['width']);
        	 console.log(ui.size['height']);'#sample_image4'
        	 alert('width: ' + ui.size['width'] + '\nheight: ' + ui.size['height']);    
        	 end_img = $(this).children('.img_area').html();
        	 var img_src= ($(this).children('.img_area').children('img').attr('src'));
        	 var thumbArea =$(this).children('.img_area');
        	 if(img_src != null){
        		 createThumbnail(img_src,$(this),function(thumbnail){
        			 var img =$('<img />');
         			img.attr('src',thumbnail);
    				thumbArea.html(img);
        			// $('#sample_image1').children('img').attr('src',thumbnail));この書き方でもOK
    				});
    							
        	 }else{
               console.log("なし");
    	 }
    	 
    	 }
    });
 //ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
    //ドラッグオーバー検知
$('.dd_div').on('dragover',function(e){
	e.stopPropagation();
	e.preventDefault();
});
    
    //ドロップ検知
$('.dd_div').on('drop',function(e){
	e.stopPropagation();
	e.preventDefault();
	var file = e.originalEvent.dataTransfer.files[0];
	if(file == null){
		console.log("画像");
		//console.log(start_img.html());
		$(this).children('.img_area').html(start_img.html());
		start_img.html(end_img);
		return;
        }
	onDropFile_1(e,$(this),$(this).children('.img_area'));
});

//ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー  
function onDropFile_1(event,object,thumb){//ファイルをドロップするファンクション
	var photArea = object;
	var thumbArea = thumb;
	//サムネイルを空にする
	thumbArea.empty();
	//ドロップされたファイルを取得
	var file = event.originalEvent.dataTransfer.files[0];
	//console.log(file);
	
	//ファイルの種類チェック Linuxのchromeでドロップアンドドロップするとエラーが解消される
	if(!file.type.match(/^image\/(jpeg|png)$/)){//javascriptのファイルの種類を調べる方法 imageもしくはpngじゃないときはhtmlのメッセージ表示する
		thumbArea.css('color','#ff0000').html('この種類のファイルは使用できません');
		return;
		}
	var reader = new FileReader();
	reader.onload = function(e){
		var dataUrl = e.target.result;
		//u_file = dataUrl;
		createThumbnail(dataUrl,object,function(thumbnail){
			var img = $('<img />');
			img.attr('src',thumbnail);
		console.log(thumbnail);
			thumbArea.append(img);
			});
		}
	reader.readAsDataURL(file);        


}


//ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
    //表示用サムネイル作成ファンクション
function createThumbnail(dataUrl,object,callback){
    //サムネイルの領域サイズ
    var thumbAreaWidth = object.width();//draggableのwidthをthumbAreaWidthに代入
    var thumbAreaHeight = object.height();

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
            

//ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
//ドラッグアンドドロップファンクション
/* $( ".img_area" ).draggable({
	revert:true,
    stop:function(e,ui){//座標値が表示される
        console.log('top: ' + (ui.offset.top - $('body').position().top));
        console.log('left: ' + (ui.offset.left - $('body').position().left));
        var b = $(this);
        console.log(b.width());//width内寸１９８がでる
        console.log(b.height());
        alert('top: ' + (ui.offset.top - $('body').position().top) + '\nleft: ' + (ui.offset.left - $('body').position().left));    
     }
    }); */

var start_img="";
var end_img ="";

$( ".img_area" ).on('dragstart',function(e){
console.log('start');
start_img = $(this);

});


//ドラッグオーバー検知
$('.dd-area').on('dragover',function(e){
	e.stopPropagation();
	e.preventDefault();
});
        
//ドロップ検知
$('.dd-area').on('drop',function(e){
	e.stopPropagation();
	e.preventDefault();
	
	end_img = $(this).children('.img_area').html();
    // console.log(e.originalEvent.dataTransfer.files[0]);
    var file = e.originalEvent.dataTransfer.files[0];
    if(file == null){
		console.log("画像");
		//console.log(start_img.html());
		$(this).children('.img_area').html(start_img.html());
		start_img.html(end_img);
		return;
        }
    
    src= URL.createObjectURL(file);
    console.log(src);
    var img ="<img src='" + src +"' class='w-100'>";
$(this).children('.img_area').html(img);
});













</script>
</x-slot>

</x-base-layout>