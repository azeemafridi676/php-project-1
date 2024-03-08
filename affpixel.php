<?PHP 
$cfile = basename($_SERVER['PHP_SELF']);


if($cfile == 'success.php' && isset($orderId)){
	$clickid = $_SESSION['clickid'];
	$subs = $_GET['subs'];
	
?>

<iframe src="https://cvrdomain.com/l/con?cbiframe=1&oid=83496&clickid=<?PHP echo $clickid; ?>&cbtid=&saleamount=" scrolling="no" frameborder="0" width="1" height="1" loading="eager"></iframe>    
<?PHP 

}
?>