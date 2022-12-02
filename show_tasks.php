<?php require_once './database/connection.php'; ?>

<?php
session_start();
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM `tasks` WHERE `user_id` = ${user_id}";
$result = $conn->query($sql);
$tasks = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($tasks);
