<?php
if(session_status() === PHP_SESSION_NONE) session_start();

$_SESSION['success'] = "Logged out successfully";
unset($_SESSION['auth']);
include_once('middleware/employeeMiddleware.php');


