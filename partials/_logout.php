<?php
echo "waiting for logging out";
session_start();
session_unset();
session_destroy();
header("location:_login.php");
exit;
?>