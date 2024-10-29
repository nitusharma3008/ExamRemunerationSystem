<?php
require_once(__DIR__ . '/../classes/UserRoleMappingTable.php');

if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    $obj = new UserRoleMappingTable();
    $result = $obj->delete($userId);
    if ($result) {
        echo "Deleted Successfully";
        header("Location: /eduremun/pages/userrolemapping.php ");
    } else {
        echo "Failed to delete record";
    }
} else {
    header("Location: /eduremun/pages/userrolemapping.php ");
}
