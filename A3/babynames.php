<?php //login.php
  $dbhost  = 'localhost';    
  $dbuser  = 'yize';  
  $dbpassword  = 'password'; 
  $dbname = 'HW3';  

  $connection = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
  if ($connection->connect_error) die($connection->connect_error);


  if (!isset($_POST['year'])) {
  	$isYearSelected = true;
  	$year = sanitizeString($connection, $_POST['year']);
  	$query = "SELECT * FROM BabyNames WHERE year='$year'";
  }
  else {
  	$isYearSelected = false;
  	$query = "SELECT * FROM BabyNames WHERE true";
  }

  if (!isset($_POST['gender'])) {
  	$isGenderSelected = true;
  	$gender = sanitizeString($connection, $_POST['gender']);
  	$query = $query." AND gender='$gender';"
  }
  else {
  	$isGenderSelected = false;
  	$query = $query." AND true;";
  }


 	echo $query;
  // get info from db
  $result = $connection->query($query);
  
  if (!$result) {
    die($connection->error);
  }
  else if ($result->num_rows) {
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $result->close();

    if ($password == $row['password']) {
      $_SESSION['username'] = $row['username'];
      $_SESSION['password'] = $row['password'];
      $_SESSION['name'] = $row['fullname'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['avatar'] = $row['avatar'];

      $connection->close();
      echo '<script>window.location.href = "welcome.php";</script>';
    }
    else die("Invalid username/password combination");
  }
  else die("Invalid username/password combination");  


  function sanitizeString($connection, $var)
  {
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return $connection->real_escape_string($var);
  }

?>
