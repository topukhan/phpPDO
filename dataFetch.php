<?php
include_once('connect.php'); 
$query = 'select * from users where id = 1';
$statement = $pdo->query($query);

while($row = $statement->fetch(PDO::FETCH_ASSOC)){
    echo "ID: ". $row['id']. " Name: ". $row['name']. " Email: ". $row['email'];
}
?>