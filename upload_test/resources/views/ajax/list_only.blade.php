	<div class="row">


	<div class="col-12">
		<div class="row dd_area1" id="drop-zone">
			@foreach($data_list as $list)
			<div class="col-6 col-md-2 p-1 img_area1" draggable="true" >
				<img src="{{$list['img']}}" class="w-100 show_pic" value="{{$list['id']}}">
				
			</div>
			@endforeach
	
		
			</div>
	</div>
			<div class="col-12 text-center mt-5">
		@for($i = 0; $i < $tab_count; $i++)
    		@if($i == $page_num)
    	
    		<button class="btn btn-primary btn-sm page_bt" value="{{$i}}">{{$i + 1}}</button>
    		@else
    		<button class="btn btn-outline-primary btn-sm page_bt" value="{{$i}}">{{$i + 1}}</button>
    		@endif
		@endfor
		</div>

</div>
<script>
$('.page_bt').on('click',function(e){
	changeContents($(this).attr('value'));
	 page_num = $(this).attr('value');
	});
$('.show_pic').on('click',function(e){
	console.log($(this).attr('value'));
	openModal($(this).attr('value'));
});


//--------------------------------------------------------------------------------------------------ーーーー
$("#drop-zone").on("dragover", function (e) {
  e.stopPropagation();
  e.preventDefault();
  e.originalEvent.dataTransfer.dropEffect = "copy"; // ドロップ時のカーソルをコピーに変更
});

// ドロップイベントを処理する
$("#drop-zone").on("drop", function (e) {
  e.stopPropagation();
  e.preventDefault(); 

  // ドロップされたファイルを取得する書き方
  var files = e.originalEvent.dataTransfer.files;

  // ファイルが1つだけで画像の場合、アップロード処理を実行　こっちの機能を使いたい場合下の複数ファイルアップロードの場合をコメントする
  /* if (files.length === 1 && files[0].type.startsWith("image/")) {//startsWith=指定の文字列image/で始まるかチェック
	  console.log(files[0])
    uploadData(files[0]);
   
  } else {
    alert("画像ファイルを1つだけドロップしてください。");
  }  */

//ファイルが複数の場合、画像ファイルのみ実行
  for (var i = 0; i < files.length; i++) {
	  // ファイルが画像の場合、アップロード処理を実行
	  if (files[i].type.startsWith("image/")) {
		  
	    console.log(files[i].name);
	    uploadData(files[i],files[i].name);
	  } else {
	    console.log("非画像ファイルは無視されました:", files[i].name);
	  }
	}

	
});

//ドラッグオーバーイベントを処理する-----ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー

var start_img="";
var end_img =""; 

$( ".img_area1" ).on('dragstart',function(e){
console.log('start');
start_img = $(this);

}); 


//ドラッグオーバー検知
$('.dd-area1').on('dragover',function(e){
	e.stopPropagation();
	e.preventDefault();
});


//ドロップ検知
 $('.dd-area1').on('drop',function(e){
	e.stopPropagation();
	e.preventDefault();
	
	end_img = $(this).children('.img_area').html();
    // console.log(e.originalEvent.dataTransfer.files[0]);
    var file = e.originalEvent.dataTransfer.files[0];
    if(file == null){
		console.log("画像");
		//console.log(start_img.html());
		$(this).children('.img_area').html(start_img.html());
	//	start_img.html(end_img);
		return;
        }
    
    src= URL.createObjectURL(file);
    console.log(src);
    var img ="<img src='" + src +"' class='w-100'>";
$(this).children('.img_area').html(img);
}); 






</script>
