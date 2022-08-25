<div class="page-header">
    <div class="page-title">
        <h4>Store Add</h4>
        <h6>Create new store</h6>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form method="post" action="index.php">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                    <div class="form-group">
                        <label>Store Name</label>
                        <input type="text" name="name" value="<?=$name?>">
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-12">
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" value="<?=$address?>">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Mobile</label>
                        <input type="text" name="mobile" value="<?=$mobile?>">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" value="<?=$email?>">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="select">
                            <option><?=$status?></option>
                            <option>Enable</option>
                            <option>Disable</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12">
                    <button type="submit" name="submit" value="store-update" class="btn btn-submit me-2">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>