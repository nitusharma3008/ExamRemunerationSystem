<?php
require_once(__DIR__ . '/../classes/ExamPatternClass.php');

if (isset($_POST['submit'])) {
    $pattern = $_POST['pattern'];
    $desc = $_POST['desc'];
    $obj = new ExamPatternClass();
    $data = $obj->create($pattern, $desc);

    if ($data) {
        echo "<script>alert('Record inserted successfully!');</script>";
        header('LOCATION: /eduremun/pages/exampattern.php');
    } else {
        echo "<script>alert('Failed to insert operation.'); </script>";
    }

    header('LOCATION: /eduremun/pages/exampattern.php');
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
            <form action="add_pattern.php" method="POST">
                <div class="form-group">
                    <label for="pattern">Pattern</label>
                    <input type="text" class="form-control" id="pattern" name="pattern" required>
                </div>
                <div class="form-group">
                    <label for="desc">Description</label>
                    <input type="text" class="form-control" id="desc" name="desc" required>
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