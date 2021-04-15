<!DOCTYPE html>
<?php
require_once('../db/dbc.php');
if(!isset($_SESSION))
{
    session_start();
}  ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Insert</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css"/>
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
  </head>

  <body>
    <ul id = "menu">
      <li><a href="/iter34">Home</a></li>
      <?php if (isset($_SESSION['user']) && $_SESSION['userID'] == 1){
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
      <li><a href="aboutus.php">About Us</a></li>
      <li><a href="contactus.php">Contact Us</a></li>

      <?php if (isset($_SESSION['user'])){
        echo "<li style='float:right'><a href='../scripts/logout.php'>Sign Out</a></li>";
        echo "<li style='float:right'><a href=''>Welcome ". $_SESSION['user'] ."</a></li>";
        echo '<li style="float:right"><a href="#"><span onclick="search()">Search</span></a></li>';
      }
      else {
        echo "<li style='float:right'><a href='signup.php'>Sign Up</a></li>";
      }
      ?>

      <li><a href="reviews.php">Reviews</a></li>
      <?php if (!isset($_SESSION['user'])){
        echo "<li style='float:right'><a href='login.php'>Login</a></li>";
      }
      ?>
      <!-- <li style="float:right"><a href="#"><span onclick="search()">Search</span></a></li> -->
      <li><a href="#">Type of Services</a>
        <ul>
          <li><a href="rideshare.php">Rideshare</a></li>
          <li><a href="ride_and_delivery.php">Ride & Delivery</a></li>
        </ul>
      </li>

    </ul>

    <div id="search" style="float:right; display:none;">
      <form action="#" method="POST">
        <input type="text" placeholder="Search..." name="search">
        <button name="submit_result" type="submit">submit</button>
      </form>
    </div>
    <h2>Insert</h2>
    
    <p style="width:auto;">Please choose a table to insert data:</p>
      <form action="#" method="POST">
        <?php
          //DB Table Selection
          if(!isset($_POST['submit_table'])){
            echo '<label>Tables:</label>
            <select id="insert_select" name="select">
            <option value="" disabled selected>Choose option</option>
            <option value="car_table">car table</option>
            <option value="coffee_table">coffee table</option>
            <option value="flower_table">flower table</option>
            <option value="order_table">order table</option>
            <option value="trip_table">trip table</option>
            <option value="user_table">user table</option>
            <option value="reviews_table">reviews table</option>
            <option value="bike_table">bike table</option>
            <option value="car_green_table">car green table</option>
            </select><br>
            <button name="submit_table" type="submit">Insert into this Table</button>';
          }
          elseif(isset($_POST['submit_table'])){
            if(!empty($_POST['select'])) {
              $selected = $_POST['select'];
              //Display different input boxes depending on table
              switch ($selected) {
                case "car_table":
                    echo '<label>Tables:</label>
                    <select id="insert_select" name="select">
                    <option value="" disabled selected>Choose option</option>
                    <option value="car_table" selected>car table</option>
                    <option value="coffee_table">coffee table</option>
                    <option value="flower_table">flower table</option>
                    <option value="order_table">order table</option>
                    <option value="trip_table">trip table</option>
                    <option value="user_table">user table</option>
                    </select><br>
                    <button name="submit_table" type="submit">Insert into this Table</button>';
                    echo '<br><br>';
                    echo '<p>Editing Car Table</p>';
                    echo '<label>carID:</label>
                    <input type="number" name="info0"><br>
                    <label>car_model:</label>
                    <input type="text" name="info1"><br>
                    <label>availability_code:</label>
                    <input type="number" name="info2"><br>
                    <label>priceID:</label>
                    <input type="number" name="info3"><br>
                    <button name="submit_values" type="submit">submit</button>';
                    break;
                case "coffee_table":
                  echo '<label>Tables:</label>
                  <select id="insert_select" name="select">
                  <option value="" disabled selected>Choose option</option>
                  <option value="car_table">car table</option>
                  <option value="coffee_table" selected>coffee table</option>
                  <option value="flower_table">flower table</option>
                  <option value="order_table">order table</option>
                  <option value="trip_table">trip table</option>
                  <option value="user_table">user table</option>
                  </select><br>
                  <button name="submit_table" type="submit">Insert into this Table</button>';
                  echo '<br><br>';
                    echo '<p>Editing Coffee Table</p>';
                    echo '<label>coffeeID:</label>
                    <input type="number" name="info0"><br>
                    <label>store_code:</label>
                    <input type="text" name="info1"><br>
                    <label>store_name:</label>
                    <input type="text" name="info2"><br>
                    <label>coffee_name:</label>
                    <input type="text" name="info3"><br>
                    <label>price:</label>
                    <input type="number" name="info4"><br>
                    <button name="submit_values" type="submit">submit</button>';
                    break;
                case "flower_table":
                  echo '<label>Tables:</label>
                  <select id="insert_select" name="select">
                  <option value="" disabled selected>Choose option</option>
                  <option value="car_table">car table</option>
                  <option value="coffee_table">coffee table</option>
                  <option value="flower_table" selected>flower table</option>
                  <option value="order_table">order table</option>
                  <option value="trip_table">trip table</option>
                  <option value="user_table">user table</option>
                  </select><br>
                  <button name="submit_table" type="submit">Insert into this Table</button>';
                  echo '<br><br>';
                    echo '<p>Editing Flower Table</p>';  
                    echo '<label>flowerID:</label>
                    <input type="number" name="info0"><br>
                    <label>store_code:</label>
                    <input type="text" name="info1"><br>
                    <label>store_name:</label>
                    <input type="text" name="info2"><br>
                    <label>flower_name:</label>
                    <input type="text" name="info3"><br>
                    <label>price:</label>
                    <input type="number" name="info4"><br>
                    <button name="submit_values" type="submit">submit</button>';
                    break;
                case "order_table":
                  echo '<label>Tables:</label>
                  <select id="insert_select" name="select">
                  <option value="" disabled selected>Choose option</option>
                  <option value="car_table">car table</option>
                  <option value="coffee_table">coffee table</option>
                  <option value="flower_table">flower table</option>
                  <option value="order_table" selected>order table</option>
                  <option value="trip_table">trip table</option>
                  <option value="user_table">user table</option>
                  </select><br>
                  <button name="submit_table" type="submit">Insert into this Table</button>';
                  echo '<br><br>';
                    echo '<p>Editing Order Table</p>';
                    echo '<label>order_ID:</label>
                    <input type="number" name="info0"><br>
                    <label>date_issued:</label>
                    <input type="text" name="info1"><br>
                    <label>date_done:</label>
                    <input type="text" name="info2"><br>
                    <label>total_price:</label>
                    <input type="number" name="info3"><br>
                    <label>payment_code:</label>
                    <input type="number" name="info4"><br>
                    <label>userID:</label>
                    <input type="number" name="info5"><br>
                    <label>tripID:</label>
                    <input type="number" name="info6"><br>
                    <label>store_name:</label>
                    <input type="text" name="info7"><br>
                    <button name="submit_values" type="submit">submit</button>';
                    break;
                 case "trip_table":
                  echo '<label>Tables:</label>
                  <select id="insert_select" name="select">
                  <option value="" disabled selected>Choose option</option>
                  <option value="car_table">car table</option>
                  <option value="coffee_table">coffee table</option>
                  <option value="flower_table">flower table</option>
                  <option value="order_table">order table</option>
                  <option value="trip_table" selected>trip table</option>
                  <option value="user_table">user table</option>
                  </select><br>
                  <button name="submit_table" type="submit">Insert into this Table</button>';
                  echo '<br><br>';
                    echo '<p>Editing Trip Table</p>';
                    echo '<label>tripID:</label>
                    <input type="number" name="info0"><br>
                    <label>source_code:</label>
                    <input type="text" name="info1"><br>
                    <label>destinationCode:</label>
                    <input type="text" name="info2"><br>
                    <label>distance:</label>
                    <input type="number" name="info3"><br>
                    <label>carID:</label>
                    <input type="number" name="info4"><br>
                    <label>price:</label>
                    <input type="number" name="info5"><br>
                    <button name="submit_values" type="submit">submit</button>';
                    break;
                  case "user_table":
                    echo '<label>Tables:</label>
                    <select id="insert_select" name="select">
                    <option value="" disabled selected>Choose option</option>
                    <option value="car_table">car table</option>
                    <option value="coffee_table">coffee table</option>
                    <option value="flower_table">flower table</option>
                    <option value="order_table">order table</option>
                    <option value="trip_table">trip table</option>
                    <option value="user_table" selected>user table</option>
                    </select><br>
                    <button name="submit_table" type="submit">Insert into this Table</button>';
                    echo '<br><br>';
                    echo '<p>Editing User Table</p>';
                    echo '<label>userID:</label>
                    <input type="number" name="info0"><br>
                    <label>first_name:</label>
                    <input type="text" name="info1"><br>
                    <label>last_name:</label>
                    <input type="text" name="info2"><br>
                    <label>phone_number:</label>
                    <input type="tel" name="info3"><br>
                    <label>email:</label>
                    <input type="email" name="info4"><br>
                    <label>postalCode:</label>
                    <input type="text" name="info5"><br>
                    <label>pw:</label>
                    <input type="text" name="info6"><br>
                    <label>balance:</label>
                    <input type="number" name="info7"><br>
                    <button name="submit_values" type="submit">submit</button>';
                    break;
              }
              
          }else 
          {
            echo '<label>Tables:</label>
            <select id="insert_select" name="select">
            <option value="" disabled selected>Choose option</option>
            <option value="car_table">car table</option>
            <option value="coffee_table">coffee table</option>
            <option value="flower_table">flower table</option>
            <option value="order_table">order table</option>
            <option value="trip_table">trip table</option>
            <option value="user_table">user table</option>
            </select><br>
            <button name="submit_table" type="submit">Insert into this Table</button>';
            echo '<p>Please select a table.</p>';
          }
          }
          //////// Submission to the DB
          if (isset($_POST['submit_values'])){
            $selected = $_POST['select'];
            switch ($selected) {
              case "car_table":
                $info0 = $_POST["info0"];
                $info1 = $_POST["info1"];
                $info2 = $_POST["info2"];
                $info3 = $_POST["info3"];
                   
                $sql = "INSERT INTO car_table (carID,car_model,availability_code,priceID) 
                VALUES ('$info0','$info1','$info2',$info3);";
                $result = mysqli_query($dbc,$sql) or die("Error inserting data to car_table");
                break;
              case "coffee_table":
                $info0 = $_POST["info0"];
                $info1 = $_POST["info1"];
                $info2 = $_POST["info2"];
                $info3 = $_POST["info3"];
                $info4 = $_POST["info4"];
                $sql = "INSERT INTO coffee_table (coffeeID,store_code,store_name,coffee_name,price) 
                VALUES ('$info0','$info1','$info2','$info3','$info4');";
                $result = mysqli_query($dbc,$sql) or die("Error inserting data to coffee_table");
                break;
              case "flower_table":
                $info0 = $_POST["info0"];
                $info1 = $_POST["info1"];
                $info2 = $_POST["info2"];
                $info3 = $_POST["info3"];
                $info4 = $_POST["info4"];
                $sql = "INSERT INTO flower_table (flowerID,store_code,store_name,flower_name,price) 
                VALUES ('$info0','$info1','$info2','$info3','$info4');";
                $result = mysqli_query($dbc,$sql) or die("Error inserting data to flower_table");
                break;
              case "order_table":
                $info0 = $_POST["info0"];
                $info1 = $_POST["info1"];
                $info2 = $_POST["info2"];
                $info3 = $_POST["info3"];
                $info4 = $_POST["info4"];
                $info5 = $_POST["info5"];
                $info6 = $_POST["info6"];
                $info7 = $_POST["info7"];
                $sql = "INSERT INTO order_table (order_ID,date_issued,date_done,total_price,payment_code,userID,trip_ID,store_name) 
                VALUES ('$info0','$info1','$info2','$info3','$info4','$info5','$info6','$info7');";
                $result = mysqli_query($dbc,$sql) or die("Error inserting data to order_table");
                break;
              case "trip_table":
                $info0 = $_POST["info0"];
                $info1 = $_POST["info1"];
                $info2 = $_POST["info2"];
                $info3 = $_POST["info3"];
                $info4 = $_POST["info4"];
                $info5 = $_POST["info5"];
                $sql = "INSERT INTO trip_table (tripID,source_code,destinationCode,distance,carID,price) 
                VALUES ('$info0','$info1','$info2','$info3','$info4','$info5);";
                $result = mysqli_query($dbc,$sql) or die("Error inserting data to trip_table");
                break;
              case "user_table":
                $info0 = $_POST["info0"];
                $info1 = $_POST["info1"];
                $info2 = $_POST["info2"];
                $info3 = $_POST["info3"];
                $info4 = $_POST["info4"];
                $info5 = $_POST["info5"];
                $info6 = $_POST["info6"];
                $info7 = $_POST["info7"];
                $sql = "INSERT INTO user_table (userID,first_name,last_name,phone_number,email,postalCode,pw,balance) 
                VALUES ('$info0','$info1','$info2','$info3','$info4','$info5','$info6','$info7');";
                $result = mysqli_query($dbc,$sql) or die("Error inserting data to user_table");
                break;
            }
        }
        $dbc -> close();
          //
        ?>
      </form>
  </body>
</html>
