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
    <link rel="stylesheet" href="../asstes/css/style.css?v=<?php echo time(); ?>" type="text/css">
    <title>EduRemun</title>
    <style>
        .regist-form {
            background-color: whitesmoke;
            width: 45%;
            align-items: center;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <div class="wrapper-main">
        <?php include('C:/xampp/htdocs/eduremun/header.php'); ?>
        <div class="container-fluid mt-5">
            <div class="regist-form mx-auto shadow-lg p-3 mb-5 bg-body rounded">
                <div class="form-title text-center">
                    <h3>Login</h3>
                    <p><?php
                        if (isset($_GET['error'])) {
                            $error = $_GET['error'];
                            if ($error) {
                                echo $error;
                            }
                        }
                        ?></p>
                </div>
                <form action="authentication.php" class="p-3" method="GET" id="loginForm" name="loginForm">
                    <div class="form-group m-3">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control" />
                    </div>
                    <div class="form-group m-3">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" />
                    </div>
                    <button type="submit" name="login" class="btn btn-success font-75" id="btn-reg">Login</button>
                </form>
            </div>
        </div>
        <?php include('C:/xampp/htdocs/eduremun/footer.php'); ?>

    </div>


    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- jQuery Validation Plugin -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function() {
            // jQuery Validation
            $("#loginForm").validate({
                rules: {
                    username: {
                        required: true
                    },
                    password: {
                        required: true
                    }
                },
                messages: {
                    username: {
                        required: "Please enter your username"
                    },
                    password: {
                        required: "Please enter your password"
                    }
                },
                errorElement: "div",
                errorPlacement: function(error, element) {
                    error.addClass("invalid-feedback");
                    error.insertAfter(element);
                },
                highlight: function(element) {
                    $(element).addClass("is-invalid");
                },
                unhighlight: function(element) {
                    $(element).removeClass("is-invalid");
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

</body>

</html>