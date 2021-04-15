<h2>Db Maintain</h2>
<?php
include "../db/dbc.php";

if(!isset($_SESSION))
{
  session_start();
}
?>
  <p style="width:auto;">Please choose a table:</p>
    <form action="#" method="POST">
      <label>Tables:</label>
      <select id="insert_select" name="select">
        <option value="car_table">Car table</option>
        <option value="coffee_table">Coffee table</option>
        <option value="flower_table">Flower table</option>
        <option value="order_table">Order table</option>
        <option value="trip_table">Trip table</option>
        <option value="user_table">User table</option>
      </select>
      <button name="submit_table" type="submit" value="Submit">Submit</button>
    </form>

    <p style="width:auto;" >
      <?php
      if (isset($_POST['submit_table']))
      {
        $table = $_POST["select"];
        $sql = "SELECT * FROM ".$table;
        $records = $dbc -> query($sql); // fetch data from database
        if($table == "car_table")
        {
      ?>
          <!-- Car table  -->
          <table>
          <tr>
          <td> Car ID </td>
          <td> Car Model </td>
          <td> Availability Code </td>
          <td> Price </td>
          <td> Update </td>
          <td> Delete </td>
          </tr>
        <?php
        }
        if($table == "coffee_table")
        {
        ?>
          <!-- Coffee table  -->
          <table>
          <tr>
          <td> Coffee ID </td>
          <td> Store Code </td>
          <td> Store Name </td>
          <td> Coffee Name </td>
          <td> Price </td>
          <td> Update </td>
          <td> Delete </td>
          </tr>
        <?php
        }
        if($table == "flower_table")
        {
        ?>
          <!-- Flower Table -->
          <table>
          <tr>
          <td> Flower ID </td>
          <td> Store Code </td>
          <td> Store Name </td>
          <td> Flower Name </td>
          <td> Price </td>
          <td> Update </td>
          <td> Delete </td>
          </tr>
        <?php
        }
        if($table == "order_table")
        {
        ?>
          <!-- Order Table -->
          <table>
          <tr>
          <td> Order ID </td>
          <td> Date Issued </td>
          <td> Date Done </td>
          <td> Total Price </td>
          <td> Payment Code </td>
          <td> User ID </td>
          <td> Trip ID </td>
          <td> Store Name </td>
          <td> Update </td>
          <td> Delete </td>
          </tr>
        <?php
        }
        if($table == "trip_table")
        {
        ?>
          <!-- Trip Table -->
          <table>
          <tr>
          <td> Trip ID </td>
          <td> Source Code </td>
          <td> Destination Code </td>
          <td> Distance </td>
          <td> Car ID </td>
          <td> Price </td>
          <td> Update </td>
          <td> Delete </td>
          </tr>
        <?php
        }
        if($table == "user_table")
        {
        ?>
          <!-- User Table -->
          <table>
          <tr>
          <td> User ID </td>
          <td> First Name </td>
          <td> Last Name </td>
          <td> Phone_Number </td>
          <td> Email </td>
          <td> Postal Code </td>
          <td> Password </td>
          <td> Balance </td>
          <td> Update </td>
          <td> Delete </td>
          </tr>

        <?php
        }
        while($data = $records->fetch_assoc())
        {
          if($table == "car_table")
          {
        ?>
            <tr>
              <td><?php echo $data['carID']; ?></td>
              <td><?php echo $data['car_model']; ?></td>
              <td><?php echo $data['availability_code']; ?></td>
              <td><?php echo $data['priceID']; ?></td>
              <td><a href="update.php?table=<?php echo $table;?>&condition=<?php echo $data['carID'];?>">Edit</a></td>
              <td><a href="delete.php?table=<?php echo $table;?>&condition=<?php echo $data['carID'];?>">Delete</a></td>
            </tr>
        <?php
          }
          if($table == "coffee_table")
          {
        ?>
            <tr>
              <td><?php echo $data['coffeeID']; ?></td>
              <td><?php echo $data['store_code']; ?></td>
              <td><?php echo $data['store_name']; ?></td>
              <td><?php echo $data['coffee_name']; ?></td>
              <td><?php echo $data['price']; ?></td>
              <td><a href="update.php?table=<?php echo $table;?>&condition=<?php echo $data['coffeeID'];?>">Edit</a></td>
              <td><a href="delete.php?table=<?php echo $table;?>&condition=<?php echo $data['coffeeID'];?>">Delete</a></td>
            </tr>
        <?php
          }
          if($table == "flower_table")
          {
        ?>
            <tr>
              <td><?php echo $data['flowerID']; ?></td>
              <td><?php echo $data['store_code']; ?></td>
              <td><?php echo $data['store_name']; ?></td>
              <td><?php echo $data['flower_name']; ?></td>
              <td><?php echo $data['price']; ?></td>
              <td><a href="update.php?table=<?php echo $table;?>&condition=<?php echo $data['flowerID'];?>">Edit</a></td>
              <td><a href="delete.php?table=<?php echo $table;?>&condition=<?php echo $data['flowerID'];?>">Delete</a></td>
            </tr>
        <?php
          }
          if($table == "order_table")
          {
        ?>
            <tr>
              <td><?php echo $data['order_ID']; ?></td>
              <td><?php echo $data['date_issued']; ?></td>
              <td><?php echo $data['date_done']; ?></td>
              <td><?php echo $data['total_price']; ?></td>
              <td><?php echo $data['payment_code']; ?></td>
              <td><?php echo $data['userID']; ?></td>
              <td><?php echo $data['trip_ID']; ?></td>
              <td><?php echo $data['store_name']; ?></td>
              <td><a href="update.php?table=<?php echo $table;?>&condition=<?php echo $data['order_ID'];?>">Edit</a></td>
              <td><a href="delete.php?table=<?php echo $table;?>&condition=<?php echo $data['order_ID'];?>">Delete</a></td>
            </tr>
        <?php
          }
          if($table == "trip_table")
          {
        ?>
            <tr>
              <td><?php echo $data['tripID']; ?></td>
              <td><?php echo $data['source_code']; ?></td>
              <td><?php echo $data['destinationCode']; ?></td>
              <td><?php echo $data['distance']; ?></td>
              <td><?php echo $data['carID']; ?></td>
              <td><?php echo $data['price']; ?></td>
              <td><a href="update.php?table=<?php echo $table;?>&condition=<?php echo $data['tripID'];?>">Edit</a></td>
              <td><a href="delete.php?table=<?php echo $table;?>&condition=<?php echo $data['tripID'];?>">Delete</a></td>
            </tr>
        <?php
          }
          if($table == "user_table")
          {
        ?>
            <tr>
              <td><?php echo $data['userID']; ?></td>
              <td><?php echo $data['first_name']; ?></td>
              <td><?php echo $data['last_name']; ?></td>
              <td><?php echo $data['phone_number']; ?></td>
              <td><?php echo $data['email']; ?></td>
              <td><?php echo $data['postalCode']; ?></td>
              <td><?php echo $data['pw']; ?></td>
              <td><?php echo $data['balance']; ?></td>
              <td><a href="update.php?table=<?php echo $table;?>&condition=<?php echo $data['userID'];?>">Edit</a></td>
              <td><a href="delete.php?table=<?php echo $table;?>&condition=<?php echo $data['userID'];?>">Delete</a></td>
            </tr>
      <?php
          }
        }
      }
      ?>
      </table>
    </p>
