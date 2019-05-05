<?php
 session_start();
 $page_title = 'Welcome to this Site!';
 
 if(isset($_SESSION['token'])) {
     include('includes/header_in.html');
 }else{
     include('includes/header.html');
 }
 
 include("config.php");
 
 $rows = array();
 $id = $user_id = $_SESSION['userData']['id'];
 $sql = "select image from pets where owner_id=$id";
 $result = mysqli_query($dbc,$sql);
 //$row = mysqli_fetch_array($result);
 while($row = mysqli_fetch_array($result)){ $rows[] = $row;}
 

foreach ($rows as list($a, $b)) {
    // $a contains the first element of the nested array,
    // and $b contains the second element.
    //echo "A: $a; B: $b\n";
    echo("<img style='width:500px;height:600px;' src=".$a.">\n");
}

// foreach ($rows as $v1) {
//     foreach ($v1 as $v2) {
      
//         //echo("<img style='width:500px;height:600px;' src=".$v2.">\n");
//         //echo "$v2\n";
//     }
// }


 // $image_src = $rows['0']['0'];
 // $image_src2 = $rows['1']['0'];
 // echo("Error description: " . mysqli_error($dbc));
 // echo("Selected ID is" .$id);
 // echo('</br>');
 //print_r($rows);
?>



