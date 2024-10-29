<?php
require_once(__DIR__ . '/../classes/SemClass.php');

if (isset($_POST['submit'])) {
    $sem = $_POST['sem'];

    $semobj = new SemClass();
    $data = $semobj->create($sem);

    if ($data) {
        echo "<script>alert('Exam type inserted successfully!');</script>";
        header('LOCATION: /eduremun/pages/sem.php');
    } else {
        echo "<script>alert('Failed to insert operation.'); </script>";
    }
} else {


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Semester</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Available Semester</h2>
        <form action="add_sem.php" method="POST">
            <div class="form-group">
                <label for="sem">Semester</label>
                <input type="text" class="form-control" id="sem" name="sem" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- Bootstrap JS (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<?php

}
?>