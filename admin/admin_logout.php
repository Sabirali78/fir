<?php
include("db.php");

// admin_logout.php
session_start();
session_unset();
session_destroy();
header("Location: admin/admin_login.html");
exit;
?>
