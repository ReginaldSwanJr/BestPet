<?php
session_start();
include("config.php");

if(isset($_POST['but_upload'])){
 
  $name = $_FILES['file']['name'];
  $target_dir = "upload/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
 
    // Convert to base64 
    $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
    $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
    $pet_name = $_POST['pet_name'];
    $user_id = $_SESSION['userData']['id'];
    // Insert record
    //$query = "insert into images(image) values('".$image."')";
    $query = "INSERT INTO `pets`(`pet_name`, `image`, `owner_id`) VALUES ('".$pet_name."','".$image."','$user_id')";
    mysqli_query($dbc,$query);
  
    // Upload file
    move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
  }
 
}
?>

<form method="post" action="" enctype='multipart/form-data'>
  <input type ='text' name='pet_name' id='pet_name' value='Pet Name'>
  <input type='file' name='file' />
  <input type='submit' value='Save pet' name='but_upload'>
</form>