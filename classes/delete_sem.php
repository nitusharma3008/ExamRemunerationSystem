<?php

require_once(__DIR__ . '/../classes/SemClass.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = new SemClass();
    $deleted = $data->delete($id);
    if ($deleted) {
        echo "<script>alert('Delete Successfully!');</script>";
        header('Location: /eduremun/pages/sem.php');
    } else {
        echo "<script>alert('Something went wrong!');</script>";
    }
} else {
    header('Location: /eduremun/pages/sem.php');
}
