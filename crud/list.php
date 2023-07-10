<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Create</title>
</head>

<body>
    <div class="container mt-5">
        <div class="col-md-5">
            <a href="./create.php" <?php session_start();
                                    unset($_SESSION["success"]); ?> class="btn btn-primary">create user</a>
            <hr>
        </div>
        <h3>User List</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once('connect.php');
                $query = "SELECT * FROM users";
                $stmt = $pdo->query($query);

                $sl = 1;
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $name = $row['name'];
                    $email = $row['email'];
                    $password = $row['password'];
                    $maskedPassword = substr($password, 0, 4) . str_repeat('*', strlen($password) - 4);
                    $id = $row['id'];
                ?>
                    <tr>
                        <td><?php echo $sl++; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $email; ?></td>
                        <td>
                            <span class="password-mask"><?php echo $maskedPassword; ?></span>
                        </td>
                        <td>
                            <a href="edit.php?id=<?php echo $id; ?>" <?php unset($_SESSION["success"]); ?> class="btn btn-primary d-inline mx-1">Edit</a>
                            <form action="delete.php" method="post" onsubmit="return confirmDelete();" class="d-inline">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <button type="submit" class="btn btn-danger mx-1">Delete</button>
                                
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this user?");
        }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
