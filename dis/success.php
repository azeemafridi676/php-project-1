<?php
include_once 'api/action.php';

session_start();

// if(!empty($_SESSION['orderId'])) {
//     orderComplete();
// }

if (!empty($_SESSION['formData'])) {
    unset($_SESSION['formData']);
}
if (!empty($_SESSION['data'])) {


    // $_SESSION['bill_city'] = $_SESSION['data']['city'];
    // $_SESSION['bill_state'] = $_SESSION['data']['state'];

    // unset($_SESSION['data']);
}

$productData = array();

$FirstName = $LastName = $ShippingAddress = $ShippingAddress = $Phone = $Email = $orderid = $totalAmountOrder = $totalAmount = '';


//echo '<pre>';
//print_r($_SESSION['orderDetail']);
//echo '</pre>';
//exit;

if (!empty($_SESSION['orderDetail'][0]['productOrderResponse'])) {
    $GLOBALS['orderData'] = $_SESSION['orderDetail'][0]['productOrderResponse'];
    if (!empty($GLOBALS['orderData']->Transaction->CustomerInfo)) {
        $FirstName = $GLOBALS['orderData']->Transaction->CustomerInfo->FirstName;
        $LastName = $GLOBALS['orderData']->Transaction->CustomerInfo->LastName;


        $ShippingAddress = $GLOBALS['orderData']->Transaction->CustomerInfo->ShippingAddress;

        $BillingAddress = $GLOBALS['orderData']->Transaction->CustomerInfo->BillingAddress;

        $Phone = $GLOBALS['orderData']->Transaction->CustomerInfo->Phone;
        $Email = $GLOBALS['orderData']->Transaction->CustomerInfo->Email;
    }
    if (!empty($GLOBALS['orderData']->Transaction->OrderInfo)) {
        $orderId = $GLOBALS['orderData']->Transaction->OrderInfo->OrderID;
        $totalAmountOrder = $GLOBALS['orderData']->Transaction->OrderInfo->TotalAmount;
        if (!empty($GLOBALS['orderData']->Transaction->OrderInfo->Products)) {
            foreach ($GLOBALS['orderData']->Transaction->OrderInfo->Products as $pro) {
                $productData[] = array('productName' => $pro->ProductName, "amount" => $pro->ProductAmount);
            }
            $totalAmount = $GLOBALS['orderData']->Transaction->OrderInfo->TotalAmount;
        }
    }
}



if (!empty($_SESSION['orderDetail'][1]['orderResponse'])) {
    $GLOBALS['orderData'] = $_SESSION['orderDetail'][1]['orderResponse'];
    // $GLOBALS['orderData'] = json_decode($GLOBALS['orderData']);

    if (!empty($GLOBALS['orderData']->Transaction->OrderInfo)) {
        $orderId = $GLOBALS['orderData']->Transaction->OrderInfo->OrderID;
        if (!empty($GLOBALS['orderData']->Transaction->OrderInfo->Products)) {
            foreach ($GLOBALS['orderData']->Transaction->OrderInfo->Products as $pro) {
                $productData[] = array('productName' => $pro->ProductName, "amount" => $pro->ProductAmount);
            }
        }
    }
}
if (!empty($_SESSION['shipping_city'])) {
    $shippingCity = $_SESSION['shipping_city'] . ', ' . $_SESSION['shipping_state'] . ' ' . $_SESSION['shipping_zip_code'];
} else {
    $shippingCity = '';
}


if (!empty($_SESSION['billing_city'])) {
    $billingCity = $_SESSION['billing_city'] . ', ' . $_SESSION['billing_state'] . ' ' . $_SESSION['billing_zip_code'];
} else {
    $billingCity = $shippingCity;
}



$title = 'TryStemLife Success';

?>

<style>
    .top-bar {
        display: none !important;
    }
	table.table {
    width: 100%;
}
</style>



<?php include_once 'header.php'; 
?>

<section style="margin-bottom: 40px; margin-top: 180px;">

    <div class="container">

        <div class="row">

            <div class="col-12 text-center order" style="margin-top: 30px;">

<!-- Convert Experiments conversion tracking -->  <script type="text/javascript">  window._conv_q = window._conv_q || [];  _conv_q.push(["triggerConversion", "10044322"]);  </script> 
                <h2>Order Completed, <?php echo $FirstName ?>. Thank You !</h2>

            </div>


            <div class="col-12 text-center order#" style="margin-top: 20px; margin-bottom:50px">

                <h3>Order # <?php echo $orderId
                            ?> Details</h3>

            </div>

        </div>

    </div>

    <div class="container">

        <div class="row">

            <div class="col-lg-4 col-md-6 col-sm-12">

                <table class="table">

                    <thead class="" style="background: #dff4fd">

                        <tr>

                            <th>Your Information:</th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr>


                            <?php
                            $cardstring = $_SESSION['stringCD'];
                            ?>
                            <td>Card : Visa XXXX XXXX XXXX <?php echo $cardstring
                                                            ?></td>

                        </tr>

                        <tr>

                            <td>Email : <?php echo $Email ?></td>

                        </tr>

                        <tr>

                            <td>Phone : <?php echo $Phone ?></td>

                        </tr>

                    </tbody>

                </table>



            </div>



            <div class="col-lg-4 col-md-6 col-sm-12">
                <table class="table">
                    <thead style="background: #dff4fd">
                        <tr>
                            <th>Billed To:</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>

                            <td><?php echo $FirstName . ' ' . $LastName ?></td>

                        </tr>

                        <tr>

                            <td></strong><?php echo !empty($_SESSION['billing_address']) ? $_SESSION['billing_address'] : $BillingAddress
                                            ?></td>

                        </tr>

                        <tr>

                            <td><?php echo $billingCity ?></td>

                        </tr>

                    </tbody>

                </table>



            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">

                <table class="table">

                    <thead style="background: #dff4fd">

                        <tr>

                            <th>Shipped To:</th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td><?php echo $FirstName . ' ' . $LastName ?></td>

                        </tr>


                        <tr>

                            <td><?php echo !empty($_SESSION['shipping_address']) ? $_SESSION['shipping_address'] : $ShippingAddress ?></td>

                        </tr>
                        <tr>
                            <td><?php echo  $shippingCity ?></td>
                        </tr>

                    </tbody>

                </table>


            </div>

            <div class="col-12">

                <table class="table">

                    <thead style="background: #dff4fd">

                        <tr>

                            <th colspan="3">Product Details:</th>

                        </tr>

                    </thead>

                    <tbody>
                        <?php
                        $totalamount = 0;

                        foreach ($productData as $p) {
                            $totalamount = $totalamount + $p['amount'];

                        ?>
                            <tr>
                                <td>
                                    <h4>Item:</h4>
                                    <p>
                                        <bold><?php echo  $p['productName'] ?></bold>

                                    </p>

                                </td>
                                <td>
                                    <h4>qty:</h4>
                                    <p>
                                        1

                                    </p>

                                </td>
                                <td>

                                    <h4>Price:</h4>

                                    <p>

                                        <bold><?php echo  $p['amount'] ?></bold>

                                    </p>

                                </td>
                            </tr>

                        <?php } ?>




                    </tbody>

                </table>

            </div>

            <div class="col-12">

                <table class="table">

                    <thead style="background: #dff4fd">

                        <tr>

                            <th>Total Purchases :</th>

                            <th></th>

                            <th></th>

                        </tr>

                    </thead>

                    <tfoot style="background: #dff4fd">

                        <tr>

                            <td id="foter"><strong>Total Order :</strong></td>

                            <td></td>

                            <td id="foter"><strong>$<?php echo number_format($totalAmountOrder, 2, ".", ",") ?></strong></td>

                        </tr>

                    </tfoot>

                    <tbody>


                        <tr>

                            <td>Shipping & Processing :</td>

                            <td></td>

                            <td>$0.00</td>

                        </tr>

                        <tr>

                            <td>Tax :</td>

                            <td></td>

                            <td>$0.00</td>

                        </tr>

                    </tbody>

                </table>



            </div>

        </div>

    </div>

</section>


<?php include_once 'footer.php'; 
?>