<x-base-layout>
<x-slot name="title">PDFサンプル</x-slot>
<x-slot name="css"></x-slot>
<x-slot name="main">
    <div class= "container">
    	<div class="row">
    		<div class="col-12 mb-5">
    			<h1 class="text-center text-danger p-3">PDFサンプル</h1>
    		</div> 	
    	</div>
    	
    	<div class="row">
    		<div class="col-12"><h3>PDFアップロード</h3></div>    		
    		<form class="row mb-5" method="post" action="./pdf_save" enctype="multipart/form-data">
    		@csrf
    			<div class="col-md-4">
    				<div class="mb-3">
    					<label for="title" class="form-label">タイトル</label> 
    					<input	type="text" class="form-control" id="title" name="title" required>
    				</div>
        		</div> 
    			<div class="col-md-8">
    				<label for="biko" class="form-label">備考</label>
    				 <input type="text" class="form-control" id="biko" name="biko">
    			</div>
    			<div class="col-md-3 mb-3">
        			<input type = "file" id="pdf" name="pdf" style="display:none" accept=".pdf,.PDF" required autocomplete="off">
        			<button type ="button" class="btn btn-secondary" id="select_file_bt">PDF参照</button>			
    			</div>
    			
    			<div class="col-md-6 mb-3" id ="select">未選択</div>
    			
    			<div class="col-md-3 mb-3">
    				<button type = "submit" class="btn btn-primary">アップロード</button>
    			</div>
    			
    		</form>
    	</div>
    	
    	<hr>
    	<div class="row">
        	<div class="col-12">
        		<h5 class="text-center mb-3">アップロード済みPDFリスト</h5>
        	</div>
        	@foreach($image_array as $array)
        	<div class="col-md-3 p-2">
        	<p class= "bg-light" id="title_{{$array['id']}}">{{$array['title']}}</p>
        	<img src ="{{$array['img']}}" class="w-100 pdf_thumb pointer border" value="{{$array['id']}}">
        	<p>{{$array['pdf_name']}}</p>
        	<p class="hidden" id="title_{{$array['id']}}">{{$array['biko']}}</p>
        	</div>
        	@endforeach
    	</div>
    	
	</div>
<div id="dialog-form" title="オペレーション">
	<div class="mb-3">
	<p>タイトル</p>
	<p id="d_title"></p>
	<p>備考</p>
	<p id ="d_biko"></p>
	<p class="mt-3">このPDFの処理を選択してください</p>
	</div>
</div>


</x-slot>
<x-slot name="script">
<script>
//ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
//クリックファンクション
$('#select_file_bt').on('click',function(e){
	$('#pdf').trigger('click');
});
//ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
//ファイル選択処理
$('#pdf').on('change',function(e){
	console.log($(this).prop('files')[0].name);//.prop('files')は、ファイル選択フォームで選択されたファイルの情報を取得するために使用されるメソッド
	$('#select').html($(this).prop('files')[0].name);
});
//ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
$( "#dialog-form" ).dialog({
    autoOpen: false,
    height: "auto",
    width: "auto",
    modal: true,
    buttons: {
      "キャンセル": function() {
        $( this ).dialog( "close" );
      },
      "表示": function() {
          $( this ).dialog( "close" );
          loadPdf();
        },
        "削除": function() {
            $( this ).dialog( "close" );
            deletePdf();
          }
    
    }
  });

var check_num = 0;
$('.pdf_thumb').on('click',function(e){
	check_num = $(this).attr('value');
	console.log(check_num);
	$('#d_title').html($('#title_' + check_num).html());
	$('#d_biko').html($('#biko_' + check_num).html());
	$('#dialog-form').dialog('open');
})



  //ファイル削除
  function deletePdf(){
	  console.log('delete');
	  document.body.style.cursor = 'wait';//waitはマウスカーソルがくるくるしてる状態 ここからajax
		//FormDataオブジェクトを用意
		let code = document.getElementsByName("_token").item(0).value;
		
		var fd = new FormData();//変数fdにFormDataをセット
		fd.append("_token",code);
		fd.append("delete_id",check_num);
		


		//XHRで送信
		$.ajax({
			url: "./delete_pdf",  //送信先
			type:"post",//getでも送れる
			data:fd,
			mode:"multiple",
			async: false,
			processData: false,
			contentType:false,
			timeout: 10000,    //単位はミリ秒
			error:function(XMLHttpRequest,textStatus,errorThrown){
				err=XMLHttpRequest.status+"\n"+XMLHttpRequest.statusText;
				alert(err);
				document.body.style.cursor = 'auto';
				},
				beforeSend:function(xhr){//送信前に何かしたいときにここのカッコに入れる

					}
			})
			.done(function(res){
				//ここは戻ってきた時の処理を記述
				console.log(res);
			
				document.body.style.cursor = 'auto';
				location.reload();

				});//ここまでajax
  }
  //PDF表示
  function loadPdf(){
	  console.log('load');
	  document.body.style.cursor = 'wait';//waitはマウスカーソルがくるくるしてる状態 ここからajax
		//FormDataオブジェクトを用意
		let code = document.getElementsByName("_token").item(0).value;
		
		var fd = new FormData();//変数fdにFormDataをセット
		fd.append("_token",code);
		fd.append("pdf_id",check_num);
		

		//XHRで送信
		$.ajax({
			url: "./load_pdf",  //送信先
			type:"post",//getでも送れる
			data:fd,
			mode:"multiple",
			async: false,
			processData: false,
			contentType:false,
			timeout: 10000,    //単位はミリ秒
			error:function(XMLHttpRequest,textStatus,errorThrown){
				err=XMLHttpRequest.status+"\n"+XMLHttpRequest.statusText;
				alert(err);
				document.body.style.cursor = 'auto';
				},
				beforeSend:function(xhr){//送信前に何かしたいときにここのカッコに入れる

					}
			})
			.done(function(res){
				//ここは戻ってきた時の処理を記述
				console.log(res);
			
				document.body.style.cursor = 'auto';
				//location.reload();
				let pdf ='data:application/pdf;base64,' + res;
				var win = window.open();
				win.document.write("<iframe src='"+ pdf +"' frameborder='0' style ='border:0;top:0px;left:0px;bottom:0px;right:0;width:100%;height:100%' allowfulscreen></iframe>");
				
				});//ここまでajax
	  }


















</script>
</x-slot>

</x-base-layout>