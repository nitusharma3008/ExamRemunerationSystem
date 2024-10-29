<?php
require_once(__DIR__ . '/../classes/FacultyTable.php');

if (isset($_POST['submit'])) {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contact = $_POST['contact'];
    $active1 = (bool)$_POST['active'];

    $obj = new FacultyTable();
    $data = $obj->create($name, $email, $password, $contact, $active1);
    if ($data) {
        echo "<script>alert('Records are submited');</script>";
        header('Location: /eduremun/pages/faculty.php');
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
            <h2>Faculty Form</h2>
            <form action="add_faculty.php" method="POST">
                <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter Fullname"
                        required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password"
                        required>
                </div>
                <div class="form-group">
                    <label for="contact">Contact</label>
                    <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter contact"
                        required>
                </div>
                <div class="form-group">
                    <label for="contact">Active</label>
                    <select name="active" id="active" value="<?php echo $active; ?>" required>
                        <option value="1" <?php echo $active == 1 ? 'selected' : ''; ?>>Active</option>
                        <option value="0" <?php echo $active == 0 ? 'selected' : ''; ?>>InActive</option>
                    </select>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </body>

    </html>
<?php
}
?>