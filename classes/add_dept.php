<?php
require_once(__DIR__ . '/../classes/DepartmentTable.php');

if (isset($_POST['submit'])) {
    $dept_name = $_POST['dept_name'];
    $dept_obj = new DepartmentTable();
    $dept_data = $dept_obj->create($dept_name);

    if ($dept_data) {
        echo "<script>alert('Department inserted successfully!');</script>";
        header('LOCATION: /eduremun/pages/department.php');
    } else {
        echo "<script>alert('Failed to insert department.'); </script>";
    }

    header('LOCATION: /eduremun/pages/department.php');
} else {


?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Department Form</title>
        <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="container mt-5">
            <h2>Department Form</h2>
            <form action="add_dept.php" method="POST">
                <div class="form-group">
                    <label for="class_name">Department Name</label>
                    <input type="text" class="form-control" id="dept_name" name="dept_name" placeholder="Enter dept Name"
                        required>
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