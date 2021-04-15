<div>
    <h2>Reviews</h2>
    <span class="heading">User Rating</span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<hr style="border:3px solid #f1f1f1">


<table>
<tr>
<th>UserID</th>
<th>Rating (1-5)</th>
<th>Feedback</th>
</tr>
<?php
require('../db/dbc.php');
// Check connection

$sql = "SELECT userID, rating, feedback FROM reviews_table";
$result = $dbc->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["userID"]. "</td><td>" . $row["rating"] . "</td><td>"
. $row["feedback"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$dbc->close();
?>
</table>

<br/>
<br/>
  <form action="./db/reviewProcess.php" method="post">
    <p style="width:100%">Rate our overall services. (1-5)</p>
    <input type="number" id="rating" name="rating" min="1" max="5" required> 
    <p style="width:100%">Write your feedback.</p>
      <textarea class="form" rows="5" id='feedback' name='feedback' required></textarea>
      <br>
      <button type="submit" name='reviewSubmit'>Submit</button>
  </form>
</div>