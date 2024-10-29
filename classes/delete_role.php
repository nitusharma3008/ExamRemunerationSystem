<?php

require_once(__DIR__ . '/../classes/RoleTable.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = new RoleTable();
    $deleted = $data->delete($id);
    if ($deleted) {
        echo "<script>alert('Delete Successfully!');</script>";
        header('Location: /eduremun/pages/role.php');
    } else {
        echo "<script>alert('Something went wrong!');</script>";
    }
} else {
    header('Location: /eduremun/pages/role.php');
}
