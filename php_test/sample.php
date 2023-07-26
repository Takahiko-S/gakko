<?php
// phpinfo();
$a = 1; // 数値型
$b = "1"; // 文字列型

$c = $a + $b;

print $c . "<br>";

$d = $a . $b;
print $d . "<br>";

// 配列
$week = array(
    '日',
    '月',
    '火',
    '水',
    '木',
    '金',
    '土'
);
$array1 = array(
    1,
    2,
    3,
    4,
    5
); // 単純配列（一次元 数値）
print_r($array1);
print "<br>";
$array2 = array(
    "メロン",
    "りんご",
    "オレンジ"
); // 単純配列(一次元 文字列）
print_r($array2);
print "<br>";

$array3 = array(
    array(
        1,
        2
    ),
    array(
        3,
        4,
        5
    ),
    array(
        6
    )
); // 二次元配列 数値
print_r($array3);
print "<br>";

// 連想配列
$array4 = array(
    'メロン' => 500,
    'りんご' => 150,
    'オレンジ' => 100
);
print_r($array4);
print "<br>";
print $array4['メロン'] . "<br>";

// 条件分岐

if ($a == $b) {
    print "同じ<br>";
} else {
    print "違う<br>";
}
if ($a === intval($b)) {
    print "同じ<br>";
} else {
    print "違う<br>";
}
$text = "今日は雪です";
print $text . "<br>";

if (strpos($text, "雨")) {
    print "ある<br>";
} else {
    print "ない<br>";
}

$e = 3;
if ($e < 3) {
    print "3未満<br>";
} elseif ($e >= 3 && $e < 10) {
    print "3から9<br>";
} else {
    print "10以上<br>";
}

// ループ処理
// 指定回数繰り返し
for ($i = 0; $i < 10; $i ++) {
    print $i . "<br>";
}

// 配列の個数分繰り返し
for ($i = 0; $i < count($array2); $i ++) {
    print $array2[$i] . "<br>";
}
// for ($i = 0;$i < 4; $i++){
// print $array2[$i] . "<br>";}

// 連想配列の繰り返し
$keys = array_keys($array4); // 別の配列として取り出す
                             // print_r($keys);

for ($i = 0; $i < count($keys); $i ++) {
    print $keys[$i] . "は" . $array4[$keys[$i]] . "円です<br>";
}

foreach ($array2 as $value) {
    print $value . "<br>";
}

// クラスの利用
$today = new DateTime(); // 日付
print $today->format('Y-m-d H:i:s') . "<br>";
print $today->format('Y年m月d日 H時:i分:s秒') . $week[$today->format('w')] . "<br>";

$today->modify('+1 day'); // 日付を一日増やす
print $today->format('Y-m-d H:i:s') . "<br>";
print $today->format('Y年m月d日 H時:i分:s秒') . getweek($today->format('w')) . " <br>";
print $today->format('w'); // 曜日の値
print "<br>";

// 日付関数
print date('Y年m月d日 H時:i分:s秒') . getweek(date('w')) . "<br>";
print date('w') . "<br>";

// 曜日取得 （０～６＝日～土）

// functionの中で新しく定義したら上のgetweekのdate('w')新しくつけた$numに変わって受け取る。
function getweek($num)
{
    switch ($num) {
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
    }
    ;
}
//while(条件式）｛
// ｝条件式を満たさなければ次に進むdowhileは一回実行する。
















/*
 * 変数には可用範囲がある
 * javascriptは可用範囲が広い
 * 関数の外の変数も使える
 *
 * ファンクションが集まったものがクラス
 * ->がは言っているのはクラスを利用している
 */


//phpmyadminのデータベースの設定
//ホーム押してユーザーアカウント新規作成
/*てきすとユーザー名test_db
ホストろーかる
ぱす
チェック一つ上の方 同様の、、、
実効

作った奴
操作
したから３番め
utr8mb4_unicode_ci




?>
