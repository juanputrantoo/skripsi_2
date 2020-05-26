<div class="card shadow w-50 mx-auto">
    <form method="POST" action="<?php echo base_url('admin/editAdmin/edit/' . $admin['id']);?>" enctype="multipart/form-data">
        <div class="card-header pb-0">
            <h5>Edit</h5>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" value="<?php echo $admin['username']; ?>">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" value="<?php echo $admin['password']; ?>">
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex">
                <button type="submit" class="btn btn-info w-50 m-auto">Submit</button>
            </div>
        </div>
    </form>
</div>