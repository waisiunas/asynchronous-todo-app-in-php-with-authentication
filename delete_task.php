<?php require_once './database/connection.php'; ?>

<?php
$form_input = file_get_contents("php://input");
$_POST = json_decode($form_input, true);

if(isset($_POST['submit'])) {
    $task_id = htmlspecialchars($_POST['id']);

    if(empty($task_id)) {
        echo json_encode(['taskError' => 'Please provide your Task ID!']);
    } else {
        $sql = "DELETE FROM `tasks` WHERE `id` = '${task_id}'";
        if($conn->query($sql)) {
            echo json_encode(['success' => 'Task has been successfully deleted!']);
        } else {
            echo json_encode(['failed' => 'Task has failed to delete!']);
        }
        
    }
}
