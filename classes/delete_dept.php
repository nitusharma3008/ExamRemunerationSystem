<?php
require_once(__DIR__ . '/../classes/DepartmentTable.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = new DepartmentTable();
    $result = $data->delete($id);

    header("Location: /eduremun/pages/department.php ");
} else {
    header("Location: /eduremun/pages/department.php ");
}
