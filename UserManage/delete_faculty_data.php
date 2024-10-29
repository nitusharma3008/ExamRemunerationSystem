<?php
require_once(__DIR__ . '/../classes/FacultyData.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $obj = new FacultyDataTable();
    $deletedata = $obj->delete($id);
    if ($deletedata) {
        echo "<script>return alert('Record deleted successfully!');</script>";
        header('Location: Faculty_Data_Table.php');
    } else {
        echo "<div class='alert alert-danger'>Error: Record not found.</div>";
        header('Location: Faculty_Data_Table.php');
    }
} else {
    header('Location: Faculty_Data_Table.php');
}
