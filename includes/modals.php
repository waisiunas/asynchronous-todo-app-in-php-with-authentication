<!-- Add Modal -->
<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addUserLabel">Add User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-danger" id="error-add"></div>
                <div class="text-success" id="success-add"></div>
                <form action="" method="POST" id="add-user-form">
                    <div class="mb-3">
                        <label for="name-add">Name</label>
                        <input type="text" class="form-control" name="name-add" id="name-add" placeholder="Enter your name!">
                    </div>
                    <div class="mb-3">
                        <label for="email-add">Email</label>
                        <input type="text" class="form-control" name="email-add" id="email-add" placeholder="Enter your email!">
                    </div>
                    <div>
                        <input type="submit" value="Add User" class="btn btn-primary" name="submit-add">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editUserLabel">Edit User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-danger" id="error-edit"></div>
                <div class="text-success" id="success-edit"></div>
                <form action="" method="POST" id="edit-user-form">
                    <div class="mb-3">
                        <label for="name-edit">Name</label>
                        <input type="text" class="form-control" name="name-edit" id="name-edit" placeholder="Enter your name!">
                    </div>
                    <div class="mb-3">
                        <label for="email-edit">Email</label>
                        <input type="text" class="form-control" name="email-edit" id="email-edit" placeholder="Enter your email!">
                    </div>
                    <div>
                        <input type="submit" value="Edit User" class="btn btn-primary" name="submit-edit">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteUser" tabindex="-1" aria-labelledby="deleteUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteUserLabel">Delete User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-danger" id="error-delete"></div>
                <div class="text-success" id="success-delete"></div>
                <form action="" method="POST" id="delete-user-form">
                    <div>Are your sure you want to delete this?</div>
                    <div>
                        <input type="submit" value="Delete User" class="btn btn-danger" name="submit-delete">
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>