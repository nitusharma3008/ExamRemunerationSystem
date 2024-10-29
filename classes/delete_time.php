<?php
require_once(__DIR__ . '/../classes/TimeClass.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $timeObj = new TimeClass();
    $time = $timeObj->delete($id);

    if ($time) {
        echo "<script>alert('Delete Successfully!');</script>";
        header('Location: /eduremun/pages/time.php');
    } else {
    }
} else {
    header("Location: /eduremun/pages/time.php ");
}