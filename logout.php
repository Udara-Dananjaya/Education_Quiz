<?php
session_start();
unset($_SESSION["Session_Id"]);
unset($_SESSION["user"]);
unset($_SESSION["Lkey"]);
header("Location: Login.php");
?>