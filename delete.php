<?php
include "db_connection.php";
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM student_records WHERE id=$id");
header("location: index.php");
?>