<?php
require_once('Includes/header.php');

require_once('Includes/function.php');
?>



<div class="container">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="mt-5">
                <img src="images/slogin.png" alt="student login" width="150" height="150" class="d-flex m-auto">
            </div>
            <div class="card">
                <div class="card-title bg-dark rounded-top">
                    <h3 class="text-center text-white py-3">Student Login</h3>
                </div>

                <?php

                    loginfun();

                ?>
                
                <div class="card-body">

                <form action="loginphp.php" method="POST">

                    <input type="text" placeholder="Registration Number" name="regno" class="form-control mb-2">
                    <input type="password" placeholder="password" name="password" class="form-control mb-3" >
                    <button class="btn btn-success" name="login">Login</button>
                    <a href="register.php" class="card-link float-right">Register</a>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php require_once('Includes/footer.php');
?>
