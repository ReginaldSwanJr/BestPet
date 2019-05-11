<?php
include("config.php");

if (isset($_POST['rightpet'])) {
    $upvote = $_POST['pet2_id'];
    $downvote = $_POST['pet1_id'];
} else {
    $upvote = $_POST['pet1_id'];
    $downvote = $_POST['pet2_id'];
}

//pull comments
 if (!empty ( $_POST['pet1_textarea'])) {
        $comment1 = $_POST['pet1_textarea'];
        $c1 = TRUE;
    } else{ $c1 = FALSE;}
        
  if (!empty ( $_POST['pet2_textarea'])) {
        $comment2 = $_POST['pet2_textarea'];
        $c2 = TRUE;
    } else{ $c2 = FALSE;}

//sql for upvotes
$sql1 ="UPDATE pets SET upvote = upvote + 1 where id = $upvote"; 
$sql2 ="UPDATE pets SET downvote = downvote + 1 where id = $downvote";

//sql to set score
$score1 = "UPDATE pets set score = ((upvote-downvote)- DATEDIFF( SYSDATE( ) , created )/7 ) WHERE ID = $upvote";
$score2 = "UPDATE pets set score = ((upvote-downvote)- DATEDIFF( SYSDATE( ) , created )/7 ) WHERE ID = $downvote";

//save id and sql for comments
$pet1_id = $_POST['pet1_id'];
$comment1_sql = "INSERT INTO comments(pet_id, body) VALUES ('$pet1_id', '$comment1')";

$pet2_id = $_POST['pet2_id'];
$comment2_sql = "INSERT INTO comments(pet_id, body) VALUES ('$pet2_id', '$comment2')";


//run above querys
$update = mysqli_query($dbc, $sql1);
$update_score = mysqli_query($dbc, $score1);
if($c1){
$push_comment1 = mysqli_query($dbc, $comment1_sql);}else{echo("comment 1 is null" . "<br/>");}

$update2= mysqli_query($dbc, $sql2);
$update_score2 = mysqli_query($dbc, $score2);
if($c2){
$push_comment2 = mysqli_query($dbc, $comment2_sql);}else{echo("comment 2 is null" . "<br/>");}


echo("comment 1: " .$comment1."<br/>");
echo("comment 2: " .$comment2);
//header("Location: index.php");
echo('<script> location.replace("index.php"); </script>');
?>
