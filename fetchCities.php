<?php

include "connection.php";

$stateId = $_GET["stateId"];

$getCityQuery = "select * from cities where city_state='$stateId'";

$getCity = mysqli_query($con, $getCityQuery);
echo "<select id='cities'> <option value=''>Select a city</option>";
while($row = mysqli_fetch_array($getCity)){
   $cityName = $row["city_name"];
   echo "<option value='$cityName'>$cityName</option>";
   
}
echo "</select>";
?>