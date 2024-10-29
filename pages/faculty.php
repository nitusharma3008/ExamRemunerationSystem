<?php
require_once(__DIR__ . '/../classes/FacultyTable.php');

$facultyobj = new FacultyTable();
$facultyData = $facultyobj->readAll();


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
    ?>

    <div class="container mt-2 p-3 px-4">
        <h2 class="text-center mb-4">Available Faculty</h2>
        <a href="/eduremun/classes/add_faculty.php" class="btn btn-primary mb-3">Add New Faculty</a>

        <table class=" table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <!-- <th>ID</th> -->
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Contact</th>
                    <th>Active</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($facultyData as $faculty) {
                    echo "<tr>";
                    // echo "<td>" . htmlspecialchars($faculty['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($faculty['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($faculty['email']) . "</td>";
                    echo "<td>" . "********" . "</td>";
                    echo "<td>" . htmlspecialchars($faculty['contact']) . "</td>";
                    echo "<td>" . htmlspecialchars($faculty['active'] ? 'Active' : 'Inactive') . "</td>";
                    echo "<td>" . date("d-m-Y", strtotime($faculty['createdAt'])) . "</td>";
                    echo "<td>" . date("d-m-Y", strtotime($faculty['updatedAt'])) . "</td>";
                    echo "<td>";
                    echo "<a href='/eduremun/classes/update_faculty.php?id=" . htmlspecialchars($faculty['id']) . "' class='btn btn-warning btn-sm'>Update</a> ";
                    echo "<a href='/eduremun/classes/delete_faculty.php?id=" . htmlspecialchars($faculty['id']) . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this class?\");'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>