<?php // index.php
  header('Content-type: text/xml');
  $dbhost  = 'localhost';    
  $dbuser  = 'root';  
  $dbpassword  = 'root'; 
  $dbname = 'HW4';  

  $connection = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
  if ($connection->connect_error) die($connection->connect_error);

  $uri = explode("/", $_SERVER['REQUEST_URI']);
  $uri_book_id = $uri[2];
  if ($uri_book_id != '')
    $query = "SELECT `Book-id`, title, price, category FROM book WHERE `Book-id`=$uri_book_id";
  else
    $query = "SELECT `Book-id`, title, price, category FROM book";


  // get info from db
  $result = $connection->query($query);
  
  if (!$result) {
    die($connection->error);
  }
  else if ($result->num_rows) {
    // $rows = $result->num_rows;
    // echo "<style> td, th {border:1px black solid;} </style>";
    // echo "<table>";
    // echo "<th><tr><th>title</th><th>year</th><th>price</th><th>category</th></tr>";
    

    // for ($j = 0 ; $j < $rows ; ++$j) {
    //  $row = $result->fetch_array(MYSQLI_ASSOC);
    //  echo "<tr><td>".$row['title']."</td><td>".$row['price']."</td><td>".$row['category']."</td></tr>";
    // }  
    // echo "</table>";

    $booksArray = array();
    while ($row = $result->fetch_assoc()) {
     array_push($booksArray, $row);
    }

    if(count($booksArray)){
        createXMLfile($booksArray);
        $file = file_get_contents('book.xml');
        echo $file;
    }

    $result->close();
    /* close connection */
    $mysqli->close();

  }
  else die("Invalid username/password combination");  

  function createXMLfile($booksArray){
   $filePath = 'book.xml';
   $dom = new DOMDocument('1.0', 'utf-8'); 
   $root = $dom->createElement('books'); 

   for($i=0; $i<count($booksArray); $i++){
     $bookId =  $booksArray[$i]['Book-id'];  
     $title =  $booksArray[$i]['title']; 
     //$year = $booksArray[$i]['year'];
     $price     =  $booksArray[$i]['price']; 
     $category  =  $booksArray[$i]['category']; 


     $book = $dom->createElement('book');
     $book->setAttribute('id', $bookId);

     $name = $dom->createElement('title', $title); 
     $book->appendChild($name);

     // $book_year = $dom->createElement('year', $year); 
     // $book->appendChild($book_year); 

     $book_price = $dom->createElement('price', $price); 
     $book->appendChild($book_price); 
     
     $book_category = $dom->createElement('category', $category); 
     $book->appendChild($book_category);
 
     $root->appendChild($book);

   }

   $dom->appendChild($root); 
   $dom->save($filePath); 
 }
 
?>
