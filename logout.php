<?php
//  Log Out User
session_start();
session_destroy();
header('Location: login.php');
?>
