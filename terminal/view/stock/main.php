<div class="card">
    <div class="card-body">
        <h4 class="card-title">Data table</h4>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table id="order-listing" class="table">
                        <thead>
                            <tr>
                                <th> #</th>
                                <th>SKU</th>
                                <th>Product</th>
                                <th>Brand</th>
                                <th>Catagory</th>
                                <th>Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?=GenStockInventoryData($conn)?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>