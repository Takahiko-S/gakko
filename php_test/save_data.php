<?php
include_once 'db_operation.php';
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $yubin = $_POST['post'];
    $pref = $_POST['pref'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $tel = $_POST['tel'];
    $email = $_POST['mail'];
    $biko = $_POST['biko'];
    
    $save_id = add_data($name, $yubin, $pref, $city, $address, $tel, $email, $biko);
    print $save_id . "保存しました";
    return;
}

if(isset($_POST['delete'])){
    delete_data($_POST['delete']);
    return;
}

//ユーザー編集post
if(isset($_POST['u_name'])){
    $id = $_POST['d_id'];
    $name = $_POST['u_name'];
    $yubin = $_POST['u_post'];
    $pref = $_POST['u_pref'];
    $city = $_POST['u_city'];
    $address = $_POST['u_address'];
    $tel = $_POST['u_tel'];
    $email = $_POST['u_mail'];
    $biko = $_POST['u_biko'];
    change_data($id, $name, $yubin, $pref, $city, $address, $tel, $email, $biko);
    header("Location: user_toroku.php");
}



//Ajax トリミング アップロード
if(isset($_FILES['upload_image'])){
    print_r($_FILES);
}

?>