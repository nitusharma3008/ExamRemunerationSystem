<?php
require_once(__DIR__ . '/../classes/UserRoleMappingTable.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $obj = new  UserRoleMappingTable();
    $result = $obj->read($id);

    $userRoleMappingTable = new UserRoleMappingTable();
    $userRoles = $userRoleMappingTable->fetchUserRoleMappings();


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
        <form action="/eduremun/classes/process_rolemapping.php?id=<?php echo $id; ?>" method="POST">
            <div class="form-group">
                <label for="userid">User ID</label>
                <input type="text" class="form-control" id="id" name="userid" value="<?php echo $userRoles['id']; ?>"
                    required>
            </div>
            <div class="form-group">
                <label for="userid">Role ID</label>
                <input type="text" class="form-control" id="username" name="roleid"
                    value="<?php echo $result['r_id']; ?>" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username"
                    value="<?php echo $userRoles['username']; ?>" required>
            </div>
            <div class="form-group">
                <label for="rolename">Role Name</label>
                <input type="text" class="form-control" id="rolename" name="rolename"
                    value="<?php echo $userRole['role_name'] ?>" required>
            </div>
            <!-- <div class="form-group">
                <label for="active">Active</label>
                <select name="active" id="active" value="<?php echo $result['active']; ?>" required>
                    <option value="1" <?php echo $active == 1 ? 'selected' : ''; ?>>Active</option>
                    <option value="0" <?php echo $active == 0 ? 'selected' : ''; ?>>InActive</option>
                </select>
            </div> -->
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html>
<?php
} else {
    // echo "UserId pass to edit user please!";
}
?>