<x-base-layout>
<x-slot name="title"></x-slot>
<x-slot name="css">
<style type="text/css">



#box-a,#box-b{

height:auto;
}
.inline{
    float:left;
    padding:5px;
}
.clear{
clear:both;
}
</style>
</x-slot>
<x-slot name="main">
    <div class= "container">
    	<div class="row">
    		<div class="col-12 mb-5">
    			<h1 class="text-center text-primaryp-3">ソータブルテスト</h1>
    		</div>
    		@csrf
    		<div class="col-6 mb-5 border">
        		<div id="box-a">
        		<p>BOX-A</p>            	 
                <ul id="sortable" class="d-grid gap-2">
                @foreach($list_array as $list)
                 <li class="btn btn-outline-primary btn-sm" id="{{$loop->index}}" >{{$list}}</li><!--idのindexはlaravelのloop変数 数字が取得できる -->
                @endforeach               
                </ul>
                <p class="text-center">
                <button class="btn btn-primary save_bt" id="save_a_bt" tag="sortable">設定を保存</button>
                <button class="btn btn-secondary reset_bt" id="reset_a_bt">リセット</button>
                </p>
        		</div>
           </div>
		<div class="col-6 mb-5 border">
			<div id="box-b">
			<div class="row text-center">
				<p>BOX-B</p>
				
				<ul id="sortable2">
					@foreach($image_array as $image)
					<li class="inline btn btn-sm" id="{{$loop->index}}">
					<img src="{{asset($image)}}"></li> <!-- imagesをこっちに書けばには書かなくてもいい -->
					@endforeach
				</ul>
				<div class="clear">
					<p class="text-center">
						<button class="btn btn-primary save_bt" id="save_a_bt2" tag="sortable2">設定を保存</button>
						<button class="btn btn-secondary reset_bt" id="reset_a_bt2">リセット</button>
					</p>
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
 $( "#sortable" ).sortable({
     update:function(ev,ui){//updateイベントに対して、関数を定義
     var updateArray = $('#sortable').sortable("toArray").join(",");//リスト内並べ替え後の順序を取得し、カンマで区切られた文字列に変換
 	console.log(updateArray);
	 }
 });
 $( "#sortable2" ).sortable({
     update:function(ev,ui){//updateイベントに対して、関数を定義
     var updateArray = $('#sortable2').sortable("toArray").join(",");//リスト内並べ替え後の順序を取得し、カンマで区切られた文字列に変換
 	console.log(updateArray);
	 }
 });
 
 $('.save_bt').on('click',function(e){
	 var tag = $(this).attr('tag');
	 var updateArray = $('#' + tag).sortable("toArray").join(",");
	 console.log(updateArray);
	 document.body.style.cursor = 'wait';//waitはマウスカーソルがくるくるしてる状態 ここからajax
		//FormDataオブジェクトを用意
		let code = document.getElementsByName("_token").item(0).value;
		
		var fd = new FormData();//変数fdにFormDataをセット
		fd.append("_token",code);
		fd.append("list",updateArray);
		if(tag == "sortable"){
		fd.append("type","list");
			}else{
				fd.append("type","image");//tagがsortableだったときとimageだったとき
			}


		//XHRで送信
		$.ajax({
			url: "./save_list",  //送信先
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
	});
	$('.reset_bt').on('click',function(e){
	location.reload();
	});
//ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー

 
</script>
</x-slot>

</x-base-layout>