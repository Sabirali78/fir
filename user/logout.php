<?php
// logout.php
session_start();
session_destroy();
header( "Location: http://localhost/fir/homepage.php");
exit;
?>
