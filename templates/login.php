<h2>Login Form</h2>

<form action="./db/loginProcess.php" method="post">
  <div class="imgcontainer">
    <img src="https://www.w3schools.com/howto/img_avatar2.png" style="width: 20%;" alt="Avatar" class="avatar">
  </div>
  <?php
  if(@$_GET['Empty']==true){
    ?>
    <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Empty'] ?></div>
  <?php
  }
  ?>

  <?php 
    if(@$_GET['Invalid']==true){
      ?>
      <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Invalid'] ?></div>                                
      <?php
    }
    ?>

  <div class="container">
    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>
    
    <label for="psw"><b>Password</b></label>
    <input type="password"  name="psw" placeholder="Password" required>
        
    <button type="submit" name="login">Login</button>
  </div>

  
</form>

 
  <br>