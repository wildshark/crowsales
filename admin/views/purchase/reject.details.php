<div class="page-header">
    <div class="page-title">
        <h4>Purchase Add</h4>
        <h6>Add/Update Purchase</h6>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6 col-sm-12 col-12">
                <div class="form-group">
                    <label>Date</label>
                    <div class="input-group">
                        <input type="text" name="date" value="<?=$date?>" placeholder="DD-MM-YYYY"
                            class="datetimepicker">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 col-12">
                <div class="form-group">
                    <label>Ref</label>
                    <div class="input-group">
                        <input type="text" name="ref" value="<?=$ref?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form method="post" action="index.php">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Product Name</label>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12">
                                <select name="product" class="select">
                                    <?=ProductCombe($conn)?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Qty</label>
                        <div class="input-groupicon">
                            <input type="text" name="qty" placeholder="0">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="price" placeholder="0.00">
                    </div>
                </div>
                <div class="col-lg-12">
                    <button type="submit" name="submit" value="purchase-reject-returnitem" class="btn btn-submit me-2">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-body">

        <div class="row">
            <div class="table-responsive mb-3">
                <table class="table">
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
                        <?=InvoicePurchaseRejectData($conn)?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <!--div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                    <label>Order Tax</label>
                    <input type="text">
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                    <label>Discount</label>
                    <input type="text">
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                    <label>Shipping</label>
                    <input type="text">
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                    <label>Status</label>
                    <select class="select">
                        <option>Choose Status</option>
                        <option>Completed</option>
                        <option>Inprogress</option>
                    </select>
                </div>
            </div-->
            <div class="row">
                <div class="col-lg-6 ">
                    <div class="total-order w-100 max-widthauto m-auto mb-4">
                        <ul>
                            <li>
                                <h4>Order Tax</h4>
                                <h5>GHc 0.00 (0.00%)</h5>
                            </li>
                            <li>
                                <h4>Discount </h4>
                                <h5>GHc 0.00</h5>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 ">
                    <div class="total-order w-100 max-widthauto m-auto mb-4">
                        <ul>
                            <li>
                                <h4>Shipping</h4>
                                <h5>GHc 0.00</h5>
                            </li>
                            <li class="total">
                                <h4>Grand Total</h4>
                                <h5>GHc <?=number_format($subTotal,2)?></h5>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>