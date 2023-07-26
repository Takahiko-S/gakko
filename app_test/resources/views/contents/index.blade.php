<x-base-layout>
<x-slot name="title"></x-slot>
<x-slot name="css"></x-slot>
<x-slot name="main">
    <div class= "container">
    	<div class="row">
    		<div class="col-12 mb-5">
    			<h1 class="text-center text-danger p-3">ベースページ</h1>
    		</div>
    		<div class="col-md-4">
    		@csrf
    		<select class="form-select" id="select_pref">
    
             <option selected>都道府県を選択</option>
    				@foreach($prefs as $p)
    				<option value="{{$p->pref}}">{{$p->pref}}</option><!--prefをenglishとかに変えると英語表記などに変わる -->
    				@endforeach
            </select>
    		</div>
    		<div class="col-md-4" >
    		<select class="form-select" id="city_area">
             <option selected>都道府県から先に選択</option>
             
    		
            </select>

    		</div>
    	</div>
    </div>


</x-slot>
<x-slot name="script">
<script>
$('#select_pref').on('change',function(e){
	console.log($(this).val());
	document.body.style.cursor = 'wait';//waitはマウスカーソルがくるくるしてる状態 ここからajax
	//FormDataオブジェクトを用意
	let code = document.getElementsByName("_token").item(0).value;
	
	var fd = new FormData();//変数fdにFormDataをセット
	fd.append("_token",code);
	fd.append("pref",$(this).val());


	//XHRで送信
	$.ajax({
		url: "./get_city_list",  //送信先
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
			//console.log(res);
			$('#city_area').html(res);
		
			document.body.style.cursor = 'auto';
			//location.reload();

			});//ここまでajax
	});
	$('#city_area').on('change',function(e){
		console.log($(this).val());
	});
	


</script>
</x-slot>

</x-base-layout>