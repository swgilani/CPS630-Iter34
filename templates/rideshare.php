<?php
 if(!isset($_SESSION)) 
 { 
     session_start(); 
 } 
    ?>


    <br><br>
    <h1>Ride share</h1>
    <br><br>


    <div id="map"></div>
    <form  action="" method="POST">
      <label for="source">Pickup location</label><br>
      <input type="text" id="start" name="source" required><br>

      <label for="destination">Where to?</label><br>
      <input type="text" id="end" name="destination" required><br><br>

      <label for="date">Date</label>
      <input type="date" id="date" name="date" required><br/>

      <label for="appt">Pickup time</label>
      <input type="time" id="time" name="appt" required>      
      <br/>

      <br>
      <input type="submit" value="Submit" name="submitRideshare">
    </form>
    


  

