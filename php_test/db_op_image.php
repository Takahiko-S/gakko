<?php
include_once 'connect.php';

//データ追加
function add_data($name,$thumb,$title){
    global $pdo;
    $sql = "INSERT INTO image_data(name,thumb,title )
 VALUES('$name' ,'$thumb' ,'$title' );";
    $pdo->query($sql);
    return $pdo ->lastInsertId('id');  //戻り値に追加したレコード番号を返す
    
    
    
}

// データ削除 id使用の場合（名前でも消せる？）
function delete_data($id)
{
    global $pdo;
    $sql = "DELETE FROM image_data WHERE id = $id;";
    return $pdo->query($sql); // 戻り値ない
}
// 全データ取得
function getDataAll()
{
    global $pdo;
    $sql = "SELECT * FROM image_data ORDER BY id DESC ;";
    return $pdo->query($sql); // 戻り値ない
}

//個別データ取得 id使用         ’id,name’と打てば指定できる
function getDataId($id)
{
    global $pdo;
    $sql = "SELECT * FROM image_data WHERE id = $id;";
    return $pdo->query($sql); // 戻り値ない
}


?>