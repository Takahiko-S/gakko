<?php
//データベーステーブル削除
include_once 'connect.php';       //外部ファイルの読み込み  

//テーブル削除
$sql = "DROP TABLE address_data;";

//結果をチェック
try {
    $set = $pdo->query($sql);
    print "テーブルを削除しました";
    
} catch (Exception $e) {
    print "テーブルを削除できませんでした<br>" . $e->getMessage();
}

//phpmyadmin のテーブルがきえてればOK















?>