<?php
// logout.php session_destroy() + redirection
session_start();
session_destroy();
header('Location: login.php');
exit();
?>