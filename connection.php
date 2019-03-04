<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=library", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

  //  $conn = sql('SELECT * FROM book');
  //  var_dump($conn);
	 // $title = $_POST['title'];
	 //  $release_date = $_POST['release_date'];
	 //  $price = $_POST['price'];
	 //  $isbn = $_POST['isbn'];
	 //  $cover = $_POST['cover'];

	 // $sql = "INSERT INTO `book`(`id`,`title`, `release_date`, `price`, `isbn`, `cover`) VALUES (:id, :title, :release_date, :price, :isbn, :cover)";
	  
	 //  $result =  $conn->prepare($sql);
	 //  $query = $result->execute(array(":title"=>$title,":release_date"=>$release_date,":price"=>$price, ":isbn"=>$isbn,":cover"=>$cover));

	 //  if ($query)
	 //  {
	 //    echo 'Data Inserted';
	 //  }else{
	 //    echo'Data Not Inserted';
	 //  }

    
?>