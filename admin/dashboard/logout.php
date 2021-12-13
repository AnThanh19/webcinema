<?php
require "./a.php";

setcookie("abc", "", -1, "/");
session_destroy();

echo '<script>localStorage.clear();location.replace("./login.php");</script>';