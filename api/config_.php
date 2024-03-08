<?php





$GLOBALS['IdempotencyKey'] = uniqid('HBN_');
$GLOBALS['IdempotencyKeyForOrderCompletion'] = uniqid('HBN_')."df2X";
$GLOBALS['apiUrl'] = 'https://openapi.responsecrm.com';
$GLOBALS['apiKey'] = 'sk_blelMr0uooplR45QIaSmTWFl';


if(!empty($_GET['siteID'])){
$GLOBALS['siteId'] = $_GET['siteID'];	
}
else{
$GLOBALS['siteId'] = '1008313';
}


 


$GLOBALS['productID'] = '34171';
$GLOBALS['usID'] = 34569;


// double product upsell popup modal yes/no.
// the modal will be shown if below variable is set to yes other wise it will not be shown
$GLOBALS['PopupModal'] = 'no'; // 'yes';


// subscribe and save products ID's


$GLOBALS['subscribeAndSaveProduct1'] = '34174';
$GLOBALS['subscribeAndSaveProduct2'] = '34175';
$GLOBALS['subscribeAndSaveProduct3'] = '34176';


// doubling product quantity upsell products ID's.


$GLOBALS['doubleProductUpsell_ID_1'] = '34734';
$GLOBALS['doubleProductUpsell_ID_2'] = '34735';
$GLOBALS['doubleProductUpsell_ID_3'] = '34736';


$GLOBALS['doubleProductUpsell_Price_1'] = 138.08;
$GLOBALS['doubleProductUpsell_Price_2'] = 178.92;
$GLOBALS['doubleProductUpsell_Price_3'] = 247.70;
$productsInfo = array(
    '34734' =>
    array(
      "name"=> "Double Strength Revolt CBD Buy 1 Get 1 Free",
      "amount"=> 138.08
    ),
    "34735" =>
    array(
      "name"=> "Double Strength Revolt CBD Buy 2 Get 1 Free",
      "amount"=> 178.92
    ),
    "34736" =>
    array(
      "name"=> "Double Strength Revolt CBD Buy 3 Get 2 Free",
      "amount"=> 247.70
    ));




$GLOBALS['IpAddress'] = $_SERVER['REMOTE_ADDR'];
$GLOBALS['requestUri'] = 'https://tryrevoltcbd.com';
$GLOBALS['youTubeVideo_1'] = "https://www.youtube.com/embed/VTVRiZRPhYM?autoplay=0";
$GLOBALS['youTubeVideo_2'] = "https://www.youtube.com/embed/mZwazU3hoEQ?autoplay=0";
$GLOBALS['youTubeVideo_3'] = "https://www.youtube.com/embed/FpAP6ekqchU?autoplay=0";
$GLOBALS['youTubeVideo_main'] = "https://www.youtube.com/embed/QAQYOj4kMKw?autoplay=0";


$GLOBALS['states']  = array(
    'AL' => "Alabama",
    'AK' => "Alaska",
    'AZ' => "Arizona",
    'AR' => "Arkansas",
    'CA' => "California",
    'CO' => "Colorado",
    'CT' => "Connecticut",
    'DE' => "Delaware",
    'DC' => "District Of Columbia",
    'FL' => "Florida",
    'GA' => "Georgia",
    'HI' => "Hawaii",
    'ID' => "Idaho",
    'IL' => "Illinois",
    'IN' => "Indiana",
    'IA' => "Iowa",
    'KS' => "Kansas",
    'KY' => "Kentucky",
    'LA' => "Louisiana",
    'ME' => "Maine",
    'MD' => "Maryland",
    'MA' => "Massachusetts",
    'MI' => "Michigan",
    'MN' => "Minnesota",
    'MS' => "Mississippi",
    'MO' => "Missouri",
    'MT' => "Montana",
    'NE' => "Nebraska",
    'NV' => "Nevada",
    'NH' => "New Hampshire",
    'NJ' => "New Jersey",
    'NM' => "New Mexico",
    'NY' => "New York",
    'NC' => "North Carolina",
    'ND' => "North Dakota",
    'OH' => "Ohio",
    'OK' => "Oklahoma",
    'OR' => "Oregon",
    'PA' => "Pennsylvania",
    'RI' => "Rhode Island",
    'SC' => "South Carolina",
    'SD' => "South Dakota",
    'TN' => "Tennessee",
    'TX' => "Texas",
    'UT' => "Utah",
    'VT' => "Vermont",
    'VA' => "Virginia",
    'WA' => "Washington",
    'WV' => "West Virginia",
    'WI' => "Wisconsin",
    'WY' => "Wyoming"
);

class Product {
    public $ProductName;
    public $Quantity;
    public $ProductAmount;
    
    // Constructor
    public function __construct($productName, $amount) {
        $this->ProductName = $productName;
        $this->ProductAmount = $amount;
        $this->Quantity = 1;
    }
}
class OrderDetail {
    public $Products = array();
    public function __construct($products) {
        foreach ($products as $product) {
            $this->Products[] = new Product($product['name'] , $product['amount']);
        }
    }
}