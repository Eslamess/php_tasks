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
    $name = clear($_POST["name"]);
   
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";

      $name= $empty;
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = clear($_POST["email"]);
  
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $email= $empty;
    }
  }

    if (empty($_POST["password"])) {
    $passErr = "password is required";
  } else {
    $password = clear($_POST["password"]);
   
    if (strlen($password) < 6) {
      $passErr = "Invalid password it must be >6";
      $password= $empty;
    }
  }


      if (empty($_POST["Address"])) {
    $AddressErr = "password is required";
  } else {
    $Address = clear($_POST["Address"]);
   
    if (strlen($Address) < 10) {
      $AddressErr = "Invalid address it must be <10 character";
      $Address= $empty;
    }
  }



  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = clear($_POST["gender"]);
  }

    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = clear($_POST["website"]);

     if (!filter_var($website, FILTER_VALIDATE_URL)) {
      $websiteErr = "Invalid URL";

      $website= $empty;
    }    
  }

   if (!empty($_FILES['cv']['name'])) {

        $cvName    = $_FILES['cv']['name'];
        $cvTemName = $_FILES['cv']['tmp_name'];
        $cvType    = $_FILES['cv']['type'];
        

        # Allowed Extensions 
        $allowedExtensions = ['pdf'];

        $cvArray = explode('/', $cvType);

        # Image Extension ...... 
        $cvExtension = end($cvArray);


        if (in_array($cvExtension, $allowedExtensions)) {

            # IMage New Name ...... 
            $FinalName = time() . rand() . '.' . $cvExtension;

            $disPath = 'uploads/' . $FinalName;


            if (move_uploaded_file($cvTemName, $disPath)) {
                echo 'cv Uploaded Succ ';
            } else {
                echo 'Error try Again';
            }
        } else {
            echo 'InValid Extension .... ';
        }
    } else {
        echo '* cv Required';
    }



}

function clear($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  enctype="multipart/form-data">  
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

 Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <br><br>

  Website: <input type="text" name="website">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>


<label for="exampleInputName">CV : </label>
                <input type="file" name="cv">

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
echo "<br>";
 
echo  "your website url is : " .$website;
echo "<br>";

?>

</body>
</html>