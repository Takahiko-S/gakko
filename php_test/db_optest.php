<?php
//データベースファンクション動作確認用
include_once 'db_operation.php';
//データ追加テスト
$name ="テスト太郎";
$yubin ="950-0123";
$pref ="新潟県";
$city ="新潟市中央区近江";
$address ="1-1-1";
$tel ="025-123-4567";
$email ="taro@test.com";
$biko ="登録テスト";

$id = add_data($name, $yubin, $pref, $city, $address, $tel, $email, $biko);
print $id . "を追加しました";



//レコード削除テスト
/*
$res = delete_data(1);
print $res;
*/
/*
//データ編集テスト
$name ="テスト太郎";
$yubin ="950-0123";
$pref ="新潟県";
$city ="新潟市中央区女池";
$address ="2-2-2";
$tel ="025-123-4567";
$email ="taro@test.com";
$biko ="変更テスト";
$id= 1;

$res = change_data($id,$name, $yubin, $pref, $city, $address, $tel, $email, $biko);
print_r($res);


//ファイル分けてやってみる
*/
/*全データ取得テスト $rowにレコードの一行目が配列として入る
$res = getDataAll();
while($row = $res->fetch(PDO::FETCH_ASSOC)){
    print_r($row);
    print "<br>";
    
}
*/


//個別データ取得テスト
$id = 1;
$res = getDataId($id);
while($row = $res->fetch(PDO::FETCH_ASSOC)){
    print_r($row);
    print "<br>";

}
?>