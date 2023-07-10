<?php
include_once('connect.php');
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST["name"];
    $password = $_POST["password"];

    $query = "UPDATE users SET name = :name, password = :password WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $_SESSION['success'] = "User Updated Successfully";
}
header("Location: list.php");

?>