<?php
include_once 'db_operation.php';

if(isset($_GET['d_id'])){
    $u_id = $_GET['d_id'];
    
    
    
    // データ表示テーブル組み立て
    $rst = getDataId($u_id);
    $row = $rst->fetch(PDO::FETCH_ASSOC);
    
    //print_r($row);
    
    
}else{
    header("Location: user_toroku.php");
}
if($row == "" || $row == null){
    header("Location: user_toroku.php");
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

<title>ユーザー編集</title>
<style type="text/css"></style>
</head>


<body>

	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="text-center mt-5">ユーザー編集</h1>
			</div>
		</div>

		<div class="row p-3 bg-light">
			<div class="col-sm-6 mx-auto">
				<script src="https://yubinbango.github.io/yubinbango/yubinbango.js"
					charset="UTF-8"></script>

				<form method="post" action="save_data.php" class="row h-adr">

					<span class="p-country-name" style="display: none;">Japan</span>
					<input type = "hidden" name = "d_id" value="<?php print $u_id;?>">
					<div class="mb-3">
						<label for="u_name" class="form-label">名前</label> <input
							type="text" class="form-control" id="u_name" name="u_name"
							required value="<?php print $row['name'];?>">
					</div>
					<div class="mb-3">
						<label for="u_mail" class="form-label">メールアドレス</label> <input
							type="text" class="form-control" id="u_mail" name="u_mail"
							required value="<?php print $row['email'];?>">
					</div>

					<div class="mb-3">
						<label for="u_post" class="form-label">郵便番号</label> <input
							type="text" class="form-control p-postal-code" id="u_post"
							name="u_post" required value="<?php print $row['yubin'];?>">
					</div>

					<div class="mb-3">
						<label for="u_pref" class="form-label">都道府県</label> <input
							type="text" class="form-control p-region " id="u_pref"
							name="u_pref" required value="<?php print $row['pref'];?>">
					</div>

					<div class="mb-3">
						<label for="u_city" class="form-label">市区町村</label> <input
							type="text" class="form-control p-locality p-street-address"
							id="u_city" name="u_city" required value="<?php print $row['city'];?>">
					</div>
					<div class="mb-3">
						<label for="u_address" class="form-label">番地・建物</label> <input
							type="text" class="form-control " id="u_address" name="u_address" required value="<?php print $row['address'];?>">
					</div>
					<div class="mb-3">
						<label for="u_tel" class="form-label">TEL</label> <input
							type="text" class="form-control" id="u_tel" name="u_tel" required value="<?php print $row['tel'];?>">
					</div>
					<div class="mb-3">
						<label for="u_biko" class="form-label">備考</label> <input
							type="text" class="form-control" id="u_biko" name="u_biko" value="<?php print $row['biko'];?>">
					</div>
					<div class="mb-3">
						<a href="user_toroku.php" type="reset" class="btn btn-secondary">キャンセル</a>
						<button type="submit" class="btn btn-primary" id="save_bt">更新</button>

					</div>

				</form>
				<p class="text-danger" id="message">&nbsp;</p>

			</div>
		</div>
	</div>









	

	<script>
	
	
	</script>

</body>
</html>