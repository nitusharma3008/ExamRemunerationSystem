<?php
require_once(__DIR__ . '/../classes/RoleTable.php');

$role = new RoleTable();
$roledata = $role->readAll();

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
        <h2 class="text-center mb-4">Role Table</h2>
        <a href="/eduremun/classes/add_role.php" class="btn btn-primary mb-3">Add New Role</a>

        <table class=" table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <!-- <th> ID</th> -->
                    <th>Role Name</th>
                    <th>Role Description</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($roledata as $rols) {
                    echo "<tr>";
                    // echo "<td>" . htmlspecialchars($rols['role_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($rols['role_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($rols['role_description']) . "</td>";
                    echo "<td>" . date("d-m-Y", strtotime($rols['createdAt'])) . "</td>";
                    echo "<td>" . date("d-m-Y", strtotime($rols['updatedAt'])) . "</td>";
                    echo "<td>";
                    echo "<a href='/eduremun/classes/update_role.php?id=" . htmlspecialchars($rols['role_id']) . "' class='btn btn-warning btn-sm'>Update</a> ";
                    echo "<a href='/eduremun/classes/delete_role.php?id=" . htmlspecialchars($rols['role_id']) . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this class?\");'>Delete</a>";
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