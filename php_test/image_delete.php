<?php
// Ajaxのデータ削除
include_once 'db_op_image.php';

if(isset($_POST['delete'])){//postされたデータにdeleteがあれば処理される泣ければ処理しない
    $del_id = $_POST['delete'];
    delete_data($del_id);
}
return;



?>