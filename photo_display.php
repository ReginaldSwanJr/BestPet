<?php
 session_start();
 $page_title = 'Welcome to this Site!';
 include('includes/header.html');
 include("config.php");
 
 $rows = array();
 $id = $user_id = $_SESSION['userData']['id'];
 $sql = "select image from pets where owner_id=$id";
 $result = mysqli_query($dbc,$sql);
 //$row = mysqli_fetch_array($result);
 while($row = mysqli_fetch_array($result)){ $rows[] = $row;}


 $image_src = $rows['0']['0'];
 $image_src2 = $rows['1']['0'];
 echo("Error description: " . mysqli_error($dbc));
 echo("Selected ID is" .$id);
 echo('</br>');
 //print_r($rows);
?>
<img src='<?php echo $image_src; ?>' style="width:500px;height:600px;">
<img src='<?php echo $image_src2; ?>' style="width:500px;height:600px;">

<code>
 
 $rows = array();
$result = mysqli_query($connection, "select university from universities_alpha");
while($row = mysqli_fetch_array($result)) $rows[] = $row;
print_r($rows);
</code>

