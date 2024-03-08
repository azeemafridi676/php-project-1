<?php
include_once 'config.php';
include_once 'action.php';

session_start();
$_SESSION['data'] = $_POST;
$_SESSION['address_data'] = $_POST;
try {

    authUser();
} catch (Exception $e) {
    // Exception handling code
  
    // Example: Displaying the error message
    echo "An exception occurred: " . $e->getMessage();exit;
  }

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if ($_POST['inlineRadioOptions'] == 'no') {
    $_SESSION['data']['address'] = $_POST['billing_address'];
    $_SESSION['data']['address2'] = $_POST['billing_address_2'];
    $_SESSION['data']['city'] = $_POST['billing_city'];
    $_SESSION['data']['state'] = $_POST['billing_state'];
    $_SESSION['data']['zipCode'] = $_POST['billing_zip_code'];
}
else
{
    $_SESSION['data']['address'] = $_POST['address'];
    $_SESSION['data']['address2'] = '';
    $_SESSION['data']['city'] = $_POST['city'];
    $_SESSION['data']['state'] = $_POST['state'];
    $_SESSION['data']['zipCode'] = $_POST['zipCode'];
}
$csvYear = $_POST['cc_expire_date_month_year'];
$cardName = $_POST['cardName'];
$cc_cvv2 = $_POST['cc_cvv2'];

$_POST['cc_number'] = str_replace(' ', '', $_POST['cc_number']);
$_POST['cc_number'] = str_replace('-', '', $_POST['cc_number']);

$csvYear = explode("/", $csvYear);
$cardMonth = $csvYear[0];
$cardYear = $csvYear[1];
$_SESSION['data']['cardMonth'] = $cardMonth;
$_SESSION['data']['cardYear'] = $cardYear;
$_SESSION['data']['cardName'] = $cardName;
$_SESSION['data']['cc_number'] = $_POST['cc_number'];
$_SESSION['data']['cc_cvv2'] = $cc_cvv2;
$GLOBALS['productID'] = isset($_POST['productId'])?$_POST['productId']:$GLOBALS['productID'];
// "CustomerID": 14832100,
$postData = '{
        "CustomerID": '.$_SESSION['data']['CustomerID'].',
        "IpAddress": "' . $GLOBALS['IpAddress'] . '",
        "ShippingAddress": {
            "FirstName": "' . $_POST['firstName'] . '",
            "LastName": "' . $_POST['lastName'] . '",
            "Address1": "' . $_POST['address'] . '",
            "Address2": "' . $_POST['address'] . '",
            "City": "' . $_POST['city'] . '",
            "CountryISO": "us",
            "State": "' . $_POST['state'] . '",
            "ZipCode":"' . $_POST['zipCode'] . '"
        },
        "BillingAddress": {
                "FirstName": "' . $_POST['firstName'] . '",
                "LastName": "' . $_POST['lastName'] . '",
                "Address1": "' . $_SESSION['data']['address'] . '",
                "Address2": "' . $_SESSION['data']['address2'] . '",
                "City": "' . $_SESSION['data']['city'] . '",
                "CountryISO": "us",
                "State": "' . $_SESSION['data']['state'] . '",
                "ZipCode":"' . $_SESSION['data']['zipCode'] . '"
        },
        "PaymentInformation": {
            "ExpMonth": ' . $cardMonth . ',
            "ExpYear": ' . $cardYear . ',
            "CCNumber": ' . $_POST['cc_number'] . ',
            "NameOnCard": "' . $_POST['cardName'] . '",
            "CVV": ' . $_POST['cc_cvv2'] . ',
            
        },
        "Products": [
            {
                "ProductID": ' . $GLOBALS['productID'] . '        
            }
        ]
    }';
 


$curl = curl_init();
curl_setopt_array(
    $curl,
    array(
        CURLOPT_URL => $GLOBALS['apiUrl'] . '/api/v2/open/orders',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $postData,
        CURLOPT_HTTPHEADER => array(
            'Authorization: ApiKey ' . $GLOBALS['apiKey'],
            'Idempotency-Key: ' . $GLOBALS['IdempotencyKey'] . 'addOrder',
            'Content-Type: application/json'
        ),
    )
);
$response = curl_exec($curl);
curl_close($curl);
$_SESSION['orderDetails'] = $response;

$responseSession = json_decode($response);

unset($_SESSION['orderDetail']);
$_SESSION['orderDetail'][] = array('productOrderResponse' => $responseSession);
$_SESSION['orderId'] = $responseSession->Transaction->OrderInfo->OrderID;

// header('Location: https://host.hbnsupport.com/~tryrevoltcbd/success.php');
// $response = json_decode($response);
// $responseN = json_encode($response);
// echo "<script> console.log($response); </script>";

echo $response;

 
