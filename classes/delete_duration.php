<?php
require_once(__DIR__ . '/../classes/DurationClass.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = new DurationTable();
    $result = $data->delete($id);

    header("Location: /eduremun/pages/duration.php ");
} else {
    header("Location: /eduremun/pages/duration.php ");
}
