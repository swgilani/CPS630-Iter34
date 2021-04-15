<?php
  include "../db/dbc.php";

  if ($_GET['table'] == "bike_table")
  {
    $sql = "DELETE FROM " .$_GET['table']. " WHERE bikeID = " .$_GET['condition'];
  }
  if ($_GET['table'] == "car_table")
  {
    $sql = "DELETE FROM " .$_GET['table']. " WHERE carID = " .$_GET['condition'];
  }
  if ($_GET['table'] == "car_green_table")
  {
    $sql = "DELETE FROM " .$_GET['table']. " WHERE carID = " .$_GET['condition'];
  }
  if ($_GET['table'] == "coffee_table")
  {
    $sql = "DELETE FROM " .$_GET['table']. " WHERE coffeeID = " .$_GET['condition'];
  }
  if ($_GET['table'] == "flower_table")
  {
    $sql = "DELETE FROM " .$_GET['table']. " WHERE flowerID = " .$_GET['condition'];
  }
  if ($_GET['table'] == "order_table")
  {
    $sql = "DELETE FROM " .$_GET['table']. " WHERE order_ID = " .$_GET['condition'];
  }
  if ($_GET['table'] == "user_table")
  {
    $sql = "DELETE FROM " .$_GET['table']. " WHERE userID = " .$_GET['condition'];
  }
  if ($_GET['table'] == "trip_table")
  {
    $sql = "DELETE FROM " .$_GET['table']. " WHERE tripID = " .$_GET['condition'];
  }
  if ($_GET['table'] == "reviews_table")
  {
    $sql = "DELETE FROM " .$_GET['table']. " WHERE userID = " .$_GET['condition'];
  }
  //success or fail
  if($dbc->query($sql) === TRUE)
  {
    $dbc -> close();
    header("location:dbmaintain.php");
    exit;
  }
  else
  {
    echo "ERROR: Could not able to execute $sql. ";
  }
?>

