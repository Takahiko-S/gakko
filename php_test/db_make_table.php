<?php
//データベーステーブル作成
include_once 'connect.php';       //外部ファイルの読み込み  

//テーブル生成
$sql = "CREATE TABLE address_data (id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
name TEXT,yubin TEXT,pref TEXT,city TEXT,address TEXT,tel TEXT,email TEXT,
biko TEXT,time_stamp TIMESTAMP);";   //アドレスデータというテーブルを生成する nullは許可しない

//結果をチェック
try {
$set = $pdo->query($sql);
    print "テーブルを作成しました";
    
} catch (Exception $e) {
    print "テーブルを作成できませんでした<br>" . $e->getMessage();
}


//phpmyadmin にテーブルができてればOK
//ブラウザで検索するとどうさされる

























?>