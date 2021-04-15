<?php 
require 'dbc.php';

if(isset($_POST['submit'])){
  $email =$_POST['email'];
  $psw = $_POST['psw'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $phone = $_POST['phone'];
  $postalCode = $_POST['postalCode'];
  $creditCard = $_POST['creditCard'];

  $sql = "SELECT email FROM user_table WHERE email='$email'";
  $result = mysqli_query($dbc,$sql);

  //Check if the email isn't taken
  if(mysqli_num_rows($result) == 0){
    //Add SHA1 + Salt encryption 
    $salt = bin2hex(random_bytes(5));
    $psw = $_POST['psw'].$salt;
    $psw = sha1($psw);

    $creditCard = $_POST['creditCard'].$salt;
    $creditCard = sha1($creditCard);

    $sql = "INSERT INTO user_table 
    (first_name, last_name, phone_number, email, postalCode, pw, creditCard, salt) 
    VALUES ('$fname','$lname', '$phone', '$email', '$postalCode', '$psw', '$creditCard', '$salt');";

    $result = mysqli_query($dbc,$sql) or die("Error Inserting user to user_table");
    //Redirect To login 
    header("Location: /Iter34/#!/login");
   }
   else{
    header("Location: /Iter34/#!/signup");
   }

}
$dbc -> close();


?> 