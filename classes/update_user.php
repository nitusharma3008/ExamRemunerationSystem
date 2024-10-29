<?php
require_once(__DIR__ . '/../classes/User.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = new UsersTable();
    $result = $data->read($id);
    $username = $result['username'];
    $password = $result['password'];
    $email = $result['email'];
    $fullname = $result['fullname'];
    $contact = $result['contact'];
    $active = (bool)$result['active'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <?php
        include('../authetication/admin_dash.php');
        ?>
    <div class="container mt-5">
        <h2>User Form</h2>
        <form action="../pages/process_user.php" method="post">
            <div class="form-group">
                <label for="id">ID</label>
                <input type="number" class="form-control" id="id" name="id" placeholder="Enter ID"
                    value="<?php echo $id; ?>" required readonly>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username"
                    value="<?php echo $username; ?>" required readonly>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password"
                    value="<?php echo $password; ?>" required readonly>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email"
                    value="<?php echo $email; ?>" required>
            </div>
            <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter Full Name"
                    value="<?php echo $fullname; ?>" required>
            </div>
            <div class="form-group">
                <label for="contact">Contact</label>
                <input type="tel" class="form-control" id="contact" name="contact" placeholder="Enter Contact Number"
                    value="<?php echo $contact; ?>" required>
            </div>
            <div class="form-group">
                <label for="contact">Active</label>
                <select name="active" id="active" required>
                    <option value="1" <?php echo $active == 1 ? 'selected' : ''; ?>>Active</option>
                    <option value="0" <?php echo $active == 0 ? 'selected' : ''; ?>>InActive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html>
<?php
} else {
    // echo "UserId pass to edit user please!";
}
?>