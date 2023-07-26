<?php
// ディレクトリ内のファイルの一覧取得
$img_dir = "images/top_slide";//画像のディレクトリ
$img_path = $img_dir . "/";//画像までのパス

$files = glob($img_path . "{*.jpg,*.JPG,*.png,*.PNG}",GLOB_BRACE);
  //  print $file . "<br>";//ディレクトリ内のファイル一覧取得できる
  $slide_data = "";
foreach ($files as $f){
    $slide_data .= "<div><img src='" . $f . "'></div>";
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
<link href="slick/slick.css" rel="stylesheet"><!-- slick -->
<link href="slick/slick-theme.css" rel="stylesheet" ><!-- slick -->


<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="js/jquery-3.6.3.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="jquery-ui-1.13.2/jquery-ui.min.js"></script>
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script><!-- slick -->
<script src="slick/slick.js"></script><!-- slick -->

<title>slick テスト</title>
<style type ="text/css"><!--slickのCSS-->
 * {
      box-sizing: border-box;
    }

    .slider {
        width: 90%;
        margin: 20px auto;
    }

    .slick-slide {
      margin: 0px 20px;
    }

    .slick-slide img {
      width: 100%;
    }

    .slick-prev:before,
    .slick-next:before {
      color: black;
    }


    .slick-slide {
      transition: all ease-in-out .3s;
      opacity: .2;
    }
    
    .slick-active {
      opacity: 1;
    }

    .slick-current {
      opacity: 1;
    }
</style>

<script>
$(document).on('ready', function(){
	$('.regular').slick({
		dots:true,
		infinite:true,
		slidesToShow:3,
		slidesToScroll:1
	});

	$('.center').slick({
	  centerMode: true,
	  centerPadding: '60px',
	  slidesToShow: 3,
	  responsive: [
	    {
	      breakpoint: 768,
	      settings: {
	        arrows: false,
	        centerMode: true,
	        centerPadding: '40px',
	        slidesToShow: 3
	      }
	    },
	    {
	      breakpoint: 480,
	      settings: {
	        arrows: false,
	        centerMode: true,
	        centerPadding: '40px',
	        slidesToShow: 1
	      }
	    }
	  ]
	});
});
</script>

</head>


<body>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="text-center mt-5">slick テスト</h1>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<p class="text-center mt-5">フルサイズ</p>
			</div>
			<div class="col-12 ">
				<section class="center slider">			
				<?php print $slide_data;?>
				</section>
			</div>
		</div>
	</div>





</body>






</html>