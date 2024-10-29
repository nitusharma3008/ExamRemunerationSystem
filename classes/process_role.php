<?php
require_once(__DIR__ . '/../classes/RoleTable.php');
$id = $_GET['id'];
if (isset($_POST['submit'])) {
    $roleobj = new RoleTable();
    $rolename = $_POST['rolename'];
    $roledesc = $_POST['roledesc'];

    $data = $roleobj->update($id, $rolename, $roledesc);
    if ($data) {
        echo "<script>alert('Update Successfully')</script>";
        header("Location: /eduremun/pages/role.php ");
    } else {
        echo "<script>alert('Not Updated')</script>";
    }
} else {
    header("Location: /eduremun/pages/role.php ");
}
