<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>iNotes-Log in</title>
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
    if($_SERVER['REQUEST_METHOD']=="POST"){
        include '_dbconnect.php';
        $logemail = $_POST['email'];
        $passwd = $_POST['passwd'];
        $sql = "Select * from users WHERE email='$logemail'";
        $result = mysqli_query($conn , $sql);
        $num = mysqli_num_rows($result);
        if($num == 1){
            $row = mysqli_fetch_assoc($result);
            if(password_verify($passwd , $row['password'])){
                // echo "log in";
                $user_id = $row['Sno'];
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $logemail;
                $_SESSION['Sno'] = $user_id;
                header("location:../index.php?user=$user_id");
                exit;
            }
            else{
                echo '<div class="alert alert-warning alert-dismissible fade show  mb-0" role="alert">
                <strong>Invalid Credientals!</strong> Try again.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
        }
        else{
            echo '<div class="alert alert-warning alert-dismissible fade show  mb-0" role="alert">
            <strong>Invalid Credientals!</strong> Try again.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }

    }

    ?>

    <main class="formm my-5">
        <form action="_login.php" method="post">
            <h1 class="h3 mb-3 fw-normal">Please Log in</h1>

            <div class="form-floating">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" name="passwd" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <div class="checkbox mb-3">
               <p class="mt-2">if not registered <a class="text-decoration-none" href="_signup.php">Sign Up</a></p>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Log in</button>
            <p class="mt-5 mb-3 text-muted">© 2017–2021</p>
        </form>
    </main>


   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
</body>

</html>