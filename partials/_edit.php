<?php include "_dbconnect.php" ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>iNotes-updation</title>
</head>

<body>
    <div class="container mt-2">
        <div class="alert alert-primary mt-5" role="alert">
            <h4 class="alert-heading">Update Notes</h4>
        </div>
    </div>
    <!-- this is for unupdate data display  -->
    <?php
       $id = $_GET['id'];
       $sql = "SELECT * FROM `notes` WHERE sno='$id'";
       $result = mysqli_query($conn,$sql);
       $row = mysqli_fetch_assoc($result);
       $title = $row['note_title'];
       $desc = $row['note_desc'];
    ?>
    <!-- this is for update data  -->
    <?php
          if($_SERVER['REQUEST_METHOD']=="POST"){
              $new_title = $_POST['new_title'];
              $new_title = str_replace("<" ,"&lt" , "$new_title");
              $new_title = str_replace(">" ,"&gt" , "$new_title");
              $new_title = str_replace("'" ,"&apos;" , "$new_title");
              $new_desc = $_POST['new_desc'];
              $new_desc = str_replace("<" ,"&lt" , "$new_desc");
              $new_desc = str_replace(">" ,"&gt" , "$new_desc");
              $new_desc = str_replace("'" ,"&apos;" , "$new_desc");
              $updt = "UPDATE `notes` set note_title='$new_title' , note_desc='$new_desc' WHERE sno='$id'";
              $result2 = mysqli_query($conn, $updt);
              if($result2){
                //   echo "updated";
                session_start();
                $user_id = $_SESSION['Sno'];
                header("location:../index.php?user=$user_id");
              }
              else{
                  echo ' <div class="container">
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
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
                <label for="exampleInputEmail1" class="form-label">New Note Title</label>
                <input type="text" name="new_title" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" value="<?php echo $title?>">
            </div>
            <div class="mb-3">
                <label for="floatingTextarea2">New Note Description</label>
                <textarea name="new_desc" class="form-control"  id="floatingTextarea2" style="height: 100px"><?php echo $desc?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Note</button>
        </form>
    </div>




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