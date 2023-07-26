<?php
//データベース接続用ファイル
$db_name = "test_db";   //データベース名
$username = "test_db";  //ユーザー名
$password = "P@ssw0rd#2023";//パスワード
$options = null;
$dsn = "mysql:host=localhost;dbname=$db_name;charset=utf8";

try {
    $pdo = new PDO($dsn,$username,$password,$options);
    $pdo ->query("SET NAMES utf8");
    
   // print "データベース接続完了";   //確認後コメント
} catch (Exception $e) {        //エラーを止めない
    exit("データベース接続失敗" . $e->getMessage());
}

//localhost/php_test/connect.phpをブラウザで検索する


?>