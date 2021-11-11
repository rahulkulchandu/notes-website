<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>iNotes-Sign Up</title>
    <style>
    .formm {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
    }
    </style>
</head>

<body>
    <?php
         if($_SERVER['REQUEST_METHOD'] == "POST"){
            include '_dbconnect.php';
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $passwd = $_POST['passwd'];
            $cpassword = $_POST['cpassword'];

            $existSql = "SELECT * FROM `users`WHERE email='$email'";
            $result = mysqli_query($conn , $existSql);
            $numExist = mysqli_num_rows($result);
            if($numExist > 0){
                echo '<div class="alert alert-warning alert-dismissible fade show  mb-0" role="alert">
                <strong>Sorry !</strong> This email already in use.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
            else{
                if($passwd == $cpassword){
                    $hash = password_hash($passwd, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO `users` ( `name`, `email`, `phone`, `password`) VALUES ('$name', '$email', '$phone', '$hash')";
                    $result = mysqli_query($conn , $sql);
                    if($result){
                        header("location:_login.php");
                    }
                    else{
                        echo '<div class="alert alert-warning alert-dismissible fade show  mb-0" role="alert">
                        <strong>Sorry !</strong> Try again later.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                    }
                }
                else{
                    echo '<div class="alert alert-warning alert-dismissible fade show  mb-0" role="alert">
                            <strong>Sorry !</strong>Password and confirm password not match.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }
            }
         }

     ?>

   

    <main class="formm my-5">
        <form action="_signup.php" method="post">
            <h1 class="h3 mb-3 fw-normal">Please Sign up</h1>
            <div class="form-floating">
                <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Name" required>
                <label for="floatingInput">Name</label>
            </div>
            <div class="form-floating">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                    required>
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="number" name="phone" class="form-control" id="floatingPassword" placeholder="Password"
                    required>
                <label for="floatingPassword">Phone</label>
            </div>
            <div class="form-floating">
                <input type="password" name="passwd" class="form-control" id="floatingPassword" placeholder="Password"
                    required>
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating">
                <input type="password" name="cpassword" class="form-control" id="floatingPassword"
                    placeholder="Password" required>
                <label for="floatingPassword">Confirm Password</label>
            </div>
            <div class="checkbox mb-3">
               <p class="mt-2">if already registered <a class="text-decoration-none" href="_login.php">Log In</a></p>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>
            <p class="mt-5 mb-3 text-muted">© 2017–<?php echo date("Y")?></p>
        </form>
    </main>


    <?php include '_footer.php'?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
</body>

</html>