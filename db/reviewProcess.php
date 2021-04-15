<?php 
require 'dbc.php';
if(!isset($_SESSION)) 
{ 
    session_start(); 

} 

if(isset($_POST['reviewSubmit'])){
    $rating = $_POST['rating'];
    $feedback =$_POST['feedback'];
    $userID = $_SESSION['userID'];
    $sql = "INSERT INTO reviews_table (userID,rating,feedback) 
    VALUES ('$userID', '$rating', '$feedback');";

    $result = mysqli_query($dbc, $sql) or die($rating);
    header("Location: /Iter34/#!/reviews");
    
}
?>