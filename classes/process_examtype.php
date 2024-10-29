<?php
require_once(__DIR__ . '/../classes/ExamTypeClass.php');
$id = $_GET['id'];
if (isset($_POST['submit'])) {
    $exam = new ExamTypeTable();
    $type = $_POST['examtypename'];
    $amount = $_POST['amount'];
    $desc = $_POST['desc'];


    if ($exam->update($id, $type, $amount, $desc)) {
        echo "<script>alert('Update Successfully')</script>";
        header("Location: /eduremun/pages/ExamType.php ");
    } else {
        echo "<script>alert('Not Updated')</script>";
    }
} else {
    header("Location: /eduremun/pages/ExamType.php ");
}
