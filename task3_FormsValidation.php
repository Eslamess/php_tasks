<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php

$nameErr = $emailErr  = $websiteErr =$passErr=$AddressErr= "";
$name = $email = $website =$password =$Address="";
$empty= ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
   
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";

      $name= $empty;
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $email= $empty;
    }
  }

    if (empty($_POST["password"])) {
    $passErr = "password is required";
  } else {
    $password = test_input($_POST["password"]);
   
    if (strlen($password) < 6) {
      $passErr = "Invalid password it must be >6";
      $password= $empty;
    }
  }


      if (empty($_POST["Address"])) {
    $AddressErr = "password is required";
  } else {
    $Address = test_input($_POST["Address"]);
   
    if (strlen($Address) < 10) {
      $AddressErr = "Invalid address it must be >10 character";
      $Address= $empty;
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";

      $website= $empty;
    }    
  }


}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>


    Password: <input type="text" name="password">
  <span class="error">* <?php echo $passErr;?></span>
  <br><br>


   Address: <input type="text" name="Address">
  <span class="error">* <?php echo $AddressErr;?></span>
  <br><br>


  Website: <input type="text" name="website">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>

 
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo "your name is : ". $name;
echo "<br>";

echo "your email is : ". $email;
echo "<br>";

echo "your password is : ".$password;
echo "<br>";

echo "your address is : " .$Address;
echo    "<br>";
 
echo  "your website url is : " .$website;
echo "<br>";

?>

</body>
</html>
