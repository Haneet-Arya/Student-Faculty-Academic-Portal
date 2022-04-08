<?php
require_once('Includes/header.php');
require_once('Includes/function.php');
?>


<div class="container">
    <div class="row mb-5">
        <div class="col-lg-6 m-auto">
            <div class="mt-5">
                <img src="images/slogin.png" alt="Student Register" width="150" height="150" class="d-flex m-auto">
            </div>
            <div class="card">
                <div class="card-title bg-dark rounded-top">
                    <h3 class="text-center text-white py-3">Student Registration</h3>
                </div>

                <?php
            
                    RegisterFun();
                
                ?>

                

                <div class="card-body">

                <form action="registerphp.php" method="POST" enctype="multipart/form-data">

                <label class="btn btn-primary">
                    Upload Your Image<input type="file" style="display:none" name="image">

                </label>


                <input type="text" placeholder="First Name" name="FName" class="form-control mb-2">
                <input type="text" placeholder="Last Name" name="LName" class="form-control mb-2">
                <input type="text" placeholder="Registration Number" name="regno" class="form-control mb-2">
                <input type="date" placeholder="DOB DD/MM/YYYY" name="DOB" class="form-control mb-2">
                <select name="branch" class="form-control mb-2">
                    <option value="null">Choose Branch</option>
                    <option value="CSE">Computer Science</option>
                    <option value="IT">Information Technology</option>
                    <option value="ME">Mechanical Engineering</option>
                    <option value="CE">Civil Engineering</option>
                    <option value="BI">Bio Informatics</option>
                </select>
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
