<!doctype html>
<html ng-app="app">
  <head>

  
    <meta charset="utf-8">
    <title>Plan for Smart Services(PS2)</title>
    <script src="/scripts/location.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular-route.js"></script>
    <script src="/Iter34/node_modules/angular-css/angular-css.js"></script>
    <script src="/Iter34/css/styles.css"></script>
  </head>
  <body>
    <ul id = "menu">
        <li><a href="#!/">Home</a></li>
  
        <?php if (isset($_SESSION['user']) && $_SESSION['userID'] == 1){
        echo "<li><a href='#'>db Maintain</a>";
        echo "<ul>";
        echo "<li><a href='templates/insert.php'>Insert</a></li>";
        echo "<li><a href='templates/delete.php'>Delete</a></li>";
        echo "<li><a href='templates/select.php'>Select</a></li>";
        echo"<li><a href='templates/update.php'>Update</a></li>";
        echo"</ul>";
        echo"</li>";
        }
        ?>
        <li><a href="#!/aboutus">About Us</a></li>
        <li><a href="#!/contactus">Contact Us</a></li>
        
        <?php if (isset($_SESSION['user'])){
          echo "<li style='float:right'><a href='scripts/logout.php'>Sign Out</a></li>";
          echo "<li style='float:right'><a href=''>Welcome ". $_SESSION['user'] ."</a></li>";
          
        }
        else {
          echo "<li style='float:right'><a href='templates/signup.php'>Sign Up</a></li>";
        }
        ?>
        
        <li><a href="#!/reviews">Reviews</a></li>
        <?php if (!isset($_SESSION['user'])){
          echo "<li style='float:right'><a href='templates/login.php'>Login</a></li>";
        }
        ?>
        <li style="float:right"><a href="#"><span onclick="search()">Search</span></a></li>
        <li><a href="#">Type of Services</a>
          <ul>
            <li><a href="#!/rideshare">Rideshare</a></li>
            <li><a href="#!/ride_and_delivery">Ride & Delivery</a></li>
          </ul>
        </li>
        
      </ul>
  
      <div id="search" style="float:right; display:none;">
        <form action="#" method="POST">
          <input type="text" placeholder="Search..." name="search">
          <button name="submit_result" type="submit">submit</button>
        </form>
      </div>
  
      <br><br>
    
      <p style="width:auto;float:right;text-align:right;">
      <?php
      if (isset($_POST['submit_result'])){
        $search = $_POST["search"];
        $sql = "SELECT * FROM order_table WHERE order_ID =" . $search;
        //select order_id from order_table where userid = $userd, order_id = $order_id
        $result = $dbc->query($sql);
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            echo "Your order ID is ".$search." has completed.";
          }
        } else {
          echo "Cannot find order ID ".$search.", please try again.";
        }
      }
      ?>
    </p>






    <!-- View of content in the selected page-->
    <div ng-view></div>
    <script>
        var app = angular.module("app", ['ngRoute', 'angularCSS']);
        app.config(function($routeProvider){
            $routeProvider
            .when("/", {
              templateUrl: "templates/home.php", 
              css: '/Iter34/css/styles.css'
            })
            .when("/aboutus", {
              templateUrl: "templates/aboutus.php", 
              css: '/Iter34/css/styles.css'
            })
            .when("/contactus", {
              templateUrl: "templates/contactus.php",
               css: '/Iter34/css/styles.css'
              })
            .when("/reviews", {
              templateUrl: "templates/reviews.php", 
              css: '/Iter34/css/reviews.css'
            })
            .when("/rideshare", {
              templateUrl: "templates/rideshare.php", 
              css: '/Iter34/css/styles.css',
              controller: 'MainCtrl'
            })
            .when("/ride_and_delivery", {
              templateUrl: "<h2>ride_and_delivery</h2>",
               css: '/Iter34/css/styles.css'
              })

        });

        app.controller('MainCtrl', function ($scope, $window) {

        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
    $window.map = new google.maps.Map(document.getElementById('map'), {
      zoom: 9,
      center: {lat: 43.7272, lng: -79.4121}
    });

    directionsDisplay.setMap($window.map);

    var onChangeHandler = function() {
      calculateAndDisplayRoute(directionsService, directionsDisplay);
    };

    document.getElementById('start').addEventListener('change', onChangeHandler);
    document.getElementById('end').addEventListener('change', onChangeHandler);

  });

  function calculateAndDisplayRoute(directionsService, directionsDisplay) {
    directionsService.route({
      origin: document.getElementById('start').value,
      destination: document.getElementById('end').value,
      travelMode: 'DRIVING'
    }, function(response, status) {
      if (status === 'OK') {
        directionsDisplay.setDirections(response);
        
      }
    });
  }
      


    </script>

<script async defer src="https://maps.googleapis.com/maps/api/js?
key=AIzaSyDnTsfcAT5zS8NQ5d2QcxIpcU3w6835QbI&callback=initMap">
</script>



  </body>
</html>