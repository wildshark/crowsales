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
                <div class="col-lg-6 col-sm-12 col-12">
                    <div class="form-group">
                        <label>SKU</label>
                        <input type="text" name="product-sku" value="<?=$sku?>">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 col-12">
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="product-name" value="<?=$name?>">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 col-12">
                    <div class="form-group">
                        <label>Brand</label>
                        <select name="brand" class="select">
                            <option value="<?=$brandID?>"><?=$brand?></option>
                            <?=BrandCombo($conn)?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 col-12">
                    <div class="form-group">
                        <label>Catagory</label>
                        <select name="catagory" class="select">
                            <option value="<?=$catagoryID?>"><?=$catagory?></option>
                            <?=CatagoryCombo($conn)?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Note</label>
                        <textarea name="note" class="form-control"><?=$details?></textarea>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12 col-12">
                    <div class="form-group">
                        <label>Tax %</label>
                        <input type="text" name="tax" value="<?=$tax?>" placeholder="0.00">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12 col-12">
                    <div class="form-group">
                        <label>Discount %</label>
                        <input type="text" name="discount" value="<?=$discount?>" placeholder="0.00">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12 col-12">
                    <div class="form-group">
                        <label>Selling Price</label>
                        <input type="text" name="price" value="<?=$selling_price?>" placeholder="0.00">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12 col-12">
                    <div class="form-group">
                        <label>Purchase Price</label>
                        <input type="text" name="purchase_price" value="<?=$purchase_price?>" placeholder="0.00">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12 col-12">
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
                    <button type="submit" name="submit" value="product-update" class="btn btn-submit me-2">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>