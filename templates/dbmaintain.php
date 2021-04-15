<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Plan for Smart Services(PS2)</title>
  <link rel="stylesheet" type="text/css" href="../css/styles.css"/>
</head>
<body>

<script>
     
     function search() {
       var search = document.getElementById("search");
       if (search.style.display=="none") {
         search.style.display="block";
       }
       else{
         search.style.display="none";
       }
     }
</script>
   <ul id = "menu">
       <li><a href="#!/">Home</a></li>
 
       <?php 
       if(!isset($_SESSION)) 
       { 
           session_start(); 
       
       } 
       
       if (isset($_SESSION['user']) && $_SESSION['userID'] == 1){
       echo "<li><a href='#'>db Maintain</a>";
       echo "<ul>"; 
       echo "<li><a href='insert.php'>Insert</a></li>";
       echo "<li><a href='dbmaintain.php'>Delete</a></li>";
       echo "<li><a href='select.php'>Select</a></li>";
       echo "<li><a href='update.php'>Update</a></li>";
       echo "</ul>";
       echo "</li>";
       }
       ?>
       <li><a href="#!/aboutus">About Us</a></li>
       <li><a href="#!/contactus">Contact Us</a></li>
       
       <?php if (isset($_SESSION['user'])){
         echo "<li style='float:right'><a href='scripts/logout.php'>Sign Out</a></li>";
         echo "<li style='float:right'><a href=''>Welcome ". $_SESSION['user'] ."</a></li>";
         
       }
       else {
         echo "<li style='float:right'><a href='#!/signup'>Sign Up</a></li>";
       }
       ?>
       
       <li><a href="#!/reviews">Reviews</a></li>
       <?php if (!isset($_SESSION['user'])){
         echo "<li style='float:right'><a href='#!/login'>Login</a></li>";
       }
       ?>

       <li style="float:right"><a href=""><span onclick="search()">Search</span></a></li>
       <li><a href="#">Type of Services</a>
         <ul>
           <li><a href="#!/rideshare">Rideshare</a></li>
           <li><a href="#!/bikeshare">Bikeshare</a></li>
           <li><a href="#!/rideshare_green">Rideshare GREEN</a></li>
           <li><a href="#!/ride_and_delivery">Ride & Delivery</a></li>
           
         </ul>
       </li> 
     </ul>
 
     <div id="search" style="float:right; display:none;">
       <form action="" method="POST">
         <input type="text" placeholder="Search..." name="search">
         <button name="submit_result" type="submit">submit</button>
       </form>
     </div>
 
     <br><br>
   
     <p style="width:auto;float:right;text-align:right;">
     <?php
     if (isset($_POST['submit_result'])){    
       $search = $_POST["search"];
       $sql = "SELECT * FROM order_table WHERE order_ID =" . $search;
       //select order_id from order_table where userid = $userd, order_id = $order_id
       $result = $dbc->query($sql);
       if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
           echo "Your order ID is ".$search." has completed.";
         }
       } else {
         echo "Cannot find order ID ".$search.", please try again.";
       }
     }
     ?>
   </p>

<h2>Db Maintain</h2>
<?php
include "../db/dbc.php";


$sql = "SELECT * FROM bike_table";
$records = $dbc -> query($sql); // fetch data from database
?>
<!-- Bike table  -->
  <table>
  <tr>
  <td> Bike ID </td>
  <td> Bike Model </td>
  <td> Availability Code </td>
  <td> Price </td>
  <td> Delete </td>
  </tr>
  <?php
  while($data = $records->fetch_assoc())
  {
  ?>
    <tr>
      <td><?php echo $data['bikeID']; ?></td>
      <td><?php echo $data['bike_model']; ?></td>
      <td><?php echo $data['availability_code']; ?></td>
      <td><?php echo $data['priceID']; ?></td>
      <td><a href="delete.php?table=car_table&condition=<?php echo $data['bikeID'];?>">Delete</a></td>
    </tr>
  <?php
  }
  ?>
</table>
<br>
<?php
$sql = "SELECT * FROM car_table";
$records = $dbc -> query($sql); // fetch data from database
?>
  <!-- Car table  -->
  <table>
  <tr>
  <td> Car ID </td>
  <td> Car Model </td>
  <td> Availability Code </td>
  <td> Price </td>
  <td> Delete </td>
  </tr>
<?php
while($data = $records->fetch_assoc())
{
?>
  <tr>
    <td><?php echo $data['carID']; ?></td>
    <td><?php echo $data['car_model']; ?></td>
    <td><?php echo $data['availability_code']; ?></td>
    <td><?php echo $data['priceID']; ?></td>
    <td><a href="delete.php?table=car_table&condition=<?php echo $data['carID'];?>">Delete</a></td>
  </tr>
<?php
}
?>
</table>
<br>
<?php
$sql = "SELECT * FROM car_green_table";
$records = $dbc -> query($sql); // fetch data from database
?>
<!-- Car Green table  -->
  <table>
  <tr>
  <td> Car ID </td>
  <td> Car Model </td>
  <td> Availability Code </td>
  <td> Price </td>
  <td> Delete </td>
  </tr>
<?php
while($data = $records->fetch_assoc())
{
?>
  <tr>
    <td><?php echo $data['carID']; ?></td>
    <td><?php echo $data['car_model']; ?></td>
    <td><?php echo $data['availability_code']; ?></td>
    <td><?php echo $data['priceID']; ?></td>
    <td><a href="delete.php?table=car_green_table&condition=<?php echo $data['carID'];?>">Delete</a></td>
  </tr>
<?php
}
?>
</table>
<br>
<?php
$sql = "SELECT * FROM coffee_table";
$records = $dbc -> query($sql); // fetch data from database
?>
  <!-- Coffee Table -->
  <table>
  <tr>
  <td> Coffee ID </td>
  <td> Store Code </td>
  <td> Store Name </td>
  <td> Coffee Name </td>
  <td> Price </td>
  <td> Delete </td>
  </tr>
<?php
while($data = $records->fetch_assoc())
{
?>
  <tr>
  <td><?php echo $data['coffeeID']; ?></td>
  <td><?php echo $data['store_code']; ?></td>
  <td><?php echo $data['store_name']; ?></td>
  <td><?php echo $data['coffee_name']; ?></td>
  <td><?php echo $data['price']; ?></td>
  <td><a href="delete.php?table=coffee_table&condition=<?php echo $data['coffeeID'];?>">Delete</a></td>
  </tr>
<?php
}
?>
</table>
<br>
<?php
$sql = "SELECT * FROM flower_table";
$records = $dbc -> query($sql); // fetch data from database
?>
  <!-- Flower Table -->
  <table>
  <tr>
  <td> Flower ID </td>
  <td> Store Code </td>
  <td> Store Name </td>
  <td> Flower Name </td>
  <td> Price </td>
  <td> Delete </td>
  </tr>
<?php
while($data = $records->fetch_assoc())
{
?>
  <tr>
  <td><?php echo $data['flowerID']; ?></td>
  <td><?php echo $data['store_code']; ?></td>
  <td><?php echo $data['store_name']; ?></td>
  <td><?php echo $data['flower_name']; ?></td>
  <td><?php echo $data['price']; ?></td>
  <td><a href="delete.php?table=flower_table&condition=<?php echo $data['flowerID'];?>">Delete</a></td>
<?php
}
?>
</table>
<br>
<?php
$sql = "SELECT * FROM order_table";
$records = $dbc -> query($sql); // fetch data from database
?>
<table>
<tr>
<td> Order ID </td>
<td> Date Issued </td>
<td> Date Done </td>
<td> Total Price </td>
<td> Payment Code </td>
<td> User ID </td>
<td> Trip ID </td>
<td> Store Name </td>
<td> Delete </td>
</tr>
<?php
while($data = $records->fetch_assoc())
{
?>
  <tr>
  <td><?php echo $data['order_ID']; ?></td>
  <td><?php echo $data['date_issued']; ?></td>
  <td><?php echo $data['date_done']; ?></td>
  <td><?php echo $data['total_price']; ?></td>
  <td><?php echo $data['payment_code']; ?></td>
  <td><?php echo $data['userID']; ?></td>
  <td><?php echo $data['trip_ID']; ?></td>
  <td><?php echo $data['store_name']; ?></td>
  <td><a href="delete.php?table=<?php echo $table;?>&condition=<?php echo $data['order_ID'];?>">Delete</a></td>
  </tr>
<?php
}
?>
</table>
<br>
<?php
$sql = "SELECT * FROM reviews_table";
$records = $dbc -> query($sql); // fetch data from database
?>
<!-- Review Table -->
  <table>
  <tr>
  <td> User ID </td>
  <td> Rating </td>
  <td> Feedback </td>
  <td> Delete </td>
  </tr>
<?php
while($data = $records->fetch_assoc())
{
?>
  <tr>
  <td><?php echo $data['userID']; ?></td>
  <td><?php echo $data['rating']; ?></td>
  <td><?php echo $data['feedback']; ?></td>
  <td><a href="delete.php?table=<?php echo $table;?>&condition=<?php echo $data['userID'];?>">Delete</a></td>
  </tr>
<?php
}
?>
</table>
<br>
<?php
$sql = "SELECT * FROM trip_table";
$records = $dbc -> query($sql); // fetch data from database
?>
<!-- Trip Table -->
  <table>
  <tr>
  <td> Trip ID </td>
  <td> Source Code </td>
  <td> Destination Code </td>
  <td> Distance </td>
  <td> Car ID </td>
  <td> Price </td>
  <td> Delete </td>
  </tr>
<?php
while($data = $records->fetch_assoc())
{
?>
  <tr>
  <td><?php echo $data['tripID']; ?></td>
  <td><?php echo $data['source_code']; ?></td>
  <td><?php echo $data['destinationCode']; ?></td>
  <td><?php echo $data['distance']; ?></td>
  <td><?php echo $data['carID']; ?></td>
  <td><?php echo $data['price']; ?></td>
  <td><a href="delete.php?table=<?php echo $table;?>&condition=<?php echo $data['tripID'];?>">Delete</a></td>
  </tr>
<?php
}
?>
</table>
<br>
<?php
$sql = "SELECT * FROM user_table";
$records = $dbc -> query($sql); // fetch data from database
?>
<!-- User Table -->
  <table>
  <tr>
  <td> User ID </td>
  <td> First Name </td>
  <td> Last Name </td>
  <td> Phone_Number </td>
  <td> Email </td>
  <td> Postal Code </td>
  <td> Password </td>
  <td> Credit Card </td>
  <td> Salt </td>
  <td> Delete </td>
  </tr>
<?php
while($data = $records->fetch_assoc())
{
?>
<tr>
  <td><?php echo $data['userID'];?></td>
  <td><?php echo $data['first_name'];?></td>
  <td><?php echo $data['last_name'];?></td>
  <td><?php echo $data['phone_number'];?></td>
  <td><?php echo $data['email'];?></td>
  <td><?php echo $data['postalCode'];?></td>
  <td><?php echo $data['pw'];?></td>
  <td><?php echo $data['creditCard'];?></td>
  <td><?php echo $data['salt'];?></td>
  <td><a href="delete.php?table=<?php echo $table;?>&condition=<?php echo $data['userID'];?>">Delete</a></td>
</tr>
<?php
}
?>
</table>
<br>
<?php
$dbc -> close();
?>
</body>
</html>
