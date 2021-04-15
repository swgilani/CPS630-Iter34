<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Plan for Smart Services(PS2)</title>
  <link rel="stylesheet" type="text/css" href="../css/styles.css"/>
</head>
<body>
<h2>Db Maintain</h2>
<?php
include "../db/dbc.php";

if(!isset($_SESSION))
{
  session_start();
}

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
    <td><a href="delete.php?table=car_table&condition=<?php echo $data['carID'];?>">Delete</a></td>
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
