<?php
require_once(__DIR__ . '/../classes/ExamPatternClass.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $obj = new ExamPatternClass();
    $deleted = $obj->delete($id);

    if ($deleted) {
        echo "<script>alert('Delete Successfully!');</script>";
        header('Location: /eduremun/pages/exampattern.php');
    } else {
        header('Location: /eduremun/pages/exampattern.php');
    }
} else {
    header('Location: /eduremun/pages/exampattern.php');
}
