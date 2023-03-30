<?php
include "../Controllers/deleteMultiple.contr.php";
if(isset($_POST["delete_id"])){
    $ids = $_POST["delete_id"];;
    $extract_ids = implode(",", $ids);
    $obj = new DeleteMulData();
    foreach ($ids as $id) {
        $obj->DeleteMulRecord($id);
    }
}
header("location: ../Views/Home/index.php");
?>