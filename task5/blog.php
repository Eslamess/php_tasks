<?php
session_start();

function deleteline($line){
$data = fopen("data.txt", "r") or die("can't open the file");
$content = file_get_contents('data.txt');
$content = str_replace($line, '', $content);
file_put_contents('data.txt', $content);
};

?>

<!DOCTYPE HTML>  
<html>
<head>
<style>

</style>
</head>
<body> 

<form >
<h1 style="display: inline-block;"><?php echo $_SESSION["titel"] ?></h1>


<button type="submit" onclick="<?php deleteline( $_SESSION['titel'])?>">
deleteline</button>
<br>


<p style="display: inline-block;"><?php echo $_SESSION["content"];?></p>

<button type="submit"  onclick="deleteline( $_SESSION['content'])">deleteline</button>
<br>

<img width="100px" height="100px" src="uploads/<?php echo  $_SESSION["FinalName"];?>">
<button onclick="deleteline( $_SESSION['FinalName'])">deleteline</button>
<br>

</form>
</body>
</html>
