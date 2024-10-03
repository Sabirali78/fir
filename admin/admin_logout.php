<?php
include("db.php");

// admin_logout.php
session_start();
session_destroy();
header("Location: ../admin_login.html");
exit;
?>
