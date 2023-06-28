<?php
if(session_status() === PHP_SESSION_NONE) session_start();

require_once("myfunctions.php");
require_once("config.php");

if (isset($_POST["login_btn"])) {
    $username = $_POST['email-username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE (email = :username OR name = :username) AND password = :password";
    $params = array(':username' => $username, ':password' => $password);

    $stmt = $db->executeQuery($query, $params);

    if ($stmt->rowCount() > 0) {
        $_SESSION['auth'] = true;

        $userdata = $stmt->fetch(PDO::FETCH_ASSOC);
        $userid = $userdata['id'];
        $username = $userdata['name'];
        $useremail = $userdata['email'];
        $role_as = $userdata['status'];

        $_SESSION['auth_user'] = [
            'userid' => $userid,
            'name' => $username,
            'email' => $useremail
        ];
        $_SESSION['role_as'] = $role_as;

        if ($role_as == 1 || $role_as == 0) {
            redirect("../index.php", "Welcome to dashboard");
        }
    } else {
        $_SESSION['error'] = 'Please enter the correct email or password';
        header('Location: ../login.php');
        exit();
    }
} else if (isset($_POST["register_btn"])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $query = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
    $params = array(':name' => $name, ':email' => $email, ':password' => $password);
    $stmt = $db->executeQuery($query, $params);
    if ($stmt) {
        $_SESSION['success'] = 'Registration successful';
        header('Location: /login.php');
        exit();
    }
  
}

else {
    redirect("../login.php", "Something went wrong");
}