<?php

session_start();

include("db_connect.php");

session_unset();

header("location: ../mockup/homepage.php");
?>