<?php
// The database connection 
$servername = "localhost";
$username = "root";
$passsword = "";
$database = "inotes";
$conn = mysqli_connect($servername , $username ,$passsword ,$database);
if(!$conn){
    echo '<div class="container-fluid mt-5 mb-0 pt-1">
    <div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
                <strong>Sorry!</strong>There are some technical isssue-- please try again!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
         </div>';
}
?>