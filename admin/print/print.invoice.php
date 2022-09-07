<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="print/images/favicon.png" rel="icon">
    <title>General Invoice - Koice</title>
    <meta name="author" content="harnishdesign.net">

    <!-- Web Fonts
======================= -->
    <link rel='stylesheet' href='print/css.css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

    <!-- Stylesheet
======================= -->
    <link rel="stylesheet" type="text/css" href="print/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="print/vendor/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="print/css/stylesheet.css">
</head>

<body>
    <!-- Container -->
    <div class="container-fluid invoice-container">
        <!-- Header -->
        <header>
            <div class="row align-items-center">
                <div class="col-sm-7 text-center text-sm-start mb-3 mb-sm-0">
                    <img id="logo" src="print/images/logo.png" title="Koice" alt="Koice">
                </div>
                <div class="col-sm-5 text-center text-sm-end">
                    <h4 class="text-7 mb-0">Invoice</h4>
                </div>
            </div>
            <hr>
        </header>

        <!-- Main Content -->
        <main>
            <div class="row">
                <div class="col-sm-6"><strong>Date:</strong> <?=date("d/m/Y",strtotime($inv['invo_date']))?></div>
                <div class="col-sm-6 text-sm-end"> <strong>Invoice No:</strong> <?=$inv['ref']?></div>

            </div>
            <hr>
            <div class="row">
                <div class="col-sm-6 text-sm-end order-sm-1"> <strong>Pay To:</strong>
                    
                    <address>
                        Smith Rhodes<br>
                        15 Hodges Mews, High Wycombe<br>
                        HP12 3JL<br>
                        United Kingdom
                    </address>
                </div>
                <div class="col-sm-6 order-sm-0"> <strong>Invoiced To:</strong>
                    <address>
                        <?=$inv['details']?>   
                    </address> 
                </div>
            </div>

            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="card-header">
                                <tr>
                                    <td class="col-3"><strong>Sku</strong></td>
                                    <td class="col-4"><strong>Description</strong></td>
                                    <td class="col-2 text-center"><strong>Price</strong></td>
                                    <td class="col-1 text-center"><strong>Qty</strong></td>
                                    <td class="col-2 text-end"><strong>Amount</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if($data == false){
                                        echo "";
                                    }else{
                                        foreach($data as $r){
                                            if(!isset($n)){
                                                $n = 1;
                                            }else{
                                                $n = $n + 1;
                                            }
                                            $id = $r['tran_id'];
                                            $sku = $r['product_sku'];
                                            $product = $r['product_name'];
                                            $price = number_format($r['price'],2);
                                            $qty = $r['sold'];
                                            $discount = 0;
                                            $tax = 0;
                                            $amount = number_format($r['amt'],2);
                                            echo "
                                                <tr>
                                                    <td class='col-3'>$sku</td>
                                                    <td class='col-4 text-1'>$product</td>
                                                    <td class='col-2 text-center'>$price</td>
                                                    <td class='col-1 text-center'>$qty</td>
                                                    <td class='col-2 text-end'>$amount</td>
                                                </tr>
                                            ";
                                        
                                        }
                                    }
                                ?>                            
                            </tbody>
                            <tfoot class="card-footer">
                                <tr>
                                    <td colspan="4" class="text-end"><strong>Sub Total:</strong></td>
                                    <td class="text-end"><?=number_format($inv['subtotal'],2)?></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-end"><strong>Discount:</strong></td>
                                    <td class="text-end"><?=number_format($inv['discount'],2)?></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-end"><strong>Tax:</strong></td>
                                    <td class="text-end"><?=number_format($inv['tax'],2)?></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-end border-bottom-0"><strong>Total:</strong></td>
                                    <td class="text-end border-bottom-0"><?=number_format($inv['amount'],2)?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <!-- Footer -->
        <footer class="text-center mt-4">
            <p class="text-1"><strong>NOTE :</strong> This is computer generated receipt and does not require physical
                signature.</p>
            <div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()"
                    class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-print"></i> Print</a> <a
                    href="" class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-download"></i>
                    Download</a> </div>
        </footer>
    </div>
</body>

</html>