<!-- update_class.php -->
<?php
require_once(__DIR__ . '/../classes/Class.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = new ClassTable();
    $result = $data->read($id);
    $class_name = $result['class_name'];


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
        <h2>Update Class</h2>

        <form action="/eduremun/classes/process_class.php?id=<?php echo $id; ?>" method="POST">
            <div class="form-group">
                <label for="class_name">Class Name:</label>
                <input type="text" class="form-control" id="class_name" name="class_name"
                    value="<?php echo $result['class_name']; ?>" required>
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