<?php
require_once(__DIR__ . '/../classes/User.php');
require_once(__DIR__ . '/../classes/UserRoleMappingTable.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = new UsersTable();
    $userRoleMapping = new UserRoleMappingTable();
    $userRoleMapping->deleteByUserId($id);
    $result = $data->delete($id);

    header('Location: /eduremun/pages/users.php');
} else {
    header('Location: /eduremun/pages/users.php');
}
