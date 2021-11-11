<?php 
include "_dbconnect.php";
session_start();
$user_id = $_SESSION['Sno'];
$id = $_GET['id'];
$del = "DELETE FROM `notes` WHERE sno = '$id'";
$result = mysqli_query($conn , $del);
if($result){
    header("location:../index.php?user=$user_id");
    exit;
}
else{
    echo "Error try again";
}
?>