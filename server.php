<?php

//start session
session_start();

//check token already generated or not
if(empty($_SESSION['tokenkey']))
{
//generate and set the token to the SESSION
    $_SESSION['tokenkey']=bin2hex(random_bytes(32));
    
}

//generate CSRF token
$token = sha1( $_SESSION['tokenkey']. $_SESSION['sessionId'].'IT15143914' );

$_SESSION['CSRF'] = $token; 

ob_start(); 

echo $token;


if(isset($_POST['submit']))
{
    ob_end_clean();
    
//login validation
    validate_login($_POST['CSRF'],$_COOKIE['session_id'],$_POST['username'],$_POST['password']);

}

function validate_login($CSRF,$session_ID, $username, $password)
{
    if($username=="admin" && $password=="admin" && $CSRF==$_SESSION['CSRF'] && $session_ID== $_SESSION['sessionId'])
    {
        echo "<script> alert('Login Sucessful') </script>";
        echo "Login successful! Welcome"."<br/>"; 
        echo "Username : $username"."<br/>";
        echo "Password : $password"."<br/>";
        echo "Token : $CSRF"."<br/>";
       
       
    }
    else
    {
        echo "<script> alert('Login Failed') </script>";
        echo "Login Failed ! "."<br/>";
        
    }
}


?>