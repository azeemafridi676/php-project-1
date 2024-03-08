<?php


include_once 'config.php';
include_once 'action.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_SESSION['data']) || strpos($_SERVER['REQUEST_URI'], 'prodId=34569')) {

    $cardMonth = '';
    $cardYear = '';
    $cardName = '';


    

    $cardMonth = !empty($cardMonth) ? $cardMonth : $_SESSION['data']['cardMonth'];
    $cardYear = !empty($cardYear) ? $cardYear : $_SESSION['data']['cardYear'];
    $cardYear = !empty($cardYear) ? $cardYear : $_SESSION['data']['cardYear'];
    $cardNumber = !empty($cardNumber) ? $cardNumber : $_SESSION['data']['cc_number'];
    $cardName = !empty($cardName) ? $cardName : $_SESSION['data']['cardName'];
    $cardSecurityCode = !empty($cardSecurityCode) ? $cardSecurityCode : $_SESSION['data']['cc_cvv2'];

    $postData=array("CustomerID"=>$_SESSION['data']['CustomerID'],
        "IpAddress"=>$GLOBALS['IpAddress'],
        "BillingAddress"=>array("FirstName"=>$_SESSION['address_data']['firstName'],
            "LastName"=>$_SESSION['address_data']['lastName'],
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
            "CVV"=>$cardSecurityCode
            
        ));
  
    $postData["Products"][]=array("ProductID"=>34569);


    $data=json_encode($postData);
    $IdempotencyKey = $GLOBALS['IdempotencyKey'] . "_1";
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
                'Idempotency-Key: '.$IdempotencyKey.'addOrder',
                'Content-Type: application/json'),));
    $response = curl_exec($curl);
    curl_close($curl);
    $responseSession = json_decode($response);
    
    $cardstring = substr($cardNumber, -4);

    $_SESSION['stringCD']=$cardstring;
    $_SESSION['orderDetail'][]=array('orderResponse'=>json_decode($response),'cardNumber'=>$cardNumber);
    $_SESSION['orderId'] = $responseSession->Transaction->OrderInfo->OrderID;
}
// logToFile2(orderComplete());   
// logToFile2($postData);
// logToFile2($response);

// function logToFile2($var)
// {
//     ob_flush();
//     ob_start();
//     var_dump($var);
//     $bufferContents = ob_get_contents();
//     ob_end_clean();
//     file_put_contents("LogsUpsellStd.txt", $bufferContents, FILE_APPEND);
// }