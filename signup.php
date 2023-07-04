<?php
$success = 0;
$user = 0;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'connect.php';
    $userName = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    /*
    $sql = "insert into registration(username,email,password) values('$userName','$email','" . md5($password) . "')";
    $result = mysqli_query($con,$sql);

    if($result){
        echo "Data inserted into the database";
    }
    else{
        die(mysqli_error($con));
    }
    */
    $sql = "select * from registration where username='$userName'";
    $result = mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            //echo "User already exists";
            $user = 1;
        }
        else{
            $sql = "insert into registration(username,email,password) values('$userName','$email','" . md5($password) . "')";
            $result = mysqli_query($con,$sql);
            if($result){
                //echo "Signed up successfully";
                $success = 1;
            }
            else{
                die(mysqli_error($con));
            }
        }
    }

}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <?php
    if($user){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Please login </strong> User already exists.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>
     <?php
    if($success){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success </strong> You have successfully signed up.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>
    <h1 class="text-center">Sign up page</h1>
    <div class="container mt-5">
        <form action="signup.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" placeholder="Enter your name" name="username">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="Enter your email" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">password</label>
                <input type="password" class="form-control" placeholder="Enter your password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>