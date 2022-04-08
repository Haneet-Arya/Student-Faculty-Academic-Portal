<?php
require_once('Includes/header.php');
require_once('Includes/function.php');
?>



<div class="container">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="mt-5">
                <img src="images/flogin.png" alt="faculty login" width="150" height="150" class="d-flex m-auto">
            </div>
            <div class="card">
                <div class="card-title bg-dark rounded-top">
                    <h3 class="text-center text-white py-3">Faculty Login</h3>
                </div>

                <?php

                    $msg="Please fill all details";
                    if(isset($_GET['empty']))
                    {
                            echo '<div class="alert alert-danger text-center">'.$msg.'</div>';
                    }
                    $msg="Password Invalid";
                    if(isset($_GET['pinvalid']))
                    {
                            echo '<div class="alert alert-danger text-center">'.$msg.'</div>';
                    }
                    $msg="Invalid Credentials";
                    if(isset($_GET['InvalidCre']))
                    {
                            echo '<div class="alert alert-danger text-center">'.$msg.'</div>';
                    }
                    if(isset($_GET['naccess']))
                    {
                        echo '<div class="alert alert-danger text-center"><img src="images/pdenied.png" alt="X ">'."Please Login First".'</div>';
                    }
                    if(isset($_SESSION['StudentID']))
                    {
                        header("location:view.php?success=".$_SESSION['StudentID']."&faccess");
                        
                    }
                    
                    if(isset($_SESSION['Faculty']))
                    {
                        header("location:faculty-view.php");
                    }


                ?>
                
                
                <div class="card-body">

                <form action="facultyphp.php" method="POST">
                    <input type="text" placeholder="Employee ID" name="empid" class="form-control mb-2">
                    <input type="password" placeholder="password" name="password" class="form-control mb-3" >
                    <button class="btn btn-success" name="login">Login</button>
                    <a href="faculty-register.php" class="card-link float-right">Register</a>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php require_once('Includes/footer.php');
?>
