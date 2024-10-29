<?php
include('user_dashboard.php');
require_once "../classes/User.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $data = new UsersTable();
    $updateData = $data->read($id);
    $active = $updateData['active'];
}

?>

<div class="container mt-5  d-flex align-items-center justify-content-center pb-5">
    <div class="form-content w-100 shadow-lg p-5 mt-3 bg-white rounded ">
        <div class="form-title">
            <h3 class="text-center">Edit User Profile</h3>
        </div>
        <div class="form-main p-4">
            <form action="update_profile_form.php?id=<?php echo $updateData['id']; ?>" method="POST">
                <div class="form-group mb-3">
                    <label for="id">ID</label>
                    <input type="text" class="form-control" name="id" value="<?php echo $updateData['id']; ?>"
                        readonly />
                </div>
                <div class="form-group mb-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username"
                        value="<?php echo $updateData['username']; ?>" />
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" value="<?php echo $updateData['email']; ?>" />
                </div>
                <div class="form-group mb-3">
                    <label for="name">FullName</label>
                    <input type="text" class="form-control" name="fullname"
                        value="<?php echo $updateData['fullname']; ?>" />
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password"
                        value="<?php echo $updateData['password']; ?>" />
                </div>
                <div class="form-group mb-3">
                    <label for="contact">Contact No</label>
                    <input type="text" class="form-control" name="contact"
                        value="<?php echo $updateData['contact']; ?>" />
                </div>
                <div class="form-group mb-3">
                    <label for="active">Status : </label>
                    <select name="active" class="btn btn-light border-2" id="active" required>
                        <option value="1" <?php echo ($active == 1) ? 'selected' : ''; ?>>Active</option>
                        <option value="0" <?php echo ($active == 0) ? 'selected' : ''; ?>>Deactivate</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <button type="submit" name="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include('../footer.php');
?>

<?php

if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $password = $_POST['password'];
    $contact = $_POST['contact'];
    $active = (bool)$_POST['active'];

    $obj = new UsersTable();
    $updateUserData = $obj->update($id, $username, $email, $fullname, $password, $contact, $active);
    if ($updateData) {
        echo "<script>alert('Data updated successfully!');</script>";
        header('Location: manageuser.php');
    } else {
        echo "<script>alert('Error updating data, please try again later.');</script>";
        header('Location: manageuser.php');
    }
} else {
}


?>