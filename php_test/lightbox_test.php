<?php
include_once 'db_op_image.php';

$rst = getDataAll();
$box_images = "";
while ($row = $rst->fetch(PDO::FETCH_ASSOC)){
    $box_images .="<div class= 'col-6 col-md-2 p-1'>";
    $box_images .="<a class='example-image-link'  href='upload_images/" . $row['name'] ."' data-lightbox='example-set' data-title='" . $row['title'] . "'><img class='example-image p-1 w-100' src='upload_thumbs/" .$row['thumb']."' alt='' ></a>";
    $box_images .="</div>";
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
<link rel="stylesheet" href="css/lightbox.min.css">
<link href="css/custom.css" rel="stylesheet">

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="js/jquery-3.6.3.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="jquery-ui-1.13.2/jquery-ui.min.js"></script>
<script src="js/lightbox.min.js"></script><!-- jquery入ってるからjqueryの文字消す -->
 
 
<title>LightBox2 Test</title>      <!--------------- タイトル------------------ -->
<style type ="text/css"></style>
</head>


<body>

	<div class="container">
		<div class="row">
			<div class="col-12">
					<h1  class="text-center mt-5">LightBox2 Test</h1>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-12 mb-5">
				<p>単独表示の場合</p>
				<div>
					<a class="example-image-link" href="images/top_slide/2500x1200_01.jpg" data-lightbox="example-1"><img class="example-image" src="images/001-120.jpg" alt="image-1" /></a>
					<a class="example-image-link" href="images/top_slide/2500x1200_02.jpg" data-lightbox="example-2" data-title="ここにキャプションを表示"><img class="example-image" src="images/002-120.jpg" alt="image-1" /></a> 
					<a class="example-image-link" href="images/top_slide/2500x1200_03.jpg" data-lightbox="example-3" data-title="ここにキャプションを表示"><img class="example-image" src="images/003-120.jpg" alt="image-1" /></a>
				</div>
			</div>

			<div class="col-12 mb-5">
				<p>グループ表示の場合</p>
			</div>
			<div>
					 <a class="example-image-link" href="images/top_slide/2500x1200_01.jpg"data-lightbox="example-set" data-title="ここにタイトル"><img class="example-image" src="images/001-120.jpg" alt="" /></a>
					 <a class="example-image-link" href="images/top_slide/2500x1200_02.jpg"data-lightbox="example-set" data-title="ここにタイトル"><img class="example-image" src="images/002-120.jpg" alt="" /></a> 
					 <a class="example-image-link" href="images/top_slide/2500x1200_03.jpg"data-lightbox="example-set" data-title="ここにタイトル"><img class="example-image" src="images/003-120.jpg" alt="" /></a> 
					 <a class="example-image-link" href="images/top_slide/2500x1200_04.jpg"data-lightbox="example-set" data-title="ここにタイトル"><img class="example-image" src="images/004-120.jpg" alt="" /></a>
			</div>
			
		</div>
		<div class=row>
			<div class=col-12>
				<p>動的生成表示</p>
			</div>
			<?php print $box_images;?>
		</div>
	</div>











	<script></script>

</body>
</html>
