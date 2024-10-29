<?php
require_once(__DIR__ . '/../classes/ExamPatternClass.php');
$id = $_GET['id'];
if (isset($_POST['submit'])) {
    $obj = new ExamPatternClass();
    $type = $_POST['pattern'];
    $desc = $_POST['desc'];


    if ($obj->update($id, $type, $desc)) {
        echo "<script>alert('Update Successfully')</script>";
        header("Location: /eduremun/pages/exampattern.php ");
    } else {
        echo "<script>alert('Not Updated')</script>";
    }
} else {
    header("Location: /eduremun/pages/exampattern.php ");
}
