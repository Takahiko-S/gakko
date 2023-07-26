<?php
$title = "ここにページのタイトル";

$today = new DateTime();
$today_text = $today->format('Y年m月d日') . getweek($today->format('w'));

$f_array = array(// 連想配列
    'メロン' => 500,
    'りんご' => 150,
    'オレンジ' => 100,
    'バナナ' => 50,
    'パイナップル' => 600
);
$keys = array_keys($f_array);

$table = "<table class = 'table table-striped'>";
$table .="<thead><tr><th>番号</th><th>品名</th><th>価格</th></tr></thead>";



for ($i = 0; $i < count($keys); $i ++) {
    //print $keys[$i] . "は" . $f_array[$keys[$i]] . "円です<br>";
    $table .= "<tr>";
    $table .= "<td>" . $i + 1 ."</td>";
    $table .= "<td>" . $keys[$i] . "</td>";
    $table .= "<td>" . $f_array[$keys[$i]] . "</td>";
    $table .= "</tr>";
}
// $table .="<tr><td>". $i + 1 ."</td><td>" . $keys[$i] . "</td><td> . $f_array[$keys[$i]</td></tr>"この書き方もできる


$table .="</table>";







function getweek($num){
    switch ($num){
        case 0:
            return "日曜日";
        case 1:
            return "月曜日";
        case 2:
            return "火曜日";
        case 3:
            return "水曜日";
        case 4:
            return "木曜日";
        case 5:
            return "金曜日";
        case 6:
            return "土曜日";
            
            
            break;
            
            
    };
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

<title><?php print $title;?></title>
<style type="text/css"></style>
</head>


<body>
	<div class="container">
		<div class="row pt-5">
			<div class="col-12">
             <h1 class="text-center"><?php print $today_text;?></h1>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row pt-5">
			<div class="col-12">
                 <h1 class="text-center">
				果物価格表
				</h1>
			</div>
			<div class="col-md-6 mx-auto">
			 <?php print $table;?>
			</div>
		</div>
	</div>














	<script></script>

</body>
</html>