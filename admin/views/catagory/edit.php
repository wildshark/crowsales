<div class="page-header">
    <div class="page-title">
        <h4>Catagory</h4>
        <h6>Edit Catagory</h6>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form method="post" action="index.php">
            <div class="row">
                <div class="col-lg-6 col-sm-12 col-12">
                    <div class="form-group">
                        <label>Catagory </label>
                        <input type="text" name="name" value="<?=$catagory?>">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 col-12">
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
                    <button type="submit" name="submit" value="catagory-update" class="btn btn-submit me-2">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>