<?php
require_once(__DIR__ . '/../classes/FacultyData.php');

$id = $_GET['id'];
$facultyDataTable = new FacultyDataTable();
$record = $facultyDataTable->read($id);
