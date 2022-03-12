<?php
session_start();


$titleErr = $contentErr  = $imgErr= "";
$title = $content = $img = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["title"])) {
    $titleErr = "title is required";
  } else {
    $title = clear($_POST["title"]);
  
   if (!preg_match("/^[a-zA-Z-' ]*$/",$title)) {
  $titleErr = "Only letters and white space allowed";


  
    }
  }
  
  if (empty($_POST["content"])) {
    $contentErr = "content is required";
  } else {
    $content = clear($_POST["content"]);

  
    if (strlen($content)<50) {
	      $emailErr = "Invalid content lenght";
	   
	    }
	}

  

   
	   if (!empty($_FILES['img']['name'])) {

	        $imgName    = $_FILES['img']['name'];
	        $imgTemName = $_FILES['img']['tmp_name'];
	        $imgType    = $_FILES['img']['type'];
	        $imgSize    = $_FILES['img']['size'];

	        # Allowed Extensions 
	        $allowedExtensions = ['jpg','png'];

	        $imgArray = explode('/', $imgType);

	        # Image Extension ...... 
	        $imageExtension = end($imgArray);
	  
	 
	   if (in_array($imageExtension, $allowedExtensions)) {

            # IMage New Name ...... 
            $FinalName = time() . rand() . '.' . $imageExtension;

            $disPath = 'uploads/' . $FinalName;

            echo $_SESSION["FinalName"]= $FinalName;
            if (move_uploaded_file($imgTemName, $disPath)) {
                echo 'Image Uploaded Succ ';
            } else {
                echo 'Error try Again';
            }
        } else {
            echo 'InValid Extension .... ';
        }
    } else {
        echo '* Image Required';
    }

	if(($titleErr ==" ") || ($contentErr == " ") ||( $imgErr== "")){

	$file = fopen('data.txt','w') or die("unable to open file ");

	$text =  "title :". $title . "\n" . "content :" . $content . "\n" ."image :" . $FinalName. " \n";    // \t 


	fwrite($file,$text);

	fclose($file);
	}







    
}




function clear($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">  
 

  title: <input type="text" name="title">
  <span class="error">* <?php echo $titleErr;?></span>
  <br><br>
 
  content: <input type="text" name="content">
  <span class="error">* <?php echo $contentErr;?></span>
  <br><br>


    image: <input type="file" name="img">
  <span class="error">* <?php echo $imgErr;?></span>
  <br><br>


  <input type="submit" name="submit" value="Submit">  
</form>

<?php

$_SESSION["titel"] = $title;
$_SESSION["content"] = $content;
$_SESSION["img"]=$img;

?>

</body>
</html>




<?php

/*

title [ requreid , string]
content [ required , lenght > 50   ] 
image  [required , file ] 

save data txt , display blog data , button delete 

*/





?>

