<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Default form</h4>
                <p class="card-description">
                    Basic form layout
                </p>
                <form class="forms-sample">
                    <div class="form-group">
                        <label for="exampleInputUsername1">Date</label>
                        <input type="text" class="form-control" value="<?=date("d-M-Y",strtotime($date));?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Invoice #</label>
                        <input type="text" class="form-control" value="<?=$ref?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Sub-Total</label>
                        <input type="text" class="form-control" value="<?=number_format($subTotal,2);?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Discount</label>
                        <input type="text" class="form-control" id="exampleInputConfirmPassword1"
                            placeholder="0.00">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Tax</label>
                        <input type="text" class="form-control" id="exampleInputConfirmPassword1"
                            placeholder="0.00">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Total</label>
                        <input type="text" class="form-control" value="<?=number_format($subTotal,2);?>"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Default form</h4>
                <p class="card-description">
                    Basic form layout
                </p>
                <form class="forms-sample">
                    <div class="form-group">
                        <label>Item</label>
                        <select name="item" class="form-control js-example-basic-single">
                            <?=ProductCombe($conn)?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Qty</label>
                        <input type="text" class="form-control" name="qty" placeholder="0.00">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Price</label>
                        <input type="text" class="form-control" name="price" placeholder="0.00">
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Hoverable Table</h4>
                <p class="card-description">
                    Add class <code>.table-hover</code>
                </p>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>QTY</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Tax</th>
                            <th>Subtotal</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?=InvoiceSalesData($conn)?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>