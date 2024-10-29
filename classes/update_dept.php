<!-- update_class.php -->
<?php
require_once(__DIR__ . '/../classes/DepartmentTable.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = new DepartmentTable();
    $result = $data->read($id);
    $dept_name = $result['dept_name'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Class</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Update Dept Name</h2>

        <form action="/eduremun/classes/process_dept.php?id=<?php echo $id; ?>" method="POST">
            <div class="form-group">
                <label for="class_name">Dept Name:</label>
                <input type="text" class="form-control" id="class_name" name="dept_name"
                    value="<?php echo $result['dept_name']; ?>" required>
            </div>

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