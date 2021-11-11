<?php
 session_start();
 $user_id = $_SESSION['Sno'];
echo '<header>
    
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php?user='.$user_id.'">Communication</a>
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarCollapse" style="">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?user='.$user_id.'">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="contactus.php" class="nav-link">Contact Us</a>
                    </li>
                </ul>';
                
                
                
                 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                    echo '
                    <p class="text-light mb-0 mx-2">Welcome: '. $_SESSION['email'] .'</p>
                    <a class="btn btn-primary mx-2" href="partials/_logout.php">Log Out</a>';
                 }
                 else{
                    echo ' <a class="btn btn-outline-primary mx-2" href="partials/_login.php">Log In</a>
                    <a class="btn btn-outline-primary" href="partials/_signup.php">Sign Up</a>';
                    
                 }
            echo '</div>
        </div>
    </nav>
</header>';
?>