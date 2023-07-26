<?php
include_once 'db_op_image.php';

$rst = getDataAll();
$pics = "";
while ($row = $rst->fetch(PDO::FETCH_ASSOC)) { // イメージリスト
    $pics .= "<div class= 'col-2 col-md-2'>";
    $pics .= "<p class = 'mb-1'><img src = 'upload_thumbs/" . $row['thumb'] . "'
 class = 'w-100 get_pic' tag = '" . $row['name'] . "' value = " . $row['id'] . "></P>";
    $pics .= "<p class= 'mb-3'>" . $row['title'] . "</p>";
    $pics .= "</div>";
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="jquery-ui-1.13.2/jquery-ui.min.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">
<script src="js/jquery-3.6.3.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="jquery-ui-1.13.2/jquery-ui.min.js"></script>

<title>アップロードテスト</title>
<style type="text/css"></style>
</head>


<body>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="text-center mt-5">アップロードテスト</h1>
				<p class= "text-center"><a href="cropper_test.php">トリミング付きアップロード</a>
				
			</div>
		</div>

		<div class="row mt-5">
			<div class="col-md-6 mx-auto">
				<form method="post" action="upload.php"
					enctype="multipart/form-data">
					<!--enctype 入れないと添付ファイルのPHPが効かない  -->
					<p>ファイルアップロード</p>
					<div class="mb-3">
						<label for="title" class="form-label">タイトル</label> <input
							type="text" class="form-control" id="title" name="title" required>
					</div>
					<div class="mb-3">
						<label for="up_file" class="form-label">アップロードファイル</label> <input
							type="file" class="form-control" id="up_file" name="up_file"
							accept="image/* " required>
						<!--multiple 入れて、up_file[]を入れると配列になる  -->
					</div>
					<div class="mb-3">
						<button type="submit" class="btn btn-primary">アップロード</button>
						<!-- submitは送信 -->
						<button type="reset" class="btn btn-secondary">クリア</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<hr>
	<diV class="container-fluid">
		<div class="row">
			<div class="col-12">
				<h3 class="text-center mb-4">イメージリスト</h3>

			</div>
			<?php print $pics;?>
		</diV>
	</diV>

	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary" data-bs-toggle="modal"
		data-bs-target="#exampleModal" id="modal_bt" style="display: none;">
		Launch demo modal</button>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1"
		aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<img src="" class="w-100" id="master_pic">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary"
						data-bs-dismiss="modal">閉じる</button>
						<button type="button" class="btn btn-primary"
						data-bs-dismiss="modal" id= "trim_bt">トリミング</button>
					<button type="button" class="btn btn-danger"
						data-bs-dismiss="modal" id="delete_bt">削除ボタン</button>
				</div>
			</div>
		</div>
	</div>




	<script>
$('.get_pic').on('click',function(e){//イメージリストの画像をクリックした時に表示される
	console.log($(this).attr('tag'));
	var master_image="upload_images/" + $(this).attr('tag');
	var data_id = $(this).attr('value');
	$('#master_pic').attr('src',master_image);
	$('#delete_bt').attr('tag',data_id);
	$('#modal_bt').trigger("click");
});
$('#delete_bt').on('click',function(){
	console.log("削除ボタン");
	var del_id = ($(this).attr('tag'));
	//ここからajax
	document.body.style.cursor = 'wait';//waitはマウスカーソルがくるくるしてる状態//ここからajax
	//FormDataオブジェクトを用意
	var fd = new FormData();//変数fdにFormDataをセット
	fd.append("delete",del_id);
	

	//XHRで送信
	$.ajax({
		url: "image_delete.php",  //送信先
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
			//if(res !=""){
				//$('#message').html(res);
			//}
			document.body.style.cursor = 'auto';
			location.reload();

			});
});//ここまでajax

$('#trim_bt').on('click',function(e){
	console.log("trim");
	var src = $('#master_pic').attr('src');
			console.log(src);

			location.replace('cropper_test.php?src=' + src);
});

</script>
</body>
</html>