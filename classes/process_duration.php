<?php
require_once(__DIR__ . '/../classes/DurationClass.php');
$id = $_GET['id'];
if (isset($_POST['submit'])) {
    $data = new  DurationTable();
    $duration = $_POST['duration'];


    if ($data->update($id, $duration)) {
        echo "<script>alert('Update Successfully')</script>";
        header("Location: /eduremun/pages/duration.php ");
    } else {
        echo "<script>alert('Not Updated')</script>";
    }
} else {
    header("Location: /eduremun/pages/duration.php ");
}
