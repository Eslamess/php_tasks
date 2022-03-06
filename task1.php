

<?php
// calculate electricity bill



$electricity_bill=150;

if($electricity_bill <50){

	echo "3.50/unit";
} 
elseif($electricity_bill >=50 && $electricity_bill <150){

	echo "4.00/unit";
} 
else{

	echo "6.50/unit";

}

