<?php
$array = array(
			"Company Name",
"Display Name",
"Address1",
"Address2",
"City",
"State",
"Zipcode",
"Country",
"Billing Address1",
"Billing Address2",
"Billing City",
"Billing State",
"Billing Zipcode",
"Contact Row",
"Logo",
"Disclaimer"
			);
$arr  = array();
foreach($array as $row=>$val){
	$val	=	 strtolower($val);
	$val	=	 str_replace(" ","_",$val);
	echo $val.":'{{objectId()}}',<br/>";
	//$arr[]	=	 $val;

}
//echo "<pre>"; print_r($arr);
//echo json_encode($array);
?>