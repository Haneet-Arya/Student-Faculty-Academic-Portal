<?php
 require_once('Includes/header.php');
 require_once('Includes/connection.php');
 if(isset($_SESSION['StudentID']) || isset($_SESSION['Faculty']))
    {
        $_SESSION['GET']=$GetID=$_GET['edit'];
   
        $GetID=$_GET['edit'];
    
    /*else if(isset($_GET['invalidC'])){
        $GetID=$_GET['invalidC'];
        echo "<div class='alert-danger card-title  rounded-top rounded-bottom text-center  m-auto col-lg-5 py-3' ><h5>Course is already registered</h5></div> ";
    }*/
    $sql="select * from student_data where Regno='".$GetID."'";
    $sql2="select * from past_courses where Regno='".$GetID."';";
    $sql3="select * from current_courses where Regno='".$GetID."';";
    mysqli_select_db($con,"student_management");
    $res=mysqli_query($con,$sql);
    $res2=mysqli_query($con,$sql2);
    $res3=mysqli_query($con,$sql3);
    while($row=mysqli_fetch_assoc($res)){
        $Sem=$row['Sem'];
        $CGPA=$row['CGPA'];
        $regno=$row['Regno'];
    }
    $pastCourses= array();
    while($row2=mysqli_fetch_assoc($res2)){
        array_push($pastCourses,$row2['Course']);
    }
    $currentCourses=array();

    while($row3=mysqli_fetch_assoc($res3)){
        array_push($currentCourses,$row3['currCourses']);
    }

?>
<?php
 if(isset($_SESSION['Faculty']) || $_SESSION['GET']==$_SESSION['StudentID'])
 {
     ?>
    <!---->
<div class="container">
    <div class="row mb-5">
        <div class="col-lg-6 m-auto ">
            <div class="mt-5">
                <img src="images/slogin.png" alt="Student Register" width="150" height="150" class="d-flex m-auto">
            </div>
            <div class="card mt-5">
                <div class="card-title bg-dark rounded-top">
                    <h3 class="text-center text-white py-3">Edit Academic Details</h3>
                </div>

                

                <div class="card-body">

                <form action="update.php" method="POST" enctype="multipart/form-data">
              
                
                <input type="text" value="<?php echo $regno?>" class="form-control mb-2" name='regno' readonly>
                <input type="number" placeholder="Current Semester" name="Sem" class="form-control mb-2" value="<?php echo $Sem?>">
                <input type="number" min="0" max="10" step="any" placeholder="your CGPA" name="cgpa" class="form-control mb-2" value="<?php echo $CGPA?>">
                <br>
                <h5>Past Courses:</h5>
                
<!-- 
                        <option value="null">Choose Branch</option>
                    
                    
                   
                    
                    
-->

                <?php
                $j=1;
                $k=count($pastCourses);
                for($i=0;$i < count($pastCourses); $i++){
                    $j+=$i;
                    echo"<input type='text' placeholder='Past Course' name='Coursep$i' class='form-control mb-2' value='$pastCourses[$i]'>";
                                              
                }
                
                ?>
                <br>
                <h5>Current Courses:</h5>
                
                 <?php
                $j=1;
                $cc=count($currentCourses);
                echo"<input type='number' value='$cc' name='sk' style='display:none;'>";
                for($i=0;$i < count($currentCourses); $i++){
                    $j+=$i;

                    echo"<input type='text' placeholder='Current Course' name='Course$i' class='form-control mb-2' value='$currentCourses[$i]'>";

                }

                ?>
                 
                
                
                 <div id="New"></div>
                <div id="Old"></div>
                
                <div class="mt-3">
                <button class="btn btn-success" name="updateacademic">Update</button>
                <button class="btn btn-success" type="button" id='j' onclick=" addO() ">+ Past Course</button>
                <button class="btn btn-success" type="button" id='k' onclick=" addN() ">+ New Course</button>
                
                </div>
                
                       <script>
                    
                    function addN(){
                        document.getElementById("k").style.display="none";
                    document.getElementById("New").innerHTML+="<div class='card mt-3'><div class='card-title bg-dark rounded-top'><h3 class='text-center text-white py-3'>Current  Course </h3></div><input type='text'  name='newCourse' placeholder='Course Title' class='form-control mb-2' required /></div><br>";
                    }
                    function addO(){
                        document.getElementById("j").style.display="none";
                document.getElementById("Old").innerHTML+="<div class='card mt-3'><div class='card-title bg-dark rounded-top'><h3 class='text-center text-white py-3'>Old Course </h3></div> <input type='text'  name='oldCourse' placeholder='Course Title' class='form-control mb-2' required /> </div> <br>";
                    }
                </script> 

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
<?php
    require_once('Includes/footer.php');
?>