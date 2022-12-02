<?php require_once './database/connection.php'; ?>

<?php
session_start();
$user_id = $_SESSION['user_id'];
$form_input = file_get_contents("php://input");
$_POST = json_decode($form_input, true);
if(isset($_POST['submit'])) {
    $task = htmlspecialchars($_POST['task']);

    if(empty($task)) {
        echo json_encode(['taskError' => 'Please provide your Task!']);
    } else {
        $sql = "INSERT INTO `tasks`(`task_body`, `user_id`) VALUES ('${task}', '${user_id}')";
        if($conn->query($sql)) {
            echo json_encode(['success' => 'Task has been successfully added!']);
        } else {
            echo json_encode(['failed' => 'Task has failed to add!']);
        }
        
    }
}
