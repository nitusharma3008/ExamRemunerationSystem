<?php
require_once(__DIR__ . '/../classes/SemClass.php');
$id = $_GET['id'];
if (isset($_POST['submit'])) {
    $semobj = new SemClass();
    $sem = $_POST['sem'];


    $data = $semobj->update($id, $sem);
    if ($data) {
        echo "<script>alert('Update Successfully')</script>";
        header("Location: /eduremun/pages/sem.php ");
    } else {
        echo "<script>alert('Not Updated')</script>";
    }
} else {
    header("Location: /eduremun/pages/sem.php ");
}
