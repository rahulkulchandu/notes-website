<?php include "partials/_dbconnect.php"?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iNotes-keep save your all notes you can unlimited notes store-free</title>
    <meta name="description" content=" Notes is a good helper to manage your schedules and notes. It gives you a quick and simple notepad
                editing experience when you write notes.">
    <meta name="keywords" content="notepad, notes, savethoughts">
    <meta name="author" content="rahulstudyfork">
    <!-- favicon  -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>
    <?php include "partials/_header.php" ?>

    <?php
            session_start();
            if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
                header("location:partials/_login.php");
            }
      ?>

    <div class="container pt-5 pb-4">
        <div class="alert alert-primary mt-5" role="alert">
            <h4 class="alert-heading">Welcome <?php echo $_SESSION['email'] ?></h4>
            <p class="text-dark">Quickly capture what's on your mind and get a reminder later at the right place or
                time.
                Notes is a good helper to manage your schedules and notes. It gives you a quick and simple notepad
                editing experience when you write notes.</p>
            <hr>
            <p class="mb-0">Our note taking app helps you capture and prioritize ideas, projects and to-do lists, so
                nothing falls through the cracks. Start your free trial today</p>
        </div>
    </div>

    <!-- for adding notes in database -->
    <?php
     $user_id = $_GET['user'];
    if($_SERVER['REQUEST_METHOD']=="POST"){
      $title = $_POST['title'];
      $title = str_replace("<" ,"&lt" , "$title");
      $title = str_replace(">" ,"&gt" , "$title");
      $title = str_replace("'" ,"&apos;" , "$title");
      $desc = $_POST['desc'];
      $desc = str_replace("<" ,"&lt" , "$desc");
      $desc = str_replace(">" ,"&gt" , "$desc");
      $desc = str_replace("'" ,"&apos;" , "$desc");
      $sql = "INSERT INTO `notes` (`note_title`, `note_desc`, `note_id`) VALUES ('$title', '$desc', '$user_id')";
      $result = mysqli_query($conn , $sql);
      if($result){
          echo ' <div class="container">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Successfull-</strong>Added Note !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                </div>';
      }
      else{
        echo ' <div class="container">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Sorry-</strong>Try again !
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        </div>';
      }

    }
    ?>
    <div class="container">
        <form action="<?php echo $_SERVER['REQUEST_URI']?>" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Note Title</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="floatingTextarea2">Note Description</label>
                <textarea name="desc" class="form-control" id="floatingTextarea2" style="height: 100px"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add To Note</button>
        </form>
    </div>

    <!-- this is for fathing notes from database -->
    <div class="container my-3 mb-5 pb-5">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">Sno.</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                   $sql = "SELECT * FROM `notes` WHERE note_id='$user_id'";
                   $result = mysqli_query($conn,$sql);
                   $sn = 1;
                   while($row = mysqli_fetch_assoc($result)){
                       $sno = $row['sno'];
                       $note_title = $row['note_title'];
                       $note_desc = $row['note_desc'];
                    //    $note_id = $row['note_id'];
                       $datetime = $row['datetime'];
                       echo ' <tr>
                       <th scope="row">'.$sn.'</th>
                       <td>'.$note_title.'</td>
                       <td>'.$note_desc.'</td>
                       <td>'.$datetime.'</td>
                       <td><a class="text-decoration-none fw-bold" href="partials/_edit.php?id='.$sno.'">Edit</a></td>
                       <td><a class="text-decoration-none fw-bold" href="partials/_delete.php?id='.$sno.'">Delete</a></td>
                   </tr>';
                   $sn++;
                   }
                //    <th scope="row">'.$sno.'</th>
                ?>
        </table>
    </div>



    <?php include 'partials/_footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
</body>

</html>