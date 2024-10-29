<?php

require_once(__DIR__ . '/../classes/UserRoleMappingTable.php');

$id = $_GET['id'];
if (isset($_POST['submit'])) {
    $obj = new UserRoleMappingTable();
    $uid = $_POST['userid'];
    $rid = $_POST['roleid'];
    $active = (bool)$_POST['active'];

    $data = $obj->update($id, $uid, $rid, $active);

    if ($data) {
        echo "<script>alert('Update Successfully')</script>";
        header("Location: /eduremun/pages/userrolemapping.php ");
    } else {
        echo "<script>alert('Not Update ')</script>";
    }
} else {
    header("Location: /eduremun/pages/userrolemapping.php ");
}
