

<?php
// calculate electricity bill



$electricity_bill=150;
$tax=0;
if($electricity_bill <50){
	$tax=3.50;

	$result=$electricity_bill*$tax;

	echo "your electricity_bill is " .  $result;
} 
elseif($electricity_bill >=50 && $electricity_bill <150){
	$tax=4.00;
	$result=$electricity_bill*$tax;

	echo "your electricity_bill is " . $result;
} 
else{

	$tax=6.50;
	$result=$electricity_bill*$tax;

	echo "your electricity_bill is " . $result;

}


