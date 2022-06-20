<?php

$conn = mysqli_connect('localhost', 'root', '', 'user_db');
if(isset($_POST['deleteBtn'])){

$id = $_POST['search_query'];
$query = "DELETE FROM user_form WHERE id = '$id'";
$query_run = mysqli_query($conn, $query);

}
header('location:members.php');
?>