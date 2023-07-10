<?php
include_once('./connect.php');
session_start();
    $id = $_POST['id'];

    $query = "DELETE FROM users WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $_SESSION['success'] = "User Deleted Successfully";

header("Location: list.php");   

?>