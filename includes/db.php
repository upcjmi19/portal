<?php

$server="localhost";
$username="Shivanshu";
$password="password";
$database="upcPortal";

$conn = mysqli_connect($server,$username,$password,$database);

function row_count($result){
    return mysqli_num_rows($result);
}

function escape($string){
    global $conn;
    return mysqli_real_escape_string($conn, $string);
}

function query($sql_query){
    global $conn;
    return mysqli_query($conn, $sql_query);
}

function confirm($result){
    global $conn;
    if(!$result){
        die("QUERY FAILED".mysqli_error($conn));
    }
}

function fetch_array($result){
    global $conn;
    return mysqli_fetch_array($result);
}

?>
