<?php
include("C:/xampp/htdocs/eduremun/config/config.php");
// $conn = new mysqli('localhost','root','','enumration_db');

// if($conn->connect_error){
//     die("Connection failed: " . $conn->connect_error);
// }


if (isset($_POST['submit'])) {

    $fullname = $_POST["fullname"];
    $username = $_POST["username"];
    $email =   $_POST["email"];
    $password = $_POST["password"];
    $contact = $_POST["phoneno"];
    $cpassword = $_POST["cpassword"];

    if (!empty($fullname) && !empty($username) && !empty($email) && !empty($password) && !empty($contact) && !empty($cpassword)) {

        try {
            // echo $fullname." ".$username." ".$email." ".$password." ".$contact." ".$cpassword;
            if ($password !== $cpassword) {
                echo "<script>alert('Password does not match');</script>";
            } else {
                $query = "INSERT INTO users (username,password,email,fullname,contact) VALUES('$username','$password','$email','$fullname','$contact')";
                $data = mysqli_query($conn, $query);

                $query = "SELECT u.id as u_id,u.username,r.role_id as role_id,r.role_name FROM users u,role r where u.username=? and r.role_name='user'";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("s", $username);
                $stmt->execute();

                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "id: " . $row["u_id"] . " - Name: " . $row["u_name"] . " " . $row["u_email"] . " " . $row["u_full_name"] . " " . $row["u_contact"] . " " . $row["r_id"] . " " . $row["r_name"] . "<br>";
                        $query = "INSERT INTO user_role_mapping(u_id,r_id) VALUES($row[u_id],$row[role_id])";
                        $data = mysqli_query($conn, $query);
                    }
                }
                echo "<script>alert('Form submitted successfully!');</script>";
                header('Location: /eduremun/authetication/login.php');
            }
        } catch (mysqli_sql_exception $e) {
            $conn->rollBack();
            echo $conn->errno;
            switch ($conn->errno) {
                case 1062:
                    echo "Error: Duplicate entry. The username already exists.";
                    break;
                case 1045:
                    echo "Error: Access denied. Invalid database credentials.";
                    break;
                case 2002:
                    echo "Error: Unable to connect to the MySQL server.";
                    break;
                case 1146:
                    echo "Error: The table does not exist.";
                    break;
                case 1054:
                    echo "Error: Unknown column in the query.";
                    break;
                case 1049:
                    echo "Error: The database does not exist.";
                    break;
                case 1216:
                    echo "Error: Foreign key constraint violation.";
                    break;
                case 1217:
                    break;
                case 1451:
                    echo "Error: Cannot delete or update the record due to a foreign key constraint.";
                    break;
                case 1064:
                    echo "Error: SQL syntax error.";
                    break;
                default:
                    echo "MySQL Error: " . $e->getMessage();
                    break;
            }
        } catch (Exception $e) {
            // Rollback the transaction if something failed
            $conn->rollBack();
            echo $e;
            echo "Failed to complete the transaction: " . $e->getMessage();
        }
    }
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
        <div class="container-fluid mt-5 ">
            <div class="regist-form mx-auto shadow-lg p-3 mb-5 bg-body rounded">
                <div class="form-title text-center">
                    <h3>Registration</h3>
                </div>
                <form action="register.php" method="POST" class="p-3" id="myform">
                    <div class="form-group m-3">
                        <label for="">FullName</label>
                        <input type="text" name="fullname" class="form-control" required />
                    </div>
                    <div class="form-group m-3">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control" required />
                    </div>
                    <div class="form-group m-3">
                        <label for="">Mobile No</label>
                        <input type="text" name="phoneno" class="form-control" required />
                    </div>
                    <div class="form-group m-3">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" required />
                    </div>
                    <div class="form-group m-3">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" required />
                    </div>
                    <div class="form-group m-3">
                        <label for="">Confirm Password</label>
                        <input type="password" name="cpassword" class="form-control" required />
                    </div>
                    <button type="submit" name="submit" class="btn btn-success font-75 "
                        id="btn-reg">Submit</button><br>
                    <div class="text-center text-dark">All ready have an member?<a href="login.php"> Login</a></div>
                </form>
            </div>
        </div>
        <?php include('C:/xampp/htdocs/eduremun/footer.php') ?>

    </div>



    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include jQuery Validation Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function() {
            // Validate form
            $('#myform').validate({
                rules: {
                    fullname: {
                        required: true,
                        minlength: 3
                    },
                    username: {
                        required: true,
                        minlength: 3
                    },
                    phoneno: {
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 10
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 6
                    },
                    cpassword: {
                        required: true,
                        equalTo: '[name="password"]'
                    }
                },
                messages: {
                    fullname: {
                        required: "Please enter your full name",
                        minlength: "Your name must consist of at least 3 characters"
                    },
                    username: {
                        required: "Please enter a username",
                        minlength: "Username must consist of at least 3 characters"
                    },
                    phoneno: {
                        required: "Please enter your phone number",
                        digits: "Please enter only numbers",
                        minlength: "Phone number must be 10 digits",
                        maxlength: "Phone number must be 10 digits"
                    },
                    email: {
                        required: "Please enter your email",
                        email: "Please enter a valid email address"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 6 characters long"
                    },
                    cpassword: {
                        required: "Please confirm your password",
                        equalTo: "Passwords do not match"
                    }
                }
            });
        });
    </script>



</body>

</html>