<!DOCTYPE html>
<html lang="en">

<?php require_once './includes/head.php'; ?>

<body>
    <div class="wrapper">

        <?php require_once './includes/sidebar.php'; ?>

        <div class="main">

            <?php require_once './includes/navbar.php'; ?>

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3">Tasks</h1>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="text-center">Add Task</h2>
                                    <div class="text-danger" id="error-task">
                                    </div>
                                    <div class="text-success" id="success-task">
                                    </div>
                                    <form class="row g-2" id="add-task-form">
                                        <div class="col-10">
                                            <input type="text" class="form-control" name="task-input-add" id="task-input-add" placeholder="Input your Task">
                                        </div>
                                        <div class="col-2">
                                            <button type="submit" class="btn btn-primary" name="submit">Add Task</button>
                                        </div>
                                    </form>
                                    <hr>
                                    <h3>Tasks</h3>
                                    <div id="tasks-container">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </main>

            <?php require_once './includes/footer.php'; ?>

        </div>
    </div>

    <?php require_once './includes/script.php'; ?>

    <script>
        const errorAddTask = document.getElementById('error-task');
        const successAddTask = document.getElementById('success-task');
        const addTaskForm = document.getElementById('add-task-form');

        addTaskForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const taskInputAddElement = document.getElementById('task-input-add');
            const taskInputAddValue = taskInputAddElement.value;
            errorAddTask.innerText = successAddTask.innerText = "";
            taskInputAddElement.classList.remove('is-invalid');

            if (taskInputAddValue == "" || taskInputAddValue === undefined) {
                taskInputAddElement.classList.add('is-invalid');
                errorAddTask.innerHTML = alert('Please provide your Task!', 'danger');
            } else {

                const data = {
                    task: taskInputAddValue,
                    submit: 1
                }

                fetch('./add_task.php', {
                    method: 'POST',
                    body: JSON.stringify(data),
                    headers: {
                        'Content-Type': 'application/json'
                    }
                }).then(function(response) {
                    return response.json();
                }).then(function(result) {
                    if (result.taskError) {
                        taskInputAddElement.classList.add('is-invalid');
                        errorAddTask.innerText = result.taskError;
                    } else if (result.success) {
                        successAddTask.innerHTML = alert(result.success, 'success');
                        addTaskForm.reset();
                        showTasks();
                    } else if (result.failed) {
                        errorAddTask.innerHTML = alert(result.failed, 'danger');
                    }
                });
            }
        });

        function showTasks() {
            fetch('./show_tasks.php')
                .then(function(response) {
                    return response.json();
                })
                .then(function(result) {
                    let taskRows = "";
                    result.forEach(function(value) {
                        taskRows += `<div class="border rounded p-3 mb-2"><div class="row"><div class="col-md-10"><input type="text" class="form-control bg-white" name="task-input-edit" id="task-input-${value['id']}" disabled placeholder="Input your Task" value="${value['task_body']}"></div><div class="col-md-1"><button class="btn btn-outline-info" id="btn-edit-${value['id']}" onclick="editTask(${value['id']})">Edit</button></div><div class="col-md-1"><button class="btn btn-outline-danger" onclick="deleteTask(${value['id']})">Delete</button></div></div></div>`;
                    });
                    const tasksContainerElement = document.getElementById('tasks-container');
                    tasksContainerElement.innerHTML = taskRows;
                })
        }

        function editTask(id) {
            const editTaskElement = document.getElementById('task-input-' + id);
            const btnEditElement = document.getElementById('btn-edit-' + id);
            const range = editTaskElement.value.length;

            if (btnEditElement.innerText == "Edit") {
                editTaskElement.removeAttribute('disabled');
                btnEditElement.innerText = "Save"
                editTaskElement.focus();
                editTaskElement.setSelectionRange(range, range);
            } else {
                editTaskElement.setAttribute('disabled', 'disabled');
                btnEditElement.innerText = "Edit";
                let updatedTaskElement = document.getElementById('task-input-' + id);
                let updatedTaskValue = updatedTaskElement.value;

                if (updatedTaskValue == "" || updatedTaskValue === undefined) {
                    updatedTaskElement.classList.add('is-invalid');
                } else {
                    const data = {
                        id: id,
                        task: updatedTaskValue,
                        submit: 1
                    };

                    fetch('./edit_task.php', {
                        method: 'POST',
                        body: JSON.stringify(data),
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    }).then(function(response) {
                        return response.json();
                    }).then(function(result) {
                        if (result.taskError) {
                            taskInputAddElement.classList.add('is-invalid');
                            errorAddTask.innerText = result.taskError;
                        } else if (result.success) {
                            successAddTask.innerHTML = alert(result.success, 'success');
                            addTaskForm.reset();
                            showTasks();
                        } else if (result.failed) {
                            errorAddTask.innerHTML = alert(result.failed, 'danger');
                        }
                    });
                }


            }
        }

        function deleteTask(id) {

        }
        
        showTasks();

        function alert(msg, cls) {
            let alert = `<div class="alert alert-${cls} alert-dismissible fade show" role="alert">${msg}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            return alert;
        }
    </script>

</body>

</html>