<?php 
require 'dbc.php';

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $sql="SELECT salt FROM user_table WHERE email='$email'";
    $result = mysqli_query($dbc, $sql);
    $salt = mysqli_fetch_array($result, MYSQLI_NUM);
    //
    $psw = $_POST['psw'].$salt[0];
    $psw = sha1($psw); 
    $sql="SELECT * FROM user_table WHERE email='$email' AND pw='$psw'";
    $result = mysqli_query($dbc, $sql);
    if($row = mysqli_fetch_assoc($result)){

        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        $_SESSION['user']= $row["first_name"];
        $_SESSION['userID'] = $row["userID"];
        header("location: /Iter34/");
    }
    else{
        header("location: /Iter34/#!/login");
    }
    
}
?>