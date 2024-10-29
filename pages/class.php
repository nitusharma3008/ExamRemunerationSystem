<?php
require_once(__DIR__ . '/../classes/Class.php');
// require_once(__DIR__ . '/../classes/update_user.php');
$userobj = new ClassTable();
$users = $userobj->readAll();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Table</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color: whitesmoke;
    }

    .container {
        background-color: white;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
    }
    </style>
</head>

<body>
    <?php

    include('C:/xampp/htdocs/eduremun/admin/includes/header.php');
    include('C:/xampp/htdocs/eduremun/admin/includes/topbar.php');
    //include('C:/xampp/htdocs/eduremun/admin/includes/sidebar.php');
    ?>


    <!-- <div class="container px-4" style="margin-left:230px ; margin-top:60px"> -->

    <div class="container mt-2 p-3 px-4">
        <h2 class="text-center mb-4">Available Classes</h2>
        <a href="/eduremun/classes/add_class.php" class="btn btn-primary mb-3">Add New Class</a>

        <table class=" table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <!-- <th> ID</th> -->
                    <th>Class Name</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($users as $class) {
                    echo "<tr>";
                    // echo "<td>" . htmlspecialchars($class['class_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($class['class_name']) . "</td>";
                    echo "<td>" . htmlspecialchars(date("d-m-Y h:i A", strtotime($class['createdAt']))) . "</td>";
                    echo "<td>" . htmlspecialchars(date("d-m-Y h:i A", strtotime($class['updatedAt']))) . "</td>";
                    echo "<td>";
                    echo "<a href='/eduremun/classes/update_class.php?id=" . htmlspecialchars($class['class_id']) . "' class='btn btn-warning btn-sm'>Update</a> ";
                    echo "<a href='/eduremun/classes/delete_class.php?id=" . htmlspecialchars($class['class_id']) . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this class?\");'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>


    <?php
    include('C:/xampp/htdocs/eduremun/admin/includes/footer.php');
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>