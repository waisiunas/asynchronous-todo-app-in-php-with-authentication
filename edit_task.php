<?php require_once './database/connection.php'; ?>

<?php
$form_input = file_get_contents("php://input");
$_POST = json_decode($form_input, true);

if(isset($_POST['submit'])) {
    $task = htmlspecialchars($_POST['task']);
    $task_id = htmlspecialchars($_POST['id']);

    if(empty($task)) {
        echo json_encode(['taskError' => 'Please provide your Task!']);
    } else {
        $sql = "UPDATE `tasks` SET `task_body`= '${task}' WHERE `id` = ${task_id}";
        if($conn->query($sql)) {
            echo json_encode(['success' => 'Task has been successfully updated!']);
        } else {
            echo json_encode(['failed' => 'Task has failed to update!']);
        }
        
    }
}
