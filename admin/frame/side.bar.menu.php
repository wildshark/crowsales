<ul>
    <li class="active">
        <a href="?main=dashboard&token=<?=$_GET['token']?>"><img src="assets/img/icons/dashboard.svg" alt="img"><span>
                Dashboard</span> </a>
    </li>
    <li class="submenu">
        <a href="javascript:void(0);"><img src="assets/img/icons/product.svg" alt="img"><span>
                Product</span> <span class="menu-arrow"></span></a>
        <ul>
            <li><a href="?main=product&ui=list&token=<?=$_GET['token']?>">Product List</a></li>
            <li><a href="?main=catagory&ui=list&token=<?=$_GET['token']?>">Category List</a></li>
            <li><a href="?main=brand&ui=list&token=<?=$_GET['token']?>">Brand List</a></li>
            <!--li><a href="importproduct&token=<?=$_GET['token']?>">Import Products</a></li>
            <li><a href="barcode&token=<?=$_GET['token']?>">Print Barcode</a></li-->
        </ul>
    </li>
    <li class="submenu">
        <a href="javascript:void(0);"><img src="assets/img/icons/purchase1.svg" alt="img"><span>
                Purchase</span> <span class="menu-arrow"></span></a>
        <ul>
            <li><a href="?main=purchase&ui=list&token=<?=$_GET['token']?>">Purchase</a></li>
            <li><a href="?main=purchase&ui=purchasebook&token=<?=$_GET['token']?>">Purchase List</a></li>
            <li><a href="?main=purchase&ui=reject&token=<?=$_GET['token']?>">Purchase Reject</a></li>
            <li><a href="?main=purchase&ui=rejectlist&token=<?=$_GET['token']?>">Purchase Return List</a></li>
        </ul>
    </li>
    <li class="submenu">
        <a href="javascript:void(0);"><img src="assets/img/icons/sales1.svg" alt="img"><span>
                Sales</span> <span class="menu-arrow"></span></a>
        <ul>
            <li><a href="?main=sales&ui=list&token=<?=$_GET['token']?>">Invoices</a></li>
            <li><a href="?main=sales&ui=salesbook&token=<?=$_GET['token']?>">Sales List</a></li>
            <li><a href="?main=sales&ui=reject&token=<?=$_GET['token']?>">Return Item</a></li>
            <li><a href="?main=sales&ui=rejectlist&token=<?=$_GET['token']?>">Sales Return List</a></li>
            <!--li><a href="?main=pos&token=<?=$_GET['token']?>">POS</a></li-->
            <!--li><a href="?main=pos&token=<?=$_GET['token']?>">New Sales</a></li-->
            <!--li><a href="?main=createsalesreturns&token=<?=$_GET['token']?>">New Sales Return</a></li-->
        </ul>
    </li>
    <li class="submenu">
        <a href="javascript:void(0);"><img src="assets/img/icons/transfer1.svg" alt="img"><span>
                Transfer</span> <span class="menu-arrow"></span></a>
        <ul>
            <li><a href="?main=transfer&ui=list&token=<?=$_GET['token']?>">Transfer List</a></li>
            <li><a href="?main=addtransfer&token=<?=$_GET['token']?>">Add Transfer </a></li>
            <li><a href="?main=importtransfer&token=<?=$_GET['token']?>">Import Transfer </a></li>
        </ul>
    </li>
    <li class="submenu">
        <a href="javascript:void(0);"><img src="assets/img/icons/purchase1.svg" alt="img"><span>
            Inventories</span> <span class="menu-arrow"></span></a>
        <ul>
            <li><a href="?main=inventory&frm=store&ui=store-main&token=<?=$_GET['token']?>">Store</a></li>
            <li><a href="?main=inventory&frm=stock&ui=stock&token=<?=$_GET['token']?>">Stock</a></li>
        </ul>
    </li>
    <li class="submenu">
        <a href="javascript:void(0);"><img src="assets/img/icons/users1.svg" alt="img"><span>
                Users & Store</span> <span class="menu-arrow"></span></a>
        <ul>
            <li><a href="?main=user&ui=list&token=<?=$_GET['token']?>">User List</a></li>
            <li><a href="?main=store&ui=list&token=<?=$_GET['token']?>">Store List</a></li>
        </ul>
    </li>
    <li class="submenu">
        <a href="javascript:void(0);"><img src="assets/img/icons/time.svg" alt="img"><span>
                Report</span> <span class="menu-arrow"></span></a>
        <ul>
            <li><a href="purchaseorderreport&token=<?=$_GET['token']?>">Purchase order report</a></li>
            <li><a href="inventoryreport&token=<?=$_GET['token']?>">Inventory Report</a></li>
            <li><a href="salesreport&token=<?=$_GET['token']?>">Sales Report</a></li>
            <li><a href="invoicereport&token=<?=$_GET['token']?>">Invoice Report</a></li>
            <li><a href="purchasereport&token=<?=$_GET['token']?>">Purchase Report</a></li>
            <li><a href="supplierreport&token=<?=$_GET['token']?>">Supplier Report</a></li>
            <li><a href="customerreport&token=<?=$_GET['token']?>">Customer Report</a></li>
        </ul>
    </li>
</ul>