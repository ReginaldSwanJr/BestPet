<?php 
include("config.php");


function deletePet($id) {
            $sql1 = "DELETE FROM comments where pet_id = '$id' ";
            $sql2 = "DELETE FROM pets where id = '$id' ";
            
            $deltete_comment = mysqli_query($dbc, sql1);
            $delete_pet = mysqli_query($dbc,$sql2);
            echo('<script> location.replace("photo_display.php"); </script>');
         }




?>

