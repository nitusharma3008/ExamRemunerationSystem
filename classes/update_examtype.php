<?php
require_once(__DIR__ . '/../classes/ExamTypeClass.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $examtypeobj = new ExamTypeTable();
    $read = $examtypeobj->read($id);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Type Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Exam Type Form</h2>
        <form action="/eduremun/classes/process_examtype.php?id=<?php echo $id; ?>" method="POST">
            <div class="form-group">
                <label for="examtypename">Exam Type</label>
                <input type="text" class="form-control" id="examtypename" name="examtypename"
                    value="<?php echo $read['type']; ?>" required>
            </div>
            <div class="form-group">
                <label for="amount">Rate Per Hour</label>
                <input type="text" class="form-control" id="amount" name="amount"
                    value="<?php echo $read['rate_per_hour']; ?>" required>
            </div>
            <div class="form-group">
                <label for="desc">Description</label>
                <input type="text" class="form-control" id="desc" name="desc"
                    value="<?php echo $read['description']; ?>" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- Bootstrap JS (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<?php
} else {
}
?>