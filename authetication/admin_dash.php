<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Aguafina+Script&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./asstes/css/style.css?v=<?php echo time(); ?>" type="text/css">
    <title>Admin DashBoard</title>
</head>

<body>

    <!-- <nav class="navbar navbar-expand-lg shadow-lg p-4 mb-5 bg-white rounded">
        <div class="container-fluid">
            <a class="navbar-brand text-dark" href="index.php">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-dark justify-content-around" id="navbarNav">
                <ul class="navbar-nav">
                    <div class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/eduremun/pages/faculty.php">faculty</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/eduremun/pages/class.php">Class</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/eduremun/pages/duration.php">Duration</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/eduremun/pages/ExamType.php">Exam Type</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/eduremun/pages/exampattern.php">Exam Pattern</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/eduremun/pages/users.php">Manage User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/eduremun/pages/department.php">Department</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/eduremun/pages/role.php">Role</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/eduremun/pages/sem.php">Semester</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/eduremun/pages/userrolemapping.php">RoleMapping</a>
                        </li> 
    </div>
    </ul>
    <div class="navbar-nav d-flex align-self-end">
        <li class="nav-item">
            <a class="nav-link" href="/eduremun/authetication/logout.php">Logout</a>
        </li>
    </div>
    </div>
    </div>
    </nav> -->


    <!-- Admin logout function  -->
    <?php


    //session_start();

    // if (isset($_SESSION['isLoggedIn'])) {
    //      echo $_SESSION['userId'] . " " . $_SESSION['username'] . " " . $_SESSION['u_email'] . " " . $_SESSION['u_full_name'] . " " . $_SESSION['u_contact'];
    // } else {
    //     header("Location: /eduremun/authetication/login.php?error=Session Expired! Please login again.");
    // }


    ?>
    <!-- <a href="/eduremun/authetication/logout.php">Logout</a> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

</body>

</html>