<?php
require_once(__DIR__ . '/../classes/Class.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = new ClassTable();
    $result = $data->delete($id);

    if ($result) {
        echo "<script>alert('Delete Successfully!');</script>";
        header('Location: /eduremun/pages/class.php');
    } else {
    }
} else {
    header("Location: /eduremun/pages/class.php ");
}