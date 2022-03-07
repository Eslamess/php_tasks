<?php

function theNextChar($character){
	
	if($character=='z'){
	
	echo  "the next character is :  " . chr((((ord($character) - 97) + 1) % 26) + 97);
		
	} 
	elseif ($character=='Z') {
		echo  "the next character is :  " . chr((((ord($character) - 65) + 1) % 26) + 65);
	}


	else
	{

		$ascii=bin2hex($character);
		$ascii++;

		$after_Convert = hex2bin($ascii);
			echo "the next character is : " . $after_Convert;

	}
}

echo theNextChar('z');


?>