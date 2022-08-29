<div class="page-header">
    <div class="page-title">
        <h4>User's Profile</h4>
        <h6>Edit user's profile</h6>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form method="post" action="index.php">
            <div class="row">
                <div class="col-lg-12 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="name" value="<?=$fname?>">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" value="<?=$email?>">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Mobile</label>
                        <input type="text" name="mobile" value="<?=$mobile?>">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" value="<?=$username?>">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="password" value="<?=$password?>">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Asign Store</label>
                        <select name="asign" class="select">
                            <option value="<?=$storeID?>"><?=$store?></option>
                            <?=StoreCombo($conn)?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="form-group">
                        <label>User Role</label>
                        <select name="role" class="select">
                            <option><?=$role?></option>
                            <option>Admin</option>
                            <option>User</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="form-group">
                        <label>User Status</label>
                        <select name="status" class="select">
                            <option><?=$status?></option>
                            <option>Enable</option>
                            <option>Disable</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12">
                    <button type="submit" name="submit" value="user-update" class="btn btn-submit me-2">Submit</a>
                </div>
            </div>
        </form>
    </div>
</div>