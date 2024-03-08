<?php
session_start();

include_once 'config.php';
// include_once 'api/action.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_SESSION['data'])) {

    $cardMonth = '';
    $cardYear = '';
    $cardName = '';


    if(!empty($_POST['cc_expire_date_month_year'])){
      $csvYear = $_POST['cc_expire_date_month_year'];
      $csvYear = explode("/", $csvYear);
      $cardMonth = $csvYear[0];
      $cardYear = $csvYear[1];
    }

    $cardMonth = !empty($cardMonth) ? $cardMonth : $_SESSION['data']['cardMonth'];
    $cardYear = !empty($cardYear) ? $cardYear : $_SESSION['data']['cardYear'];
    $cardYear = !empty($cardYear) ? $cardYear : $_SESSION['data']['cardYear'];
    $cardNumber = !empty($cardNumber) ? $cardNumber : $_SESSION['data']['cc_number'];
    $cardName = !empty($cardName) ? $cardName : $_SESSION['data']['cardName'];
    $cardSecurityCode = !empty($cardSecurityCode) ? $cardSecurityCode : $_SESSION['data']['cc_cvv2'];

    $postData=array("CustomerID"=>$_SESSION['data']['CustomerID'],
        "IpAddress"=>$GLOBALS['IpAddress'],
        "BillingAddress"=>array("FirstName"=>$_SESSION['data']['firstName'],
            "LastName"=>$_SESSION['data']['lastName'],
            "Address1"=>$_SESSION['data']['address'],
            "City"=>$_SESSION['data']['city'],
            "CountryISO"=>"us",
            "State"=>$_SESSION['data']['state'],
            "zipCode"=>$_SESSION['data']['zipCode']
        ),
        "PaymentInformation"=>array("ExpMonth"=>$cardMonth,
            "ExpYear"=>$cardYear,
            "CCNumber"=>$cardNumber,
            "NameOnCard"=>$cardName,
            "CVV"=>$cardSecurityCode,
            "ProcessorID"=>$GLOBALS['FB_US_ProcesserID']
        ));
    $postData["OrderID"]=$_SESSION['orderId'];
    $postData["Products"][]=array("ProductID"=>$GLOBALS['usID']);


    $data=json_encode($postData);

    $curl = curl_init();
    curl_setopt_array($curl,
        array(CURLOPT_URL => $GLOBALS['apiUrl'].'/api/v2/open/orders',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array('Authorization: ApiKey '.$GLOBALS['apiKey'],
                'Idempotency-Key: '.$GLOBALS['IdempotencyKey'].'addOrder',
                'Content-Type: application/json'),));
    $response = curl_exec($curl);
    curl_close($curl);

    unset($_SESSION['formData']);
    unset($_SESSION['data']);
    $cardstring = substr($cardNumber, -4);

    $_SESSION['stringCD']=$cardstring;
    //echo '>>>'.$_SESSION['cardNumber']=$cardNumber;exit;
    $_SESSION['orderDetail'][]=array('orderResponse'=>json_decode($response),'cardNumber'=>$cardNumber);

    echo $response;



}
?>