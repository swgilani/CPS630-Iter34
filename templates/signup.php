<script>
      function validatepsw() {
        var password = document.forms["form"]["psw"].value;
        var passwordRepeat = document.forms["form"]["psw-repeat"].value;
        var email = document.forms["form"]["email"].value;
        var check = true;
        //var flag = new Boolean(1);
        if(password != passwordRepeat){
          check = false;
          alert("Passwords do not match:");
        }
        //
        var oReq = new XMLHttpRequest(); // New request object
        oReq.open("get", "../db/emailCheck.php", false);
        //                               ^ Don't block the rest of the execution.
        //                                 Don't wait until the request finishes to
        //                                 continue.
        oReq.onload = function() {
            //If email was found
            if(this.responseText.indexOf("/".concat(email)) != -1){
              alert(email + " is already taken ");
              check = false;
            }
        };
        oReq.send();
        //Check if form submit should be cancelled
        if(check == false){
          event.preventDefault();
          event.returnValue = false;
        }

      }
    </script>



<form name="form" onsubmit="validatepsw();" action="./db/signup.php" method="POST" style="border:1px solid #ccc">
        <div class="container">
          <h1>Sign Up</h1>
          <p style="width:100%">Please fill in this form to create an account.</p>
          <hr>
      
          <label for="email"><b>Email</b></label>
          <input type="email" placeholder="Enter Email" name="email" required>
      
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="psw" required>
      
          <label for="psw-repeat"><b>Repeat Password</b></label>
          <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

          <label for="fname"><b>First Name</b></label>
          <input type="text" placeholder="Enter First Name" name="fname" required>

          <label for="lname"><b>Last Name</b></label>
          <input type="text" placeholder="Enter Last Name" name="lname" required>

          <label for="phone"><b>Phone Number</b></label>
          <input type="tel" id="phone" name="phone" placeholder="012-345-6789" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" maxlength="12" required>

          <label for="postalCode"><b>Home Postal Code</b></label>
          <input type="text" id="postalCode" name="postalCode" placeholder="Enter Postal Code" maxlength="6" required> 
          
          <!-- <input type="submit" name="submit" value='Sign Up'> -->
          <div class="clearfix">
            
            <button type="submit" class="signupbtn" name="submit">Sign Up</button>
          </div>
        </div>
      </form>
 
  <br>