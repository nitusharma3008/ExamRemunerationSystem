<!-- update_class.php -->
<?php
require_once(__DIR__ . '/../classes/DurationClass.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = new DurationTable();
    $result = $data->read($id);
    $duration = $result['duration'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Duration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Update Duration</h2>

        <form action="/eduremun/classes/process_duration.php?id=<?php echo $id; ?>" method="POST">
            <div class="form-group">
                <label for="class_name">Duration:</label>
                <input type="text" class="form-control" id="class_name" name="duration"
                    value="<?php echo $result['duration']; ?>" required>
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