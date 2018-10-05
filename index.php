<?php
//start a session
    session_start();


    $sessionID = session_id();
    $_SESSION['sessionId']=$sessionID;
//set cookie with session id
    setcookie("session_id",$sessionID,time()+3600,"/","localhost",false,true);

?>


<!DOCTYPE html>
<html>
<head>
<title></title>
<meta charset="utf-8"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="csrf_load.js"> </script>
<link rel="stylesheet" href="style.css">

</head>
<body>

<div id="login" class="loginsection">
    <div class="login-area">

      <div class="login-inputs">
        <span>Login</span>
      </div>
      <form class="login-form" method="POST" action="server.php">
        <div class="text-input">
          <input type="text" placeholder="Username" id="login-username" name="username">

        </div>
        <div class="text-input">
          <input type="password" placeholder="Password" id="login-password" name="password">
          <br/>
          <!-- <input type="hidden" id="csrfToken" name="CSRF"/> -->
          <input type="text" id="csrfToken" name="CSRF"/>
        </div>
          <br/>
         <input type="submit" class="login-button" name="submit" value="Log in" />
      </form>    
    </div>
  </div>
  <?php
//Check if the session-id cookie is set,
       if(isset($_COOKIE['session_id']))
            {
//get the csrf token and set it in the hidden field
                echo '<script> var token = onLoad();  </script>';
            }
    ?>

</body>
</html>
