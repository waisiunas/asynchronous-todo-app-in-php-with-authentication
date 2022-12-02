<?php require_once 'database/connection.php'; ?>

<?php

session_start();
unset($_SESSION['user_id']);
header('location: ./login.php');