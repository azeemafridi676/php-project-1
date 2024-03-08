<?php
session_start();
include_once 'api/action.php';


if (!empty($_SESSION['formData'])) {
    unset($_SESSION['formData']);
}

$productData = array();

$FirstName = $LastName = $ShippingAddress = $ShippingAddress = $Phone = $Email = $orderid = $totalAmountOrder = $totalAmount = '';


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
function getTruncatedCCNumber($ccNum)
{
    $last4Digits    = preg_replace("#(.*?)(\d{4})$#", "$2", $ccNum);
    $firstDigits    = preg_replace("#(.*?)(\d{4})$#", "$1", $ccNum);
    return preg_replace("#(\d)#", "*", $firstDigits) . $last4Digits;
}

?>

<style>
    .top-bar {
        display: none !important;
    }

    table.table {
        width: 100%;
    }
</style>



<?php
include_once 'header.php';
if (strpos($_SERVER['REQUEST_URI'], 'prodId=34569') !== false) {
    include_once 'api/addUpsell.php';
    if (isset($_SESSION['upsellDoubleProductID'])) {
        /*
            we have three different product ids for subscribe and save. we check which product the user purchased and also accepted the upsell modal for doubling the product. we set the session variable based on that, that will be used in upsell api.
        */
        
        $UpsellProdId = NULL;
        if ($_SESSION['upsellDoubleProductID'] == $GLOBALS['subscribeAndSaveProduct1']) {
            $UpsellProdId = $GLOBALS['doubleProductUpsell_ID_1'];
        } elseif ($_SESSION['upsellDoubleProductID'] == $GLOBALS['subscribeAndSaveProduct2']) {
            $UpsellProdId = $GLOBALS['doubleProductUpsell_ID_2'];
        } elseif ($_SESSION['upsellDoubleProductID'] == $GLOBALS['subscribeAndSaveProduct3']) {
            $UpsellProdId = $GLOBALS['doubleProductUpsell_ID_3'];
        }
        $_SESSION['UpsellProdId'] = $UpsellProdId;
        $tempOrder = new OrderDetail(array($productsInfo[$UpsellProdId]));
        // var_dump($order);die;
        $_SESSION['orderDetail'][] = $tempOrder;
    }
}
?>

<section style="margin-bottom: 40px; margin-top: 180px;">

    <div class="container">

        <div class="row">

            <div class="col-12 text-center order" style="margin-top: 30px;">

                <!-- Convert Experiments conversion tracking -->
                <script type="text/javascript">
                    window._conv_q = window._conv_q || [];
                    _conv_q.push(["triggerConversion", "10044322"]);
                </script>
                <h2>Order Completed,
                    <?php echo $FirstName ?>. Thank You !
                </h2>

            </div>


            <div class="col-12 text-center order#" style="margin-top: 20px; margin-bottom:50px; font-size:16px">

                <h3>Order #
                    <?php echo $orderId
                    ?> Details
                </h3>

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
                            $cardstring = isset($_SESSION['data']['cc_number']) ? getTruncatedCCNumber($_SESSION['data']['cc_number']) : '';
                            ?>
                            <td>Card :

                                <?php
                                if (!empty($cardstring)) {
                                    // Format the credit card number with spaces
                                    $formattedCardNumber = substr_replace($cardstring, ' ', 4, 0);
                                    $formattedCardNumber = substr_replace($formattedCardNumber, ' ', 9, 0);
                                    $formattedCardNumber = substr_replace($formattedCardNumber, ' ', 14, 0);

                                    echo getTruncatedCCNumber($formattedCardNumber);
                                } else {
                                    echo 'XXXX XXXX XXXX XXXX';
                                }

                                ?>

                            </td>

                        </tr>

                        <tr>

                            <td>Email :
                                <?php echo $Email ?>
                            </td>

                        </tr>

                        <tr>

                            <td>Phone :
                                <?php echo $Phone ?>
                            </td>

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

                            <td>
                                <?php echo $FirstName . ' ' . $LastName ?>
                            </td>

                        </tr>

                        <tr>

                            <td></strong>
                                <?php echo !empty($_SESSION['billing_address']) ? $_SESSION['billing_address'] : $BillingAddress
                                ?>
                            </td>

                        </tr>

                        <tr>

                            <td>
                                <?php echo $billingCity ?>
                            </td>

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

                            <td>
                                <?php echo $FirstName . ' ' . $LastName ?>
                            </td>

                        </tr>


                        <tr>

                            <td>
                                <?php echo !empty($_SESSION['shipping_address']) ? $_SESSION['shipping_address'] : $ShippingAddress ?>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <?php echo $shippingCity ?>
                            </td>
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
                        <tr>
                            <td>
                                <h4>Item:</h4>
                            </td>
                            <td>
                                <h4>qty:</h4>

                            </td>
                            <td>

                                <h4>Price:</h4>


                            </td>
                        </tr>
                        <?php

                        $totalAmount = 0; // Initialize total amount

                        // Iterate through orderDetail array
                        // var_dump($_SESSION['orderDetail']);die;
                        foreach ($_SESSION['orderDetail'] as $order) {
                            // Extract order responses
                            if (is_object($order)) {
                                $orderResponse = $order;
                            } else if (isset($order['productOrderResponse'])) {
                                $orderResponse = $order['productOrderResponse'];
                            } else if (isset($order['orderResponse'])) {
                                $orderResponse = $order['orderResponse'];
                            }
                            if (isset($orderResponse->Transaction)) {
                                $orderResponse = $orderResponse->Transaction->OrderInfo;
                            }

                            // Extract product details
                            $products = $orderResponse->Products;

                            // Print product details
                            foreach ($products as $product) {

                        ?>

                                <tr>
                                    <td>
                                        <p>
                                            <?php
                                            echo $product->ProductName

                                            ?>
                                        </p>

                                    </td>
                                    <td>
                                        <p>
                                            <?php
                                            echo $product->Quantity;
                                            ?>
                                        </p>

                                    </td>
                                    <td>


                                        <p>

                                            <?php
                                            echo $product->ProductAmount;
                                            ?>

                                        </p>

                                    </td>
                                </tr>

                        <?php

                                // Sum up product amounts
                                $totalAmount += $product->ProductAmount;
                            }
                        }
                        ?>




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

                            <td id="foter" class="total">
                                <strong>
                                    <?php

                                    echo $totalAmount;


                                    ?>
                                </strong>
                            </td>

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
if (strpos($_SERVER['REQUEST_URI'], 'prodId=34569') !== false) {
    /*
    double product upsell: the file will be only included if above url condition is true AND also if the session variable for checking double product upsell is set. if its true then another upsell order is initiated and fulfilled.
    */

    if (isset($_SESSION['upsellDoubleProductID'])) {
        include_once 'api/addUpsellDoubleProduct.php';
    }
}
session_destroy();
?>