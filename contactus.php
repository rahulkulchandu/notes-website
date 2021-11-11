<?php include 'partials/_dbconnect.php' ?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>iNotes-contact</title>
</head>

<body>
    <!-- this is navbar -->
    <?php include 'partials/_header.php' ?>

    <!-- send the data into database -->
    <?php
          $insrt = false;
          $insrt_fail = false;
          if($_SERVER['REQUEST_METHOD'] == "POST"){
              $name = $_POST['name'];
              $email = $_POST['email'];
              $phone = $_POST['phone'];
              $state = $_POST['state'];
              $suggest = $_POST['suggest'];
              $sql = "INSERT INTO `contactus` (`name`, `email`, `phone`, `state`, `suggestion`) VALUES ('$name', '$email', '$phone', '$state', '$suggest')";
              $result = mysqli_query($conn , $sql);
              if($result){
                $insrt = true;
              }
              else{
                  $insrt_fail = true;
              }
          }

     ?>
    <div class="container-fluid mt-5 pt-3">
        <?php
           if($insrt){
            echo '<div class="mb-0 alert alert-success alert-dismissible fade show" role="alert">
            <strong>Thank-You!</strong> For Your suggestion- We will Soon Solved!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
           }
           if($insrt_fail){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Sorry!</strong> Try Again After Some Time!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
           }
        ?>
    </div>
    <div class="container pt-1">
        <form class="row g-3 my-4" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <div class="col-md-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="col-md-6">
                <label for="phone" class="form-label">Phone</label>
                <input type="number" class="form-control" name="phone" id="phone" required>
            </div>
            <div class="col-6">
                <label for="state" class="form-label">State</label>
                <input type="text" class="form-control" name="state" id="state" placeholder="Haryana" required>
            </div>
            <div class="col-12">
                <label for="suggest" class="form-label">How We Can help You</label>
                <textarea class="form-control" placeholder="Give Suggestion Here" name="suggest" required id="suggest"
                    style="height: 100px"></textarea>
            </div>

            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Check me out
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <?php include 'partials/_footer.php' ?>










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
</body>

</html>