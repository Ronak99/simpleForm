<?php

include "connection.php";

$query = "select `city_state` from cities group by `city_state`";
$result = mysqli_query($con, $query);

?>


<html>
   <head>
      <title>Form for marrow technologies </title>
      
    <!-- resources-->
      <link href="css/index.css" rel="stylesheet" type="text/css"/>
      <script src="js/jquery.min.js" type="text/javascript"></script>
      <script src="js/index.js" type="text/javascript"></script>
    
   </head>
   
   
   <body>
      
      <div class="container"> <!-- the main container -->
         
         <div class="formContainer">
            
            <h2>fill out the form</h2> 
            
         <!-- the form begins -->   
         <form action="submit.php" id="theForm" method="POST" enctype="multipart/form-data">
            
            <label id="nameLabel">Name </label> 
            
            <input type="text" placeholder="Your Name" id="name" name="name" onkeyup="validate(id)">
            
            <span class="errorText"></span> <!-- responsible for fallback error messages -->
            <!--
            Name:
            Should not contain number, and any special symbols
            
            -->
                       
             <label id="usernameLabel">Username   </label>
             
             <input type="text" placeholder="Select a username" id="username" name="username" onkeyup="validate(id)">
             
             <span class="errorText"> </span>
           <!--
            userName:
            Can contain numbers but not symbols
            No space allowed
            -->
            
             <label id="passwordLabel">Password </label>  
             
             <input type="password" placeholder="Password" id="password" name="password" onkeyup="validate(id)">
             
            <span class="errorText"></span>
            <!--
            
            Should be longer than 10 characters
            
            -->
            
             <label id="mailLabel">EMail </label>
             
             <input type="email" placeholder="Your E-Mail Address" id="mail" name="mail" onkeyup="validate(id)">
             
             <span class="errorText"> </span>
             <!--
             
             Should have an @ sign followed by a . and a domain end
             
             -->
             
             <label id="mobileLabel">Mobile No. </label>
             
             <input type="tel" placeholder="Your Contact Number" id="mobile" name="mobile" onkeyup="validate(id)">
             
             <span class="errorText"> </span>
             <!-- should not contain any text and just be 10 number long -->
             
             
             <label id="stateLabel">State </label>
             
             <select name="states" id="states" onchange="validate(id)"> 
                
              <option value="">Select a state </option>
                <?php
                
                while($row = mysqli_fetch_array($result)){
                   $stateName = $row["city_state"];
                   
                   echo " <option value='$stateName'>$stateName</option>";
                   
                }
                //dyanimcally populates the select by fetching the state names from the designated database
                ?>
             </select>
             
             <span class="errorText"> </span>
            
             
            <label id="cityLabel">City </label>
            
              <select name="cities" id="cities" onchange="validate(id)"> 
                 
                 <option value="">Select a state first</option>
                             
             </select>
            
             <span class="errorText"> </span>
             
             
             
             <label id="imageLabel">Image  </label>
             
             <input type="file" id="file" name="upload" onchange="validate(id)">
             
            <span class="errorText"> </span>
            
            <br>
            
             <input type="submit" id="submit" value="Submit Form" name="submit" disabled="disabled">
             
            <input type="reset" id="reset" value="Reset Form">
            
           <!-- The form ending -->
           
           
              </form>
           
         </div>
         
      </div>
     <script src="js/validation.js" type="text/javascript"></script>
   </body>
</html>