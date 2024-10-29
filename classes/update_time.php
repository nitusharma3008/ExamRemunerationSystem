<!-- update_class.php -->
<?php
require_once(__DIR__ . '/../classes/TimeClass.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = new TimeClass();
    $result = $data->read($id);
    // $sem = $result['semester'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Semester</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Update Time</h2>

        <form action="/eduremun/classes/process_time.php?id=<?php echo $id; ?>" method="POST">
            <div class="form-group">
                <label for="time">Time</label>
                <input type="text" class="form-control" id="time" name="time" value="<?php echo $result['timing']; ?>"
                    required>
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