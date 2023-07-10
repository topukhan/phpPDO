<?php 
include_once('connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Edit</title>
</head>

<body>
    <h2 class="bg-info py-2 mb-4 text-center">Edit User</h2>
    <?php 
        $id = $_GET['id'];
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC) ;
        
    ?>

    <form action="update.php" method="post" class="form-control row g-3 w-50 text-center">

        <input type="hidden" name="id" value="<?php echo $id?>">
        <label for="name" class="col-md-2">Name: </label>
        <input required type="text" id="name" name="name" class="col-md-8" value="<?php echo $user['name']?>"> <br>

        <label for="email" class="col-md-2">Email: </label>
        <input disabled type="email" id="email" class="col-md-8 my-2" value="<?php echo $user['email']?>"> <br>

        <label for="password" class="col-md-2">Password: </label>
        <input required type="password" id="password" name="password" class="col-md-8 mb-2" value="<?php echo $user['password']?>"> <br>
        <div class="col-md-4">
            <input type="submit" value="Update" class="btn btn-info">
            <a href="./list.php"  class="btn btn-primary">List</a>
        </div>
        <?php
        session_start();
        if (isset($_SESSION['success'])) {
            echo '<div class="alert alert-success col-md-6 text-center" role="alert">' . $_SESSION["success"] . '</div>';
            unset($_SESSION["success"]);
        }
        ?>


    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>