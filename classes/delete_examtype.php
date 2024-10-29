<?php

require_once(__DIR__ . '/../classes/ExamTypeClass.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $exam = new ExamTypeTable();
    $deleted = $exam->delete($id);
    if ($deleted) {
        echo "<script>alert('Delete Successfully!');</script>";
        header('Location: /eduremun/pages/ExamType.php');
    } else {
        echo "<script>alert('Something went wrong!');</script>";
    }
} else {
    header('Location: /eduremun/pages/ExamType.php');
}
