<?php

include 'connection.php';

if(isset($_POST["submit"])){
   
 
   $name = $_POST["name"];
   $username = $_POST["username"];
   $password = $_POST["password"];
   $mail = $_POST["mail"];
   $mobile = $_POST["mobile"];
   $stateId = $_POST["states"];
   $cities = $_POST["cities"];
   $filename = $_FILES["upload"]["tmp_name"];
   
   $fileDestination = "images/".basename($_FILES["upload"]["name"]);
   
   move_uploaded_file($filename, $fileDestination);
  
 /*  $fetchStateNameQuery = "select `name` from states where id=$stateId";
   
   $fetchStateName = mysqli_query($con,$fetchStateNameQuery);
   
   $row = mysqli_fetch_array($fetchStateName);
   
   $stateName = $row["name"];*/
   
   $insertQuery = "INSERT INTO `marrowtech`.`infotable` (`name`, `username`, `password`, `email`, `mobile`, `state`, `city`, `image`) VALUES ('$name', '$username', '$password', '$mail', '$mobile', '$stateId', '$cities', '$fileDestination');";
   
   
   
   if(mysqli_query($con, $insertQuery)){
      
      echo "<div style='display:block; margin:0 auto; background:lightgreen; border-top:5px solid darkgreen; padding:10px; width:55%;'> Form Submitted Sucessfully</div>";
      
   }else{
      
      echo "<div style='display:block; margin:0 auto; background:indianred; border-top:5px solid red; padding:10px; width:55%; color:#fff;'>An Error Occured</div>";
      
   }
   
}
else{
   
   echo "Are you lost? ";
   
   header("Location:index.php");
   
}

?>