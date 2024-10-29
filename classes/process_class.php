<?php
require_once(__DIR__ . '/../classes/Class.php');
$id = $_GET['id'];
if (isset($_POST['submit'])) {

    $data = new ClassTable();
    $class_name = $_POST['class_name'];


    if ($data->update($id, $class_name)) {
        echo "<script>alert('Update Successfully')</script>";
    } else {
        echo "<script>alert('Not Updated Class information')</script>";
    }

    header("Location: /eduremun/pages/class.php ");
} else {
    header("Location: /eduremun/pages/class.php ");
}