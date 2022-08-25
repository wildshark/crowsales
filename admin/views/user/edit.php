<div class="page-header">
    <div class="page-title">
        <h4>Product Add</h4>
        <h6>Create new product</h6>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12 col-sm-6 col-12">
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="fname" value="<?=$fname?>">
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
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" value="<?=$username?>">
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="password" value="<?=$password?>">
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                    <label>User Role</label>
                    <select class="select">
                        <option><?=$role?></option>
                        <option>Admin</option>
                        <option>User</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                    <label>User Status</label>
                    <select class="select">
                        <option><?=$status?></option>
                        <option>Enable</option>
                        <option>Disable</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-12">
                <a href="javascript:void(0);" class="btn btn-submit me-2">Submit</a>
                <a href="productlist.html" class="btn btn-cancel">Cancel</a>
            </div>
        </div>
    </div>
</div>