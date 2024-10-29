<?php
require_once(__DIR__ . '/../classes/RoleTable.php');

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $desc = $_POST['desc'];


    $obj = new RoleTable();
    $data = $obj->create($name, $desc);
    if ($data) {
        echo "<script>alert('Records are submited');</script>";
        header('Location: /eduremun/pages/role.php');
    } else {
        echo "<script>alert('Something went wrong!');</script>";
    }
} else {
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
            <h2>Role Form</h2>
            <form action="add_role.php" method="POST">
                <div class="form-group">
                    <label for="name">Role Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="desc">Role Description</label>
                    <input type="text" class="form-control" id="desc" name="desc" required>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </body>

    </html>
<?php
}
?>