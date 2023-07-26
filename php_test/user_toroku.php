<?php
include_once 'db_operation.php';
// print_r($_POST);//

// postされた時の処理 issetは存在をチェックしてくれる関数nameがあるか確認してる
/*if (isset($_POST['u_name'])) {
    $name = $_POST['u_name'];
    $yubin = $_POST['u_post'];
    $pref = $_POST['u_pref'];
    $city = $_POST['u_city'];
    $address = $_POST['u_address'];
    $tel = $_POST['u_tel'];
    $email = $_POST['u_mail'];
    $biko = $_POST['u_biko'];*/

   // $save_id = add_data($name, $yubin, $pref, $city, $address, $tel, $email, $biko);
    // print $save_id . "保存しました";
//}
// データ表示テーブル組み立て
$rst = getDataAll();
$data_array = array(); // 配列初期化
while ($row = $rst->fetch(PDO::FETCH_ASSOC)) {
    $data_array[] = $row; // 配列を０から自動で生成
                          // array_push($data_array,$row);//配列に値を追加するやり方 あらかじめ配列を作っておく必要がある
}
// print_r($data_array);

$table = "<table class= 'table table-striped'>"; // テーブルができる。
$table .= "<thead>";
$table .= "<tr>";
$table .= "<th>ID</th>";
$table .= "<th>名前</th>";
$table .= "<th>メールアドレス</th>";
$table .= "<th>郵便番号</th>";
$table .= "<th>都道府県</th>";
$table .= "<th>市区町村</th>";
$table .= "<th>番地・建物</th>";
$table .= "<th>電話番号</th>";
$table .= "<th>備考</th>";
$table .= "<th>操作</th>";
$table .= "</tr>";
$table .= "</thead>";

foreach ($data_array as $data) { // テーブルにデータが表示される
    $table .= "<tr>";
    $table .= "<td>" . $data['id'] . "</td>";
    $table .= "<td>" . $data['name'] . "</td>";
    $table .= "<td>" . $data['email'] . "</td>";
    $table .= "<td>" . $data['yubin'] . "</td>";
    $table .= "<td>" . $data['pref'] . "</td>";
    $table .= "<td>" . $data['city'] . "</td>";
    $table .= "<td>" . $data['address'] . "</td>";
    $table .= "<td>" . $data['tel'] . "</td>";
    $table .= "<td>" . $data['biko'] . "</td>";
    $table .= "<td>";
    $table .= "<button class= 'btn btn-danger btn-sm delete_bt' tag= '" . $data['id'] . "'>削除</button>&nbsp;"; //
    $table .= "<button class= 'btn btn-info btn-sm edit_bt' tag= '" . $data['id'] . "'>編集</button>";

    $table . "</td>";
    $table .= "</tr>";
}

$table .= "</table>";
// &nbsp = 半角スペース
// &copy = ©

// $("#save_bt") ID
// $(".save_bt") クラス
// $("#u_name")
// javascriptならdocument.getElementById('app'); まで書かなきゃダメだけど jqueryなら$("#app")
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

<title>ユーザー登録</title>
<style type="text/css"></style>
</head>


<body>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="text-center mt-5">ユーザー登録</h1>
			</div>
		</div>

		<div class="row p-3 bg-light">
			<div class="col-sm-6 mx-auto">
				<script src="https://yubinbango.github.io/yubinbango/yubinbango.js"
					charset="UTF-8"></script>

				<form method="post" action="" class="row h-adr">

					<span class="p-country-name" style="display: none;">Japan</span>
					<div class="mb-3">
						<label for="u_name" class="form-label">名前</label> <input
							type="text" class="form-control" id="u_name" name="u_name"
							required>
					</div>
					<div class="mb-3">
						<label for="u_mail" class="form-label">メールアドレス</label> <input
							type="text" class="form-control" id="u_mail" name="u_mail"
							required>
					</div>

					<div class="mb-3">
						<label for="u_post" class="form-label">郵便番号</label> <input
							type="text" class="form-control p-postal-code" id="u_post"
							name="u_post" required>
					</div>

					<div class="mb-3">
						<label for="u_pref" class="form-label">都道府県</label> <input
							type="tbase.htmlext" class="form-control p-region " id="u_pref"
							name="u_pref" required>
					</div>

					<div class="mb-3">
						<label for="u_city" class="form-label">市区町村</label> <input
							type="text" class="form-control p-locality p-street-address"
							id="u_city" name="u_city" required>
					</div>
					<div class="mb-3">
						<label for="u_address" class="form-label">番地・建物</label> <input
							type="text" class="form-control " id="u_address" name="u_address">
					</div>
					<div class="mb-3">
						<label for="u_tel" class="form-label">TEL</label> <input
							type="text" class="form-control" id="u_tel" name="u_tel" required>
					</div>
					<div class="mb-3">
						<label for="u_biko" class="form-label">備考</label> <input
							type="text" class="form-control" id="u_biko" name="u_biko">
					</div>
					<div class="mb-3">
						<button type="reset" class="btn btn-secondary">リセット</button>
						<button type="button" class="btn btn-primary" id="save_bt">登録</button>

					</div>

				</form>
				<p class="text-danger" id="message">&nbsp;</p>

			</div>
		</div>
	</div>









	<div class="container-fluid">
		<div class="row mt-5">
			<div class="col-12">
				<h3 class="text-center">登録リスト</h3>
			</div>
			<div class="col-12">
							<?php print $table;?>
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
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">送信内容の確認</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<table class="table table-striped">
						<tr>
							<td>名前 ：</td>
							<td id="d_name"></td>
						</tr>
						<tr>
							<td>メールアドレス ：</td>
							<td id="d_mail"></td>
						</tr>
						<tr>
							<td>郵便番号 ：</td>
							<td id="d_post"></td>
						</tr>
						<tr>
							<td>都道府県 ：</td>
							<td id="d_pref"></td>
						</tr>
						<tr>
							<td>市区町村 ：</td>
							<td id="d_city"></td>
						</tr>
						<tr>
							<td>番地・建物 ：</td>
							<td id="d_address"></td>
						</tr>
						<tr>
							<td>TEL ：</td>
							<td id="d_tel"></td>
						</tr>
						<tr>
							<td>備考 ：</td>
							<td id="d_biko"></td>
						</tr>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary"
						data-bs-dismiss="modal">中止</button>
					<button type="button" class="btn btn-primary"
						data-bs-dismiss="modal" id="post_bt">この内容で送信する</button>
				</div>
			</div>
		</div>
	</div>

	<script>
	$('.delete_bt').on('click',function(e){//この書き方が大事暗記する ,//delete_btが参照される
        console.log("delete");//jsはコンソールでしか確認ができない
        console.log($(this).attr('tag'));//ここにhtmlのtagひもづく。
        dataDelete($(this).attr('tag'));
		});

	//編集ボタン
	$('.edit_bt').on('click',function(e){
		console.log("edit")
		console.log($(this).attr('tag'));
		location.replace('user_edit.php?d_id=' + $(this).attr('tag'));
	});

	$('#save_bt').on('click',function(e){//確認画面表示  登録ボタンのidと結びつけ
	//変数の初期化
	 var name = $('#u_name').val();//変数nameに値を入れた
	 var mail = $('#u_mail').val();
	 var post = $('#u_post').val();
	 var pref = $('#u_pref').val();
	 var city = $('#u_city').val();
	 var address = $('#u_address').val();
	 var tel = $('#u_tel').val();
	 var biko = $('#u_biko').val();
     //メッセージ表示エリアリセット
	 $('#message').html("&nbsp;");//エラーメッセージの表示 htmlに&nbspとひもづく
	//入力チェック
	 if(name ==""){
		 $('#message').html("名前を入力してください");
		 return;
	 }
	 if(mail ==""){
		 $('#message').html("メールアドレスを入力してください");
		 return;
	 }
	 if(post ==""){
		 $('#message').html("郵便番号を入力してください");
		 return;
	 }
	 if(pref ==""){
		 $('#message').html("都道府県を入力してください");
		 return;
	 }
	 if(city ==""){
		 $('#message').html("市区町村を入力してください");
		 return;
	 }
	 if(address ==""){
		 $('#message').html("建物・番地を入力してください");
		 return;
	 }
	 if(tel ==""){
		 $('#message').html("電話番号を入力してください");
		 return;
	 }
	//モーダルにデータをセット
	$('#d_name').html(name);
	$('#d_mail').html(mail);
	$('#d_post').html(post);
	$('#d_pref').html(pref);
	$('#d_city').html(city);
	$('#d_address').html(address);
	$('#d_tel').html(tel);
	$('#d_biko').html(biko);
	
	//モーダル表示 
		$('#modal_bt').trigger('click');//クリックが引き金
		});
	$('#post_bt').on('click',function(e){
		console.log("送信");
		dataSend();
		var fd = new FormData();//変数fdにFormDataをセット
		fd.append("name",name);
		fd.append("mail",mail);
		fd.append("post",post);
		fd.append("pref",pref);
		fd.append("city",city);
		fd.append("address",address);
		fd.append("tel",tel);
		fd.append("biko",biko);
		
		});


	
//Ajaxデータ送信ファンクション
	function dataSend(){
		var name = $('#u_name').val();//上からコピーして持ってくる
		 var mail = $('#u_mail').val();
		 var post = $('#u_post').val();
		 var pref = $('#u_pref').val();
		 var city = $('#u_city').val();
		 var address = $('#u_address').val();
		 var tel = $('#u_tel').val();
		 var biko = $('#u_biko').val();

		//ここからAjax サーバーに送るデータ 他のファイルに流用して使いたいときはここから下のdoneまでコピーする
		document.body.style.cursor = 'wait';//waitはマウスカーソルがくるくるしてる状態
		//FormDataオブジェクトを用意
		var fd = new FormData();//変数fdにFormDataをセット
		fd.append("name",name);
		fd.append("mail",mail);
		fd.append("post",post);
		fd.append("pref",pref);
		fd.append("city",city);
		fd.append("address",address);
		fd.append("tel",tel);
		fd.append("biko",biko);

		//XHRで送信
		$.ajax({
			url: "save_data.php",  //送信先
			type:"post",//getでも送れる
			data:fd,
			mode:"multiple",
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
				//if(res !=""){
					//$('#message').html(res);
				//}
				document.body.style.cursor = 'auto';
				location.reload();

				});
		//ここまでAjax

}


		
		//Ajaxデータ削除ファンクション
		function dataDelete(d_id){
			

			//ここからAjax サーバーに送るデータ 他のファイルに流用して使いたいときはここから下のdoneまでコピーする
			document.body.style.cursor = 'wait';//waitはマウスカーソルがくるくるしてる状態
			//FormDataオブジェクトを用意
			var fd = new FormData();//変数fdにFormDataをセット
			fd.append("delete",d_id);
	

			//XHRで送信
			$.ajax({
				url: "save_data.php",  //送信先
				type:"post",//getでも送れる
				data:fd,
				mode:"multiple",
				async:true,//   非同期true  同期処理の場合false 処理が重いのを同期するとフリーズする
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
			
					console.log(res);
					
					document.body.style.cursor = 'auto';
					location.reload();

					});
		}	



	
	</script>

</body>
</html>