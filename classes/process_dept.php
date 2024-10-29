<?php
require_once(__DIR__ . '/../classes/DepartmentTable.php');
$id = $_GET['id'];
if (isset($_POST['submit'])) {
    $data = new DepartmentTable();
    $dept_name = $_POST['dept_name'];


    if ($data->update($id, $dept_name)) {
        echo "<script>alert('Update Successfully')</script>";
    } else {
        echo "<script>alert('Not Updated Department information')</script>";
    }

    header("Location: /eduremun/pages/department.php ");
} else {
    header("Location: /eduremun/pages/department.php ");
}
