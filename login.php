<?php
$success = 0;
$user = 0;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'connect.php';
    $userName = $_POST['username'];
    //$email = $_POST['email'];
    $password = $_POST['password'];


    $sql = "select * from registration where username = '$userName' and password='$password'";
    $result = mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            echo "Logged in successfully";
        }
        else{
            echo "Invalid details";
        }
    }

}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center">login to our website</h1>
    <div class="container mt-5">
        <form action="login.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" placeholder="Enter your name" name="username">
            </div>
            <!------
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="Enter your email" name="email">
            </div>
            ------->
            <div class="mb-3">
                <label for="password" class="form-label">password</label>
                <input type="password" class="form-control" placeholder="Enter your password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>

</html>