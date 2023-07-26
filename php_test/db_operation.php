<?php
//データベース操作用関数

include_once 'connect.php';

//データ追加
function add_data($name ,$yubin ,$pref ,$city ,$address ,$tel ,$email,$biko ){
    global $pdo;
   $sql = "INSERT INTO address_data(name ,yubin ,pref ,city ,address ,tel ,email,biko )
 VALUES('$name' ,'$yubin' ,'$pref' ,'$city' ,'$address' ,'$tel' ,'$email','$biko');";
   $pdo->query($sql);
   return $pdo ->lastInsertId('id');  //戻り値に追加したレコード番号を返す
   
   
    
}

    // データ削除 id使用の場合（名前でも消せる？）
function delete_data($id)
{
    global $pdo;
    $sql = "DELETE FROM address_data WHERE id = $id;";
    return $pdo->query($sql); // 戻り値ない
}


//データ編集
function change_data($id,$name ,$yubin ,$pref ,$city ,$address ,$tel ,$email,$biko ){
    global $pdo;
    $sql = "UPDATE address_data SET
name ='$name',
yubin='$yubin',
pref ='$pref',
city ='$city',
address='$address',
tel='$tel' ,
email='$email',
biko ='$biko' WHERE id=$id;";
    
    return  $pdo->query($sql);
       
}


// 全データ取得
function getDataAll()
{
    global $pdo;
    $sql = "SELECT * FROM address_data ORDER BY id DESC ;";
    return $pdo->query($sql); // 戻り値ない
}

//個別データ取得 id使用         ’id,name’と打てば指定できる
function getDataId($id)
{
    global $pdo;
    $sql = "SELECT * FROM address_data WHERE id = $id;";
    return $pdo->query($sql); // 戻り値ない
}




?>