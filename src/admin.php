<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    
  header("location: ../index.php");
  
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    <h1>
    You have been logged in admin page
    </h1>

</body>
</html>