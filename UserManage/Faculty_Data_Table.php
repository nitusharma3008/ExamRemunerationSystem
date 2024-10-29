<?php
include('user_dashboard.php');

$conn = mysqli_connect('localhost', 'root', '', 'enumration_db');
?>

<?php

require_once(__DIR__ . '/../classes/FacultyData.php');

$facultyDataTable = new FacultyDataTable();

//Fetch all faculty data records
$facultyData = $facultyDataTable->readAllWithJoins();

$user_id = $_SESSION['userId'];

$totalDuration = 0;
$totalAmount = 0;




?>

<div class="container-fluid mt-5 pt-5">
    <h2 class="mb-4 text-center">
        <ul>Faculty Data List</ul>
    </h2>
    <table class="table table-striped border w-100">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Class</th>
                <th>Duration</th>
                <th>Exam Type</th>
                <th>Exam Pattern</th>
                <th>Department</th>
                <th>Time</th>
                <th>Amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($facultyData)): ?>
                <?php foreach ($facultyData as $data): ?>
                    <?php
                    // Accumulate total duration and amount
                    $totalDuration += $data['duration_name'];
                    $totalAmount += $data['remun'];
                    ?>
                    <tr>
                        <td><?php echo $user_id; ?></td>
                        <td><?php echo $_SESSION['username']; ?></td>
                        <td><?php echo $data['class_name']; ?></td>
                        <td><?php echo $data['duration_name'] . " Hours"; ?></td>
                        <td><?php echo $data['exam_type_name']; ?></td>
                        <td><?php echo $data['exam_pattern_name']; ?></td>
                        <td><?php echo $data['department_name']; ?></td>
                        <td><?php echo $data['time_name']; ?></td>
                        <td><?php echo $data['remun']; ?></td>
                        <td>
                            <!-- <a href="update_faculty_data.php?id=<?php echo $data['id']; ?>"
                                class="btn btn-sm btn-warning">Update</a> -->
                            <a href="delete_faculty_data.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9" class="text-center">No data found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>


<div class="container-fluid fixed-bottom ">
    <div class="user-data border">
        <form action="generate_pdf.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="totalDuration" value="<?php echo $totalDuration; ?>">
            <input type="hidden" name="totalAmount" value="<?php echo $totalAmount; ?>">
            <input type="hidden" name="userId" value="<?php echo $_SESSION['userId']; ?>">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Data Id</th>
                        <th>Total Duration</th>
                        <th>Total Amount</th>
                        <th>Generate pdf</th>
                        <th>Payment</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Total</td>
                        <td><?php echo $totalDuration; ?> Hours</td>
                        <td><?php echo $totalAmount; ?></td>
                        <td><button type="submit" name="generate_pdf" class="btn btn-success">Generate PDF</button></td>
                        <td><a href="#" class="btn btn-success">Apply for
                                Payment</a></td>
                    </tr>
                </tbody>
            </table>
        </form>


        <?php


        // Your insertion logic here
        $insertSql = "INSERT INTO user_remuneration (user_id, total_duration, total_amount) VALUES (?, ?, ?)";
        $insertStmt = $conn->prepare($insertSql);
        $insertStmt->bind_param("idd", $user_id, $totalDuration, $totalAmount);

        if ($insertStmt->execute()) {
            echo "Record inserted successfully.";
        } else {
            echo "Error inserting record: " . $insertStmt->error;
        }

        ?>
    </div>
</div>