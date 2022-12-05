<!-- Delete Modal -->
<div class="modal fade" id="deleteTask" tabindex="-1" aria-labelledby="deleteTaskLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteTaskLabel">Delete Task</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-danger" id="error-delete"></div>
                <div class="text-success" id="success-delete"></div>
                <form action="" method="POST" id="delete-task-form">
                    <div>Are your sure you want to delete this?</div>
                    <div>
                        <input type="submit" value="Delete Task" class="btn btn-danger" name="submit-delete">
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>