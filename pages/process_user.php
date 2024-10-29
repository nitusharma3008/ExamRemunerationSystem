<?php

require_once(__DIR__ . '/../classes/User.php');

if (isset($_POST['id']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['fullname']) && isset($_POST['contact']) && isset($_POST['active'])) {
    $id = $_POST['id'];
    $data = new UsersTable();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $contact = $_POST['contact'];
    $active = (bool)$_POST['active'];

    $data->update($id, $username, $password, $email, $fullname, $contact, $active);
    echo "<script>alert('Successfully updated user information.');</script>";
    header("location: ../pages/users.php");
} else {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $contact = $_POST['contact'];
    $active = $_POST['active'];
    echo "Something went wrong!";
    echo $id, $username, $password, $email, $fullname, $contact, $active;
}
