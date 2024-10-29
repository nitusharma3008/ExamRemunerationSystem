<?php
include('user_dashboard.php');
?>

<?php
//session_start();


// Database connection
$conn = new mysqli('localhost', 'root', '', 'enumration_db');

//echo $_SESSION['userId'];
$UserId = $_SESSION['userId'];
// Get logged-in user's ID from session

// Fetch user data from the database
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $UserId);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$stmt->close();
?>


<main>

    <div class="container p-5 mt-5 pt-5">

        <h3 class="text-center mt-4 mb-3">Manage Your Profile</h3>
        <table class="table  table-strpied" cellpadding="10">
            <thead class="table-dark">
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Full Name</th>
                    <th>Password</th>
                    <th>Contact</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $user["username"]; ?></td>
                    <td><?php echo $user['password']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['fullname']; ?></td>
                    <td><?php echo $user['contact']; ?></td>
                    <td><?php echo ($user['active'] == 1) ? "Active" : "Deactivate"; ?></td>
                    <td>
                        <!-- Update and Delete Buttons -->
                        <a href="update_profile_form.php?id=<?php echo $user['id']; ?>" class="btn btn-success">Edit</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</main>

<?php

include('../footer.php');
