<?php

require_once(__DIR__ . '/../classes/User.php');

require_once(__DIR__ . '/../classes/update_user.php');
$userobj = new UsersTable();
$users = $userobj->readAll();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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
    <div class="container-fluid w-100">
        <h2 class="text-center mb-4">User Information</h2>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <!-- <th>ID</th> -->
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Full Name</th>
                    <th>Contact</th>
                    <th>Active</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example row data -->
                <?php if (!empty($users)): ?>
                <?php foreach ($users as $user): ?>
                <tr>
                    <!-- <td><?php echo htmlspecialchars($user['id']); ?></td> -->
                    <td><?php echo htmlspecialchars($user['username']); ?></td>
                    <td><?php echo htmlspecialchars($user['password']); ?></td> <!-- Masking the password -->
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td><?php echo htmlspecialchars($user['fullname']); ?></td>
                    <td><?php echo htmlspecialchars($user['contact']); ?></td>
                    <td><?php echo htmlspecialchars($user['active'] ? 'Active' : 'Inactive'); ?></td>
                    <td><?php echo htmlspecialchars(date("d-m-Y h:i A", strtotime($user['createdAt']))); ?></td>
                    <td><?php echo htmlspecialchars(date('d-m-Y h:i A', strtotime($user['updatedAt']))); ?></td>
                    <td>
                        <!-- Update Button -->
                        <a href="/eduremun/classes/update_user.php?id=<?php echo $user['id']; ?>"
                            class="btn btn-primary btn-sm">Update</a>


                    </td>

                    <td>
                        <!-- Delete Button -->
                        <a href="/eduremun/classes/delete_user.php?id=<?php echo $user['id']; ?>"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                    </td>

                </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr>
                    <td colspan="9">No users found.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>