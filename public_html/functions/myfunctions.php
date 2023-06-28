<?php
require_once("config.php");

function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: ' . $url);
    exit();
}



function getAll($tablename)
{
    global $conn;
    $view_query = "select * from $tablename";
    return mysqli_query($conn, $view_query);
}

function getBySection($tablename, $section_name)
{
    global $conn;
    $view_query = "select * from $tablename where section = '$section_name'";
    return mysqli_query($conn, $view_query);
}

function getByLimit($tablename, $limit)
{
    global $conn;
    $view_query = "select * from $tablename  LIMIT $limit";
    return mysqli_query($conn, $view_query);
}

function getByColumn($tablename, $column_name, $column)
{
    global $conn;
    $view_query = "select * from $tablename where $column_name = '$column'";
    return mysqli_query($conn, $view_query);
}

function getById($tablename, $id)
{
    global $conn;
    $view_query = "select * from $tablename where id = $id";
    return (mysqli_query($conn, $view_query));
}


