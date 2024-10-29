<?php
session_start();

if (isset($_SESSION['isLoggedIn'])) {
    //echo $_SESSION['userId'] . " " . $_SESSION['username'] . " " . $_SESSION['u_email'] . " " . $_SESSION['u_full_name'] . " " . $_SESSION['u_contact'];
} else {
    header("Location: /eduremun/authetication/login.php?error=Session Expired! Please login again.");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/v5-font-face.min.css">

    <link rel="stylesheet" href="../asstes/css/style.css?v=<?php echo time(); ?>" type="text/css">

    <title>EduRemun</title>

</head>

<body>


    <header class="header fixed-top">

        <div class="header-bottom padding-20  shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">

                        <div class="header-logo">
                            <a class="nav-link small px-3 text-uppercase " aria-current="page"
                                href="/eduremun/UserManage/index.php">
                                Examination Portal
                            </a>
                        </div>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link small px-3 text-uppercase " aria-current="page"
                                        href="/eduremun/UserManage/index.php">HOME
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link small px-3 text-uppercase "
                                        href="/eduremun/UserManage/add-exam.php">Add Entry</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link small px-3 text-uppercase "
                                        href="/eduremun/UserManage/Faculty_Data_Table.php">Faculty Data</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link small px-3 text-uppercase " href="./manageuser.php">Manage
                                        Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Username : <?php echo $_SESSION['username']; ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/eduremun/authetication/logout.php">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
</body>

</html>