<?php
require_once(__DIR__ . '/../classes/SemClass.php');

$semObj = new SemClass();
$sem = $semObj->readAll();


//Add User Code


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Table</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color: whitesmoke;
    }

    .container {
        background-color: white;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
    }
    </style>
</head>

<body>
    <?php
    include('C:/xampp/htdocs/eduremun/admin/includes/header.php');
    include('C:/xampp/htdocs/eduremun/admin/includes/topbar.php');
    ?>



    <div class="container mt-2 p-3 px-4">
        <h2 class="text-center mb-4">Available Semester</h2>
        <a href="/eduremun/classes/add_sem.php" class="btn btn-primary mb-3">Add New Sem</a>



        <!-- bootstrap Modal -->


        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add New Sem
        </button> -->

        <!-- Modal -->
        <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ADD Semester</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="sem-form">
                            <form action="update.php" method="POST">
                                <div class="form-group">
                                    <label for="sem">Semester</label>
                                    <input type="text" class="form-control" name="sem" />
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div> -->

        <table class=" table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <!-- <th> ID</th> -->
                    <th>Semester</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($sem as $sems) {
                    echo "<tr>";
                    // echo "<td>" . htmlspecialchars($class['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($sems['sem']) . "</td>";
                    echo "<td>" . htmlspecialchars(date("d-m-Y", strtotime($sems['createdAt']))) . "</td>";
                    echo "<td>" . htmlspecialchars(date("d-m-Y", strtotime($sems['updatedAt']))) . "</td>";
                    echo "<td>";
                    echo "<a href='/eduremun/classes/update_sem.php?id=" . htmlspecialchars($sems['id']) . "' class='btn btn-warning btn-sm'>Update</a> ";
                    echo "<a href='/eduremun/classes/delete_sem.php?id=" . htmlspecialchars($sems['id']) . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this class?\");'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>