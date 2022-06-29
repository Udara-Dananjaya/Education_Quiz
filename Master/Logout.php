<?php
session_start();
unset($_SESSION["Admin_Session_Id"]);
unset($_SESSION["USERNAME"]);
header("Location: Login.php");
?>