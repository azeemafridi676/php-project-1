<?php
$GLOBALS['IdempotencyKey'] = uniqid('HBN_');
$GLOBALS['apiUrl'] = 'https://openapi.responsecrm.com';
$GLOBALS['apiKey'] = 'sk_blelMr0uooplR45QIaSmTWFl';

$siteID = $_GET['siteID'];
if(isset($siteID)){
$GLOBALS['siteId'] = $siteID;	
}
else{
$GLOBALS['siteId'] = '1008313';
}

 

$GLOBALS['productID'] = '34171';
 


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
