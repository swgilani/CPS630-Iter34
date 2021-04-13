<br><br>

<h1><?php  if(!isset($_SESSION)) 
 { 
     session_start(); 

 } 
  print_r($_SESSION); ?></h1>






<ul style="list-style-type:none;" id="drag" name="items">


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
<input type="submit" value="Confirm Order" name="submit" class="confirm_button">
</div>
</form>

<br><br>

