<?php //login.php
  $dbhost  = 'localhost';    
  $dbuser  = 'yize';  
  $dbpassword  = 'password'; 
  $dbname = 'HW3';  

  $connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
  if (mysqli_connect_error()) die(mysqli_connect_error());

  if (isset($_POST['year']) && ($_POST['year'] != -1)) {
  	$year = sanitizeString($connection, $_POST['year']);
  	$query = "SELECT * FROM BabyNames WHERE year='$year'";
  }
  else {
  	$query = "SELECT * FROM BabyNames WHERE true";
  }

  if (isset($_POST['gender']) && ($_POST['gender'] != -1)) {
  	$gender = sanitizeString($connection, $_POST['gender']);
  	$query = $query." AND gender='$gender';";
  }
  else {
  	$query = $query." AND true ORDER BY gender DESC, year ASC, ranking ASC;";
  }


  // get info from db
  $result = mysqli_query($connection, $query);
  
  echo "<table><tr>".
       "<th>name</th>".
       "<th>year</th>".
       "<th>ranking</th>".
       "<th>gender</th></tr>";

  while($row = mysqli_fetch_array($result)){
    echo "<tr>";
    for($i = 0; $i < 4; $i++){
      echo "<td>".$row[$i]."</td>";
    }
    echo "</tr>";
  }
  echo "</table>";
  mysqli_close($connection);


  function sanitizeString($connection, $var)
  {
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return $connection->real_escape_string($var);
  }

?>
