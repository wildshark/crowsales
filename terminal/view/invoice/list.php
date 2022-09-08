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
                                <th>Date</th>
                                <th>Inovice #</th>
                                <th>Qty</th>
                                <th>Amount</th>
                                <th>Paid</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?=SalesInvoices($conn)?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>