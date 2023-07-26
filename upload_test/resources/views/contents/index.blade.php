<x-base-layout>

<x-slot name="title">Upload_test</x-slot>
<x-slot name="css">
<style type="text/css">


#box-b{
height:400px;
}

#draggable5{
height:100%;
width:80%;
}
.dd-area {
  border: none;
  outline: none;
}


</style>
</x-slot>

<x-slot name="main"> 
@csrf
<div id="u_id" class="hidden">{{ Auth::user()->id}}</div>

<div class="container">
	<div class="row mt-3">
		<div class="col-12">
			<h1 class="text-center mb-5">Upload Test</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-8 mx-auto">
			<div id="box-b" class="mt-5">

				<div id="draggable5" class="ui-widget-content mx-auto dd-area">
					<div id="sample_image5" class="img_area" style="height: 300px">
						<p class="text-center mt-5 border"
							style="display: flex; align-items: center; justify-content: center; height: 50%;">画像をドラッグしてください</p>
					</div>
				</div>
			</div>
		</div>
	</div>




	<div class="row">
		<div class="col-12">ファイルリスト</div>
		<div class="col-12" id="message">&nbsp;</div>
	</div>

	<div class="w-100" id="list_area"></div>
	<div class="pb-3">
		<div class="col-12">
			<div class="ms-auto col-md-2 text-end">
				<button class="btn btn-primary" id="file_up_bt">アップロード</button>
				<input type="file" id="select_file" style="display: none"
					accept="images/*" multiple> <input type="file" id="change_file"
					style="display: none">
			</div>
		</div>
	</div>
</div>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal"
	data-bs-target="#exampleModal" id="modal_bt" style="display: none">
	Launch demo modal</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">画像確認</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal"
					aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<img src="" class="w-100" id="modal_image" value="">
				<p class="m-2">
					<input type="text" id="pic_title" class="form-control" value=""
						placeholder="タイトル">
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary"
					data-bs-dismiss="modal">確認</button>
				<button type="button" class="btn btn-info" id="save_title_bt"
					data-bs-dismiss="modal">タイトル保存</button>
				<button type="button" class="btn btn-danger" id="delete_bt"
					data-bs-dismiss="modal">削除</button>
			</div>
		</div>
	</div>
</div>
<div id="delete_dialog" title="削除の確認">
	<p class="text-center mb-3 text-primary" id="d_title"></p>
	<p class="text-center">ファイルを削除してもよろしいですか</p>
</div>
<div id="upload_dialog" title="アップロード中">
	<p class="d-flex justify-content-center p-3">
		<img src="{{asset('images/loading.gif')}}">
	</p>
	<p class="text-center">ファイルをアップロードしています。</p>
</div>
</x-slot>
    
    
<x-slot name="script">
<script>
//ファイルurl用変数
var u_file;

//エリア外へのドロップを無効に設定
$(document).on('drop dragover',function(e){
	e.stopPropagation();
	e.preventDefault();
});
//ドラッグアンドドロップファンクション
 $( ".img_area" ).draggable({
	revert:true,//元の位置に戻る
    stop:function(e,ui){//座標値が表示される
        console.log('top: ' + (ui.offset.top - $('body').position().top));
        console.log('left: ' + (ui.offset.left - $('body').position().left));
        var b = $(this);
        console.log(b.width());//width内寸１９８がでる
        console.log(b.height());
        alert('top: ' + (ui.offset.top - $('body').position().top) + '\nleft: ' + (ui.offset.left - $('body').position().left));    
     }
    }) 

var start_img="";
var end_img ="";

$( ".img_area" ).on('dragstart',function(e){
console.log('start');
start_img = $(this);

});

//ロップ検知
$('.dd_area').on('drop',function(e){
	e.stopPropagation();
	e.preventDefault();
	
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
        var scale = Math.min(sw,sh);//Math＝javascript関数

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
       var offsetX = (thumbAreaWidth - rw) / 2;
        var offsetY = (thumbAreaHeight - rh) / 2;
        ctx.drawImage(image,-offsetX,-offsetY,rw,rh);
        
        callback(canvas.toDataURL());
        
        }
    image.src = dataUrl;
   
}


    

//ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
var page_num= 0;
changeContents(page_num);
var del_id = 0;



    $( "#delete_dialog" ).dialog({
      modal: true,
      autoOpen:false,
      resizable:false,
      height:"auto",
      width:"auto",
      fluid:true,
          
      buttons: {
        "キャンセル": function() {
          $( this ).dialog( "close" );
        },
        "削除する": function() {
            imgDelete(del_id);
            $( this ).dialog( "close" );
        }
      }
    });

    $( "#upload_dialog" ).dialog({
        modal: true,
        autoOpen:false,
        resizable:false,
        height:"auto",
        width:"auto",
        fluid:true,
            
    
      });

$('#delete_bt').on('click',function(e){//削除される
	console.log("削除");
    del_id = $('#modal_image').attr('value');
    console.log(del_id);
    
    var text = $('#pic_title').val();//ダイアログのpタグに入れて表示する
    $('#d_title').html(text);
    
    $('#delete_dialog').dialog("open");
    //imgDelete(del_id);
    
});

$('#save_title_bt').on('click',function(e){
	console.log("タイトル変更");
    var title =$('#pic_title').val();
    console.log(title);
    var img_id =$('#modal_image').attr('value');
    console.log(img_id);
    changeTitle(title,img_id);
});



//①アップロードファイルボタンクリック処理    ファイルアップロードでファイルが開く
$('#file_up_bt').on('click',function(e){
	$('#select_file').trigger('click');
	});
//②アップロードファイル選択処理   ファイル名出る
$('#select_file').on('change',function(e){
	//console.log(e);
	//alert("ファイルアップロード中");//chrome	でもこの方法なら表示される
	 $( "#upload_dialog" ).dialog("open");//firefox
	for(var i =0; i < e.target.files.length; i++){
		var file =e.target.files[i];
		console.log(file.name);
		uploadData(file,file.name)
		}
	changeContents(page_num);
	//alert("ファイルアップロード終了");//chrome	でもこの方法なら表示される
	$( "#upload_dialog" ).dialog("close");//firefox
});

//③画像アップロード ajax持ってくる編集１５６p参考
function uploadData(file,name){
	//ここからajax
	document.body.style.cursor = 'wait';//waitはマウスカーソルがくるくるしてる状態 ここからajax
	//FormDataオブジェクトを用意
	let code = document.getElementsByName("_token").item(0).value;
	let user_id = $("#u_id").html();
	var fd = new FormData();//変数fdにFormDataをセット
	fd.append("_token",code);
	fd.append("u_id",user_id);
	fd.append("name",name);
	fd.append("upFile",file);
	

	//XHRで送信
	$.ajax({
		url: "./save_pics",  //送信先
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


//サムネイルエリア読み込みファンクション④
function changeContents(num){
	document.body.style.cursor = 'wait';//waitはマウスカーソルがくるくるしてる状態 ここからajax
	//FormDataオブジェクトを用意
	let code = document.getElementsByName("_token").item(0).value;
	let user_id = $("#u_id").html();
	var fd = new FormData();//変数fdにFormDataをセット
	fd.append("_token",code);
	fd.append("u_id",user_id);
	fd.append("page_num",num);
	
	

	//XHRで送信
	$.ajax({
		url: "./get_pics",  //送信先
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
			$('#list_area').html(res);
		
			document.body.style.cursor = 'auto';
			//location.reload();

			});//ここまでajax
}

function openModal(num){
	document.body.style.cursor = 'wait';//waitはマウスカーソルがくるくるしてる状態 ここからajax
	//FormDataオブジェクトを用意
	let code = document.getElementsByName("_token").item(0).value;
	let user_id = $("#u_id").html();
	var fd = new FormData();//変数fdにFormDataをセット
	fd.append("_token",code);
	fd.append("image_id",num);

	
	

	//XHRで送信
	$.ajax({
		url: "./get_master",  //送信先
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
			$('#modal_image').attr('src',res[1]);
			$('#modal_image').attr('value',num);
			$('#pic_title').val(res[0]);
			$('#modal_bt').trigger('click'); 
			
			document.body.style.cursor = 'auto';
			//location.reload();

			});//ここまでajax
}


//画像削除ファンクション⑤
function imgDelete(num){
	document.body.style.cursor = 'wait';//waitはマウスカーソルがくるくるしてる状態 ここからajax
	//FormDataオブジェクトを用意
	let code = document.getElementsByName("_token").item(0).value;
	//let user_id = $("#u_id").html();
	var fd = new FormData();//変数fdにFormDataをセット
	fd.append("_token",code);
	fd.append("image_id",num);

	
	

	//XHRで送信
	$.ajax({
		url: "./delete_pic",  //送信先
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
			changeContents(page_num);
			document.body.style.cursor = 'auto';
			//location.reload();

			});//ここまでajax
}

	function changeTitle(title,img_id){
		//waitはマウスカーソルがくるくるしてる状態 ここからajax
			document.body.style.cursor = 'wait';
			//FormDataオブジェクトを用意
			let code = document.getElementsByName("_token").item(0).value;
			//let user_id = $("#u_id").html();
			var fd = new FormData();//変数fdにFormDataをセット
			fd.append("_token",code);
			fd.append("image_id",img_id);
			fd.append("title",title);
			
			

			//XHRで送信
			$.ajax({
				url: "./save_title",  //送信先
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
					changeContents(page_num);
					document.body.style.cursor = 'auto';
					location.reload();

					});
			//ここまでajax
			
		}


//ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー




</script>

</x-slot>
</x-base-layout>