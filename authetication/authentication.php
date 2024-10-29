<?php
require_once(__DIR__ . '/../classes/User.php');
//include("/eduremun/config/config.php");

echo error_reporting();


$conn = mysqli_connect('localhost', 'root', '', 'enumration_db');
if (!isset($_GET['username']) && !isset($_GET['password'])) {
    header("Location: login.php?error=Session Expired!");
    exit();
}



$user_id = $_GET['u_id'];

$username = $_GET['username'];
$password = $_GET['password'];

if ($username != null && $password != null) {
    // $query = "SELECT u.id as u_id,u.username as u_name,u.email as u_email,u.fullname as u_full_name,u.contact as u_contact,r.role_id as r_id,r.role_name as r_name FROM users u JOIN user_role_mapping urm ON urm.u_id=u.id JOIN role r ON urm.r_id=r.role_id where u.username=? and u.password=? and u.active=true";
    // $stmt = $conn->prepare($query);
    // $stmt->bind_param("ss",$username,$password);
    // $stmt->execute();

    // $result = $stmt->get_result();


    $user = new UsersTable();
    $result = $user->validateUser($username, $password);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            //echo "id: " . $row["u_id"] . " - Name: " . $row["u_name"] . " " . $row["u_email"] . " " . $row["u_full_name"] . " " . $row["u_contact"] . " " . $row["r_id"] . " " . $row["r_name"] . "<br>";

            session_start();


            //Role Information
            $_SESSION['role_id'] = $row["r_id"];
            $_SESSION['role_name'] = $row["r_name"];

            //User Information
            $_SESSION['userId'] = $row["u_id"];
            $_SESSION['username'] = $row["u_name"];
            $_SESSION['u_email'] = $row["u_email"];
            $_SESSION['u_full_name'] = $row["u_full_name"];
            $_SESSION['u_contact'] = $row["u_contact"];

            //Flag to check use activations
            $_SESSION['isLoggedIn'] = true;
        }
        if ($_SESSION['role_name'] == 'admin') {
            header('Location:/eduremun/admin/index.php');
        } else {
            header("Location:/eduremun/UserManage/index.php");
        }
        exit();
    } else {
        header("Location: /eduremun/authetication/login.php?error=Invalid User!");
        exit();
        echo "Invalid User!";
    }
    $conn->close();
}
