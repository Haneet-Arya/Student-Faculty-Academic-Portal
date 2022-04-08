<?php

    require_once('Includes/header.php');
    require_once('Includes/connection.php');
    if(isset($_SESSION['StudentID']) || isset($_SESSION['Faculty']))
    {
        $_SESSION['GET']=$GetID=$_GET['edit'];
   
        $GetID=$_GET['edit'];
        $sql="select * from student_data where Regno='".$GetID."'";
        mysqli_select_db($con,"student_management");
        $res=mysqli_query($con,$sql);

        while($row=mysqli_fetch_assoc($res))
        {
            $StudentID= $row['Regno'];
            $Image=$row['Img'];
            $FName=$row['FName'];
            $LName=$row['LName'];
            $DOB=$row['DOB'];
            $Branch=$row['Branch'];
            $Email=$row['Email'];
            $Pass=MD5($row['Password']);
            
        }
    
    ?>


<?php
 if(isset($_SESSION['Faculty']) || $_SESSION['GET']==$_SESSION['StudentID'])
 {
     ?>
<div class="container">
    <div class="row mb-5">
        <div class="col-lg-6 m-auto">
            <div class="mt-5">
                <img src="images/slogin.png" alt="Student Register" width="150" height="150" class="d-flex m-auto">
            </div>
            <div class="card">
                <div class="card-title bg-dark rounded-top">
                    <h3 class="text-center text-white py-3">Edit Details</h3>
                </div>

                

                <div class="card-body">

                <form action="update.php" method="POST" enctype="multipart/form-data">
              
                <label class="btn btn-primary">
                    Upload Your Image<input type="file" style="display:none" name="image">

                </label>
                <img src="images/<?php echo $Image?>" width="50" height="50" class="rounded-circle mb-2">

                <input type="text" placeholder="First Name" name="FName" class="form-control mb-2" value="<?php echo $FName?>">
                <input type="text" placeholder="Last Name" name="LName" class="form-control mb-2" value="<?php echo $LName?>">
                <input type="text" placeholder="Registration Number" name="regno" class="form-control mb-2" value="<?php echo $StudentID?>" readonly>
                <input type="date" placeholder="DOB DD/MM/YYYY" name="DOB" class="form-control mb-2" value="<?php echo $DOB?>">
                <select name="branch" class="form-control mb-2">
<!-- 
                        <option value="null">Choose Branch</option>
                    
                    
                   
                    
                    
-->

                <?php
                if($Branch=="CSE")
                {
                    echo '<option value="CSE">Computer Science</option';
                }
                elseif($Branch=="IT")
                {
                    echo '<option value="IT">Information Technology</option>';
                }
                elseif($Branch=="ME")
                {
                    echo '<option value="ME">Mechanical Engineering</option>';
                }
                elseif($Branch=="CE")
                {
                    echo '<option value="CE">Civil Engineering</option>';
                }
                elseif($Branch=="BI")
                {
                    echo '<option value="BI">Bio Informatics</option>';
                }

                ?>
                </select>
                <input type="email" placeholder="Email" name="email" class="form-control mb-2" value="<?php echo $Email?>">
                
                <input type="password" placeholder="password" name="password" class="form-control mb-3" value="<?php echo $Pass?>" >
                
                
                <button class="btn btn-success" name="update">Update</button>

                </form >
                </div>
            </div>
        </div>
    </div>
</div>
<?php
 }
else{

    $msg="Permission Denied";

    echo '<div class="alert alert-danger text-center"><img src="images/pdenied.png" alt="X "> '.$msg.'</div> ';

}
}
else
{
    header("location:login.php?naccess");
}

?>


<?php require_once('Includes/footer.php'); ?>

