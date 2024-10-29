<?php
require_once(__DIR__ . '/../classes/UserRoleMappingTable.php');

$role = new UserRoleMappingTable();
$roledata = $role->readAll();

$userRoleMappingTable = new UserRoleMappingTable();
$userRoles = $userRoleMappingTable->fetchUserRoleMappings();

// foreach ($userRoles as $userRole) {
//     echo "ID: " . $userRole['id'] . ", Username: " . $userRole['username'] . ", Role: " . $userRole['role_name'] . ", Active: " . $userRole['active'] . "<br>";
// }


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Role Mapping</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
    include('../authetication/admin_dash.php');
    ?>

    <div class="container mt-4">
        <!-- <h2>User Role Mapping</h2> -->
        <!-- <a href="/eduremun/classes/addrolemapping.php" class="btn btn-primary mb-3">Add New Role</a> -->

        <table class=" table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <!-- <th>ID</th> -->
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Role Name</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($userRoles as $userRole) {
                    echo "<tr>";
                    // echo "<td>" . htmlspecialchars($rols['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($userRole['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($userRole['username']) . "</td>";
                    echo "<td>" . htmlspecialchars($userRole['role_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($userRole['active'] == 1 ? 'Active' : 'Inactive') . "</td>";
                    echo "<td>";
                    echo "<a href='/eduremun/classes/update_rolemapping.php?id=" . htmlspecialchars($userRole['id']) . "' class='btn btn-warning btn-sm'>Update</a> ";
                    echo "<a href='/eduremun/classes/delete_rolemapping.php?id=" . htmlspecialchars($userRole['id']) . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this class?\");'>Delete</a>";
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