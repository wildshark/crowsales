<ul>
    <li class="active">
        <a href="index&token=<?=$_GET['token']?>"><img src="assets/img/icons/dashboard.svg" alt="img"><span>
                Dashboard</span> </a>
    </li>
    <li class="submenu">
        <a href="javascript:void(0);"><img src="assets/img/icons/product.svg" alt="img"><span>
                Product</span> <span class="menu-arrow"></span></a>
        <ul>
            <li><a href="?main=productlist&token=<?=$_GET['token']?>">Product List</a></li>
            <li><a href="addproduct&token=<?=$_GET['token']?>">Add Product</a></li>
            <li><a href="categorylist&token=<?=$_GET['token']?>">Category List</a></li>
            <li><a href="addcategory&token=<?=$_GET['token']?>">Add Category</a></li>
            <li><a href="brandlist&token=<?=$_GET['token']?>">Brand List</a></li>
            <li><a href="addbrand&token=<?=$_GET['token']?>">Add Brand</a></li>
            <!--li><a href="importproduct&token=<?=$_GET['token']?>">Import Products</a></li>
            <li><a href="barcode&token=<?=$_GET['token']?>">Print Barcode</a></li-->
        </ul>
    </li>
    <li class="submenu">
        <a href="javascript:void(0);"><img src="assets/img/icons/sales1.svg" alt="img"><span>
                Sales</span> <span class="menu-arrow"></span></a>
        <ul>
            <li><a href="?main=saleslist&token=<?=$_GET['token']?>">Sales List</a></li>
            <li><a href="?main=pos&token=<?=$_GET['token']?>">POS</a></li>
            <li><a href="?main=pos&token=<?=$_GET['token']?>">New Sales</a></li>
            <li><a href="?main=salesreturnlists&token=<?=$_GET['token']?>">Sales Return List</a></li>
            <li><a href="?main=createsalesreturns&token=<?=$_GET['token']?>">New Sales Return</a></li>
        </ul>
    </li>
    <li class="submenu">
        <a href="javascript:void(0);"><img src="assets/img/icons/purchase1.svg" alt="img"><span>
                Purchase</span> <span class="menu-arrow"></span></a>
        <ul>
            <li><a href="?main=purchaselist&token=<?=$_GET['token']?>">Purchase List</a></li>
            <li><a href="?main=addpurchase&token=<?=$_GET['token']?>">Add Purchase</a></li>
        </ul>
    </li>
    <li class="submenu">
        <a href="javascript:void(0);"><img src="assets/img/icons/transfer1.svg" alt="img"><span>
                Transfer</span> <span class="menu-arrow"></span></a>
        <ul>
            <li><a href="?main=transferlist&token=<?=$_GET['token']?>">Transfer List</a></li>
            <li><a href="?main=addtransfer&token=<?=$_GET['token']?>">Add Transfer </a></li>
            <li><a href="?main=importtransfer&token=<?=$_GET['token']?>">Import Transfer </a></li>
        </ul>
    </li>
    <li class="submenu">
        <a href="javascript:void(0);"><img src="assets/img/icons/return1.svg" alt="img"><span>
                Return</span> <span class="menu-arrow"></span></a>
        <ul>
            <li><a href="salesreturnlist&token=<?=$_GET['token']?>">Sales Return List</a></li>
            <li><a href="createsalesreturn&token=<?=$_GET['token']?>">Add Sales Return </a></li>
            <li><a href="purchasereturnlist&token=<?=$_GET['token']?>">Purchase Return List</a></li>
            <li><a href="createpurchasereturn&token=<?=$_GET['token']?>">Add Purchase Return </a></li>
        </ul>
    </li>
    <li class="submenu">
        <a href="javascript:void(0);"><img src="assets/img/icons/users1.svg" alt="img"><span>
                Users & Store</span> <span class="menu-arrow"></span></a>
        <ul>
            <li><a href="?main=userlist&token=<?=$_GET['token']?>">User List</a></li>
            <li><a href="?main=storelist&token=<?=$_GET['token']?>">Store List</a></li>
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