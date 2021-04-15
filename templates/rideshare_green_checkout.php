<br><br>

<h1><?php  if(!isset($_SESSION)) 
 { 
     session_start(); 

 }
 
  if (isset($_SESSION['source']) && isset($_SESSION['destination'])) {echo strtoupper($_SESSION['source']) . " ➜ " . strtoupper($_SESSION['destination']);} else { echo "Please try again";}
  ?></h1>






<ul style="list-style-type:none;" id="drag" name="items">
 <h1>Premium cars</h1>
<?php 
    require('../db/dbc.php');
    $query = 'SELECT car_model, priceID FROM car_table';
    $response = @mysqli_query($dbc, $query);
    if ($response){
        $count = 0;
        while ($row = mysqli_fetch_array($response)){
        echo "<li id ='".$count."' name='first' value='first'  draggable='true' ondragstart='drag(event)'><input type='hidden' name='item[]' value='".$row['car_model']. ",". $row['priceID']."'/>" . 
        $row['car_model'] . " - $" . $row['priceID'] .  "<img src='https://media.wired.com/photos/5d09594a62bcb0c9752779d9/1:1/w_1500,h_1500,c_limit/Transpo_G70_TA-518126.jpg'  width='35' height='35'></li>";
        $count++;
        }
  }
  ?>
  <h1>GREEN cars</h1>
  <?php 
    require('../db/dbc.php');
    $query = 'SELECT car_model, priceID FROM car_green_table';
    $response = @mysqli_query($dbc, $query);
    if ($response){
        $count = 15;
        while ($row = mysqli_fetch_array($response)){
        echo "<li id ='".$count."' name='first' value='first'  draggable='true' ondragstart='drag(event)'><input type='hidden' name='item[]' value='".$row['car_model']. ",". $row['priceID']."'/>" . 
        $row['car_model'] . " - $" . $row['priceID'] .  "<img src='https://media.wired.com/photos/5d09594a62bcb0c9752779d9/1:1/w_1500,h_1500,c_limit/Transpo_G70_TA-518126.jpg'  width='35' height='35'></li>";
        $count++;
        }
  }
  ?>
</ul>




<form action="" method="POST">
<div id="cart" ondrop="drop(event); total_price();" ondragover="allowDrop(event)">
    <h1>Shopping Cart</h1>
    
<p>Date: <?php  if (isset($_SESSION['date'])) {echo $_SESSION['date'];} ?></p>
<p>Time of pickup: <?php  if (isset($_SESSION['appt'])) {echo $_SESSION['appt'];} ?> </p>
<p id="distance"></p>
<p class="total_price " id="items_price"></p>
<input type="hidden" value="" name="total_price" id="form_price" />
<input type="hidden" value="" name="total_distance" id="form_distance" />
<input type="submit" value="Confirm Order" name="submitOrderRideshareGREEN" class="confirm_button">
</div>
</form>

<br><br>
