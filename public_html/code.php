<?php
if(session_status() === PHP_SESSION_NONE) session_start();

include_once('middleware/adminMiddleware.php');
include_once('functions/config.php');

if (isset($_POST['edit_account_btn'])) {
    $id = $_POST['id'];

    $data = array(
        "name" => $_POST['name'],
        "email" => $_POST['email'],
        "password" => $_POST['password']
    );

    

    $db->update("users", $data, "id = :id", ['id' => $id]);

    if ($db) {
        $_SESSION['auth_user'] = [
            'userid' => $_POST['id'],
            'name' => $_POST['name'],
            'email' => $_POST['email']
        ];
        redirect("index.php", "Profile Updated Successfully.");
    } else {
        redirect("index.php", "Something Went Wrong");
    }
}