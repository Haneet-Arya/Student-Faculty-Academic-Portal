<?php
require_once('Includes/header.php');
require_once('Includes/function.php');
?>


<div class="container">
    <div class="row mb-5">
        <div class="col-lg-6 m-auto">
            <div class="mt-5">
                <img src="images/flogin.png" alt="Faculty Register" width="150" height="150" class="d-flex m-auto">
            </div>
            <div class="card">
                <div class="card-title bg-dark rounded-top">
                    <h3 class="text-center text-white py-3">Faculty Registration</h3>
                </div>
                <?php
            
            FacRegisterFun();
        
        ?>

                

                <div class="card-body">

                <form action="faculty-registerphp.php" method="POST" enctype="multipart/form-data">



                <input type="text" placeholder="Name" name="Name" class="form-control mb-2">
                <input type="text" placeholder="ID" name="id" class="form-control mb-2">
                <input type="email" placeholder="Email" name="email" class="form-control mb-2">
                <input type="password" placeholder="password" name="password" class="form-control mb-3" >
                
                
                <button class="btn btn-success" name="register">Register</button>

                </form >
                </div>
            </div>
        </div>
    </div>
</div>



<?php require_once('Includes/footer.php');
?>
