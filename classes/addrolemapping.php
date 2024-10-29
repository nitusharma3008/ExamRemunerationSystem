<?php
require_once(__DIR__ . '/../classes/UserRoleMappingTable.php');

if (isset($_POST['submit'])) {
    $user_id = $_POST['userid'];
    $role_id = $_POST['roleid'];
    $active_role = (bool)$_POST['active'];

    $obj = new UserRoleMappingTable();
    $data = $obj->create($user_id, $role_id, $active_role);

    if ($data) {
        echo "<script>alert('Records are submited');</script>";
        header('Location: /eduremun/pages/userrolemapping.php');
    } else {
        echo "<script>alert('Something went wrong!');</script>";
        header('Location: /eduremun/pages/userrolemapping.php');
    }
} else {

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Role Mapping Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <?php
        include('../authetication/admin_dash.php');
        ?>
    <div class="container mt-5">
        <h2>User Role Mapping Form</h2>
        <form action="addrolemapping.php" method="post">
            <div class="form-group">
                <label for="userid">User ID</label>
                <input type="text" class="form-control" id="id" name="userid" required>
            </div>
            <div class="form-group">
                <label for="userid">Role ID</label>
                <input type="text" class="form-control" id="username" name="roleid" required>
            </div>
            <div class="form-group">
                <label for="active">Active</label>
                <select name="active" id="active" required>
                    <option value="1" <?php echo $active == 1 ? 'selected' : ''; ?>>Active</option>
                    <option value="0" <?php echo $active == 0 ? 'selected' : ''; ?>>InActive</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html>
<?php

    // echo "UserId pass to edit user please!";
}
?>