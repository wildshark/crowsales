<div class="row">
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="dash-widget">
            <div class="dash-widgetimg">
                <span><img src="assets/img/icons/dash1.svg" alt="img"></span>
            </div>
            <div class="dash-widgetcontent">
                <h5><?=$currency?> <span class="counters" data-count="<?=$getTotalPurchase?>"><?=number_format($getTotalPurchase,2)?></span></h5>
                <h6>Total Supply</h6>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="dash-widget dash1">
            <div class="dash-widgetimg">
                <span><img src="assets/img/icons/dash2.svg" alt="img"></span>
            </div>
            <div class="dash-widgetcontent">
                <h5><?=$currency?> <span class="counters" data-count="<?=$getTotalSales?>"><?=number_format($getTotalSales,2)?></span></h5>
                <h6>Total Sales</h6>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="dash-widget dash2">
            <div class="dash-widgetimg">
                <span><img src="assets/img/icons/dash3.svg" alt="img"></span>
            </div>
            <div class="dash-widgetcontent">
                <h5><?=$currency?> <span class="counters" data-count="<?=$getNetProfit?>"><?=number_format($getNetProfit,2)?></span></h5>
                <h6>Total Sale Amount</h6>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="dash-widget dash3">
            <div class="dash-widgetimg">
                <span><img src="assets/img/icons/dash4.svg" alt="img"></span>
            </div>
            <div class="dash-widgetcontent">
                <h5><?=$currency?><span class="counters" data-count="40000.00">400.00</span></h5>
                <h6>Total Sale Amount</h6>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12 d-flex">
        <div class="dash-count">
            <div class="dash-counts">
                <h4><?=number_format($total_sales_amt,2)?></h4>
                <h5>Sales</h5>
            </div>
            <div class="dash-imgs">
                <i data-feather="user"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12 d-flex">
        <div class="dash-count das1">
            <div class="dash-counts">
                <h4><?=number_format($total_supply_amt,2)?></h4>
                <h5>Supply</h5>
            </div>
            <div class="dash-imgs">
                <i data-feather="user-check"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12 d-flex">
        <div class="dash-count das2">
            <div class="dash-counts">
                <h4><?=$total_supply_invoice?></h4>
                <h5>Purchase Invoice</h5>
            </div>
            <div class="dash-imgs">
                <i data-feather="file-text"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12 d-flex">
        <div class="dash-count das3">
            <div class="dash-counts">
                <h4><?=$total_sales_invoice?></h4>
                <h5>Sales Invoice</h5>
            </div>
            <div class="dash-imgs">
                <i data-feather="file"></i>
            </div>
        </div>
    </div>
</div>

<div class="card mb-0">
    <div class="card-body">
        <h4 class="card-title">Expired Products</h4>
        <div class="table-responsive dataview">
            <table class="table datatable ">
                <thead>
                    <tr>
                        <th>SNo</th>
                        <th>Store name</th>
                        <th>Purchase</th>
                        <th>Sales</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <?=DashboardStoreTransaction($getStoreTransaction)?>
                </tbody>
            </table>
        </div>
    </div>
</div>