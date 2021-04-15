<?php
 if(!isset($_SESSION)) 
 { 
     session_start(); 
 } 

    if (isset($_POST['submitRideshareGREEN'])){
    $_SESSION['source'] = $_POST['source'];
    $_SESSION['destination'] = $_POST['destination'];
    $_SESSION['date'] = $_POST['date'];
    $_SESSION['appt'] = $_POST['appt'];

    header('Location: #!/rideshare_green_checkout');
    }

    ?>