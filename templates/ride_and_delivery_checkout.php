<br><br>



    <h1><?php 
    if(!isset($_SESSION)) 
    {session_start();}   
     if (isset($_SESSION['store_name'])) {echo $_SESSION['store_name'];} else { echo "Could not find the store, Please try again";} ?></h1>



  <ul style="list-style-type:none;" id="drag" name="items">

  <?php 
  require('../db/dbc.php');
  if (isset($_SESSION['store_name'])) {
    //echo $_SESSION['store_name']; 
    $query_florist1 = 'SELECT store_code, flower_name, price FROM flower_table WHERE store_code = 1'; //Forest of Flowers
    $query_florist2 = 'SELECT store_code, flower_name, price FROM flower_table WHERE store_code = 2'; //Flower Creations
    $query_florist3 = 'SELECT store_code, flower_name, price FROM flower_table WHERE store_code = 3'; //Oakville Flower
    $query_coffee1 = 'SELECT store_code, coffee_name, price FROM coffee_table WHERE store_code = 1';  //Tim hortons
    $query_coffee2 = 'SELECT store_code, coffee_name, price FROM coffee_table WHERE store_code = 2'; //Starbucks
    $query_coffee3 = 'SELECT store_code, coffee_name, price FROM coffee_table WHERE store_code = 3';   //Second cup

    $checkFlower = false;

    if ($_SESSION['store_name'] == 'Forest of Flowers Mississauga'){ $response = @mysqli_query($dbc, $query_florist1); $checkFlower = true; }
    else if ($_SESSION['store_name'] == 'Flower Creations Mississauga'){ $response = @mysqli_query($dbc, $query_florist2); $checkFlower = true; }
    else if ($_SESSION['store_name'] == 'Oakville Florist Shop'){ $response = @mysqli_query($dbc, $query_florist3); $checkFlower = true; }
    else if ($_SESSION['store_name'] == 'Tim Hortons Mississauga'){ $response = @mysqli_query($dbc, $query_coffee1); $checkFlower = false; }
    else if ($_SESSION['store_name'] == 'Starbucks Mississauga'){ $response = @mysqli_query($dbc, $query_coffee2); $checkFlower = false; }
    else if ($_SESSION['store_name'] == 'Second Cup Mississauga'){$response = @mysqli_query($dbc, $query_coffee3); $checkFlower = false; }


    if ($response){
      $count = 0;

      if ($checkFlower) {
      while ($row = mysqli_fetch_array($response)){
        
        echo "<li id = '".$count."' name='item1' value='first'  draggable='true' ondragstart='drag(event)'><input type='hidden' name='item[]' value='".$row['flower_name']. ",". $row['price']."'/>" .
        $row['flower_name'] . " - $" . $row['price'] .  "<img src='https://images.pexels.com/photos/736230/pexels-photo-736230.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500'  width='35' height='35'></li>";
        $count++;

      }
    }
    else if (!$checkFlower) {
      while ($row = mysqli_fetch_array($response)){
      echo "<li id = '".$count."' name='item1' value='first'  draggable='true' ondragstart='drag(event)'><input type='hidden' name='item[]' value='".$row['coffee_name']. ",". $row['price']."'/>" .
        $row['coffee_name'] . " - $" . $row['price'] .  "<img src='https://cdn.th3rdwave.coffee/merchants/3kI3aupy/3kI3aupy-md_2x.jpg'  width='35' height='35'></li>";
        $count++;
      }
    }
    }
 
  }
   else {
     echo "No items found";
    }
  ?>

  
   </ul>
  
  
  
  <form action="./scripts/confirm_order_ridendelivery.php" method="POST">
	<div id="cart" ondrop="drop(event); total_price();" ondragover="allowDrop(event)">
		<h1>Shopping Cart</h1>
		
    <p>Delivery Date: <?php  if (isset($_SESSION['trip_start'])) {echo $_SESSION['trip_start'];} ?></p>
    <p>Time for delivery: <?php  if (isset($_SESSION['appt_time'])) {echo $_SESSION['appt_time'];} ?> </p>
    <p>Destination: <?php  if (isset($_SESSION['destination'])) {echo $_SESSION['destination'];} ?> </p>
    <p class="total_price " id="items_price"></p>
    <input type="hidden" value="" name="total_price" id="form_price" />
    <input type="submit" value="Confirm Order" name="submit" class="confirm_button">
	</div>
  </form>


    <br><br>

 
  <br>