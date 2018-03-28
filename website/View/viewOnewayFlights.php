<html>
<head>
  <title>FlyGuys</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="homepage.html" style="color:white">FlyGuys</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="SignIn.html"><span class="glyphicon glyphicon-log-in"></span> Signin</a></li>
        <li><a href="SignUp.html"><span class="glyphicon glyphicon-user"></span>Signup</a></li>
        <li><a href="Basket.html"><i class="fas fa-shopping-basket"></i></a></li>
        <li><a href="Wishlist.html"><i class="far fa-heart"></i></a></li>
        <li><a href="Notifications.html"><i class="fas fa-bell"></i></a></li>

      </ul>
    </div>
  </div>
</nav>
<br><br>
<div class="container-fluid text-center">
  <form action="">
    <?php $count = $onewayFlights[1]->rowCount();?>
    <?php if($count > 0)  { foreach ($onewayFlights[0] as $flight): ?>
      <div class="container" style="background-color:gren">
        <div style="background-color:black;text-align:left;height:34px">
          <p style="font-size:18px;color:white;padding:6px 0px 0px 6px">&nbsp;<b>Outbound</b>&nbsp;&nbsp;&nbsp;<span style="font-size:13px"><?=$flight->DURATION?></span></p>
        </div>
        <div style="background-color:#55aee;border:1px solid black;text-align:left;height:134px">
          <img src="logo.jpg" width="50px" height="50px" style="margin:8px 0px 0px 15px">
          <table style="width:70%;font-size:14px;margin:10px 0px 0px 15px">
            <tr>
              <td><p>Departs:&nbsp;<?=$flight->DEPARTURE_POINT?></p></td>
              <td><p><?=$flight->FLIGHT_TYPE?></p></td>
              <td><p><?=$flight->DEPARTURE_DATE?>&nbsp;&nbsp;<?=$flight->ARRIVAL_TIME?></p></td>
            </tr>
            <tr>
              <td><p>To:&nbsp;<?=$flight->DESTINATION_POINT?></p></td>
              <td><p><?=$flight->FLIGHT_STATUS?></p></td>
              <td><p>£<?=$flight->PRICE?></p></td>
            </tr>
          </table>
          <button class="btn">Select Flight</button>
            </p><br><br>
        </div>
      </div>

    <?php endforeach ?>
    <?php }  else { ?>
      <div class="container" style="background-color:gren">
        <div style="background-color:black;text-align:left;height:34px">
          <p style="font-size:18px;color:white;padding:6px 0px 0px 6px">&nbsp;<b>Outbound</b></p>
        </div>
        <div style="background-color:#55aee;border:1px solid black;text-align:left;height:134px">
          <p style="margin:0px 0px 0px 0px;text-align:center;line-height: 120px;">No Flights Found</p>
        </div>
      </div>
    <?php } ?>
  </form>
</div>

<footer class="container-fluid text-center">
  <nav role="navigation">
    <div id= "sublinks_container">
      <ul id= "sublinks">
        <div class ="blocks"><a href="contactus.php">Contact Us</a></div>
        <div class ="blocks"><a href="help.php">Help</a></div>
      </ul>
    </div>
  </nav>
  <div id= "copyright">
    <p><small>&copy;2018 All Rights Reserved @FlyGuys </small></p>
  </div>
</footer>

</body>
</html>
