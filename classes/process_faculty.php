<?php
require_once(__DIR__ . '/../classes/FacultyTable.php');
$id = $_GET['id'];
if (isset($_POST['submit'])) {
    $data = new FacultyTable();

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contact = $_POST['contact'];
    $active = (bool)$_POST['active'];


    if ($data->update($id, $fullname, $email, $password, $contact, $active)) {
        echo "<script>alert('Update Successfully')</script>";
    } else {
        echo "<script>alert('Not Updated')</script>";
    }

    header("Location: /eduremun/pages/faculty.php ");
} else {
    header("Location: /eduremun/pages/faculty.php ");
}
