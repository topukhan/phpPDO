<?php
$host = 'localhost';
$dbname = 'test';
$user = 'root';
$password = '';

// create pdo connection
try{
    $pdo = new PDO('mysql:host=localhost;dbname=test', $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "connect successfully";
}
catch(PDOException $e){
    die("Connection failed: " . $e->getMessage());

}


?>
