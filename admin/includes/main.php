<?php
$conn = mysqli_connect('localhost', 'root', '', 'enumration_db');


// Count No Of department
$sql = "SELECT COUNT(*) AS dept_count FROM 	department";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data
    $row = $result->fetch_assoc();
    $depart  = $row['dept_count'];
} else {
    echo "No departments found";
}


// Count no of Faculty
$sql = "SELECT COUNT(*) AS faculty_count FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $faculty = $row['faculty_count'];
} else {
    echo "No departments found";
}


// Count no of Classes
$sql = "SELECT COUNT(*) AS class_count FROM classes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $class = $row['class_count'];
} else {
    echo "No departments found";
}

?>

<?php
require_once __DIR__ . '/../../classes/User.php';
$userOBJ = new UsersTable;
$userData = $userOBJ->readAll();

$sql = "SELECT DISTINCT
    u.id, 
    u.username AS usernames, 
    u.email AS emails, 
    u.fullname, 
    u.contact, 
    u.active, 
    u.createdAt, 
    u.updatedAt, 
    ur.total_duration AS durations, 
    ur.total_amount AS amounts
FROM 
    users u
RIGHT JOIN 
    user_remuneration ur
ON 
    u.id = ur.user_id;
";

// Execute the query
$data = mysqli_query($conn, $sql);

// Initialize an array to store the result set
$dataResult = [];

// Fetch all rows
while ($row = mysqli_fetch_assoc($data)) {
    $dataResult[] = $row;
}


?>

<main>
    <div class="container px-4" style="margin-left:230px ; margin-top:60px">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <!-- <li class="breadcrumb-item active">Dashboard</li> -->
        </ol>
        <div class="row">
            <!-- <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Available Exams <h5>10</h5>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div> -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Available Faculty <h5><?php echo $faculty ?></h5>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Available Classes <h5><?php echo $class ?></h5>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Available Departments <h5><?php echo $depart ?></h5>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        Area Chart Example
                    </div>
                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        Bar Chart Example
                    </div>
                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                </div>
            </div>
        </div> -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Payment Information
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Contact No</th>
                            <th>Total Duration</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataResult as $user) {  ?>
                            <tr>
                                <td><?php echo $user['usernames']; ?></td>
                                <td><?php echo $user['emails']; ?></td>
                                <td><?php echo $user['contact']; ?></td>
                                <td><?php echo  $user['durations']; ?></td>
                                <td><?php echo $user['amounts']; ?></td>
                                <td><?php echo "Pending"; ?></td>
                                <td><button type="submit" class="btn btn-danger">Approve</button></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>