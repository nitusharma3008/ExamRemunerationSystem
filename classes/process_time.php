<?php
require_once(__DIR__ . '/../classes/TimeClass.php');
$id = $_GET['id'];
if (isset($_POST['submit'])) {
    $timeObj = new TimeClass();
    $time = $_POST['time'];


    $timing = $timeObj->update($id, $time);
    if ($timing) {
        echo "<script>alert('Update Successfully')</script>";
        header("Location: /eduremun/pages/time.php ");
    } else {
        echo "<script>alert('Not Updated')</script>";
    }
} else {
    header("Location: /eduremun/pages/time.php ");
}