<div class="page-header">
    <div class="page-title">
        <h4>Brand</h4>
        <h6>Edit Brand</h6>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form method="post" action="index.php">
            <div class="row">
                <div class="col-lg-6 col-sm-12 col-12">
                    <div class="form-group">
                        <label>Brand</label>
                        <input type="text" name="name" value="<?=$brand?>">
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
                    <button type="submit" name="submit" value="brand-update" class="btn btn-submit me-2">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>