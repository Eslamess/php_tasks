<?php
session_start();






function deleteLineInFile($line)
{
   $i=0;
   $array=array();
   
   $data = fopen("data.txt", "r") or die("can't open the file");
   while(!feof($read)) {
      $array[$i] = fgets($data); 
      ++$i;
   }
   fclose($read);
   
   $write = fopen("data.txt", "w") or die("can't open the file");
   foreach($array as $a) {
      if(!strstr($a,$string)) fwrite($write,$a);
   }
   fclose($write);
}
         


   function deleteAll (){unlink("data.txt");}

?>






<!DOCTYPE HTML>  
<html>
<head>
<style>

</style>
</head>
<body> 
<h1 style="display: inline-block;"><?php echo $_SESSION["titel"] ?></h1>
<button onclick="deleteLineInFile(<?php echo $_SESSION["titel"] ?>)">deleteline</button>
<br>


<p style="display: inline-block;"><?php echo $_SESSION["content"];?></p>
<button onclick="deleteLineInFile(<?php echo $_SESSION["content"] ?>)">deleteline</button>
<br>

<img src="uploads/<?php echo  $_SESSION["FinalName"];?>">
<button onclick="deleteLineInFile(<?php echo $_SESSION["FinalName"] ?>)">deleteline</button>
<br>

<button onclick="deleteAll()">deleteAll</button>


</body>
</html>