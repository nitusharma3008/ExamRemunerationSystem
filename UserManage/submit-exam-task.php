<?php
session_start();
require_once(__DIR__ . '/../classes/FacultyData.php');
$createdBy = $_SESSION['userId'];

$facultidata = new FacultyDataTable();



if (isset($_POST['class_id']) && isset($_POST['duration_id']) && isset($_POST['examType_id']) && isset($_POST['examPattern_id']) && isset($_POST['department_id']) && isset($_POST['time_id'])) {
    $class_id = $_POST['class_id'];
    $duration_id = $_POST['duration_id'];
    $examType_id = $_POST['examType_id'];
    $examPattern_id = $_POST['examPattern_id'];
    $department_id = $_POST['department_id'];
    $time_id = $_POST['time_id'];



    $facultidata->create($createdBy, $class_id, $duration_id, $examType_id, $examPattern_id, $department_id, $time_id);
    header("Location: Faculty_Data_Table.php");
}
