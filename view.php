<?php

require_once('Includes/header.php');
require_once('Includes/connection.php');

    if(isset($_GET['faccess']))
    {
        echo '<div class="alert alert-danger text-center"><img src="images/pdenied.png" alt="X ">'."Please Logout first from this student account".'</div>';
    }

    if(isset($_SESSION['StudentID']) || isset($_SESSION['Faculty']))
    {
        $_SESSION['GET']=$GetID=$_GET['success'];
        $sql="select * from student_data where Regno='".$GetID."'";
        $sql2="select * from past_courses where Regno='".$GetID."';";
        $sql3="select * from current_courses where Regno='".$GetID."';";
        $sql4="select * from contributions where Regno='".$GetID."';";
        $sql5="select * from current_courses where Regno='".$GetID."';";
        $sql6="select * from current_courses where Regno='".$GetID."';";
        $sql9="select * from lor where Regno='".$GetID."';";
        mysqli_select_db($con,"student_management");
        //ALTER TABLE student_data ADD CGPA VARCHAR(10) NOT NULL AFTER Password;
        //ALTER TABLE student_data ADD Sem INT(10) NOT NULL AFTER CGPA;
        //CREATE TABLE past_courses(Regno varchar(10),Course varchar(100));
        //ALTER TABLE past_courses ADD PRIMARY KEY( Regno, Course);
        //CREATE TABLE current_courses(Regno varchar(10),currCourses varchar(100));
        //ALTER TABLE current_courses ADD PRIMARY KEY( Regno, currCourses);
        $res=mysqli_query($con,$sql);
        $res2=mysqli_query($con,$sql2);
        $res3=mysqli_query($con,$sql3);
        $res4=mysqli_query($con,$sql4);
        
        while($row=mysqli_fetch_assoc($res))
        {
            $StudentID= $row['Regno'];
            $Image=$row['Img'];
            $FName=$row['FName'];
            $LName=$row['LName'];
            $DOB=$row['DOB'];
            $Branch=$row['Branch'];
            $Email=$row['Email'];
            $Date=$row['Date'];
            $Sem=$row['Sem'];
            $CGPA=$row['CGPA'];

        }
        
        
        

        

    }
    else{
        header("location:login.php?naccess");
    }





?>


<div class="container">

<div class="row">

<div class="col">
    <div class="card bg-dark text-white mt-3">
        <h3 class="text-center py-3">
            Student Details
        </h3>
    </div>
</div>
</div>


    <?php
            if(isset($_SESSION['Faculty']) || $_SESSION['GET']==$_SESSION['StudentID'])
            {
                

            

        ?>
        <div class="row">
        <div class="col-lg-3">
            <div class="card mt-3">
                <div class="card-title bg-primary text-white py-2 rounded-top">
                    <h4 class="text-center "><?php echo $FName." ".$LName?></h4>
                </div>
                <div class="card-body">
                    <img src="images/<?php echo $Image?>" alt="student image" width="200" height="200" class="rounded-circle" >

                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="card mt-3">
                <table class="table table-striped">
                    <tr>
                        <th>Registration no:</th>
                        <td><?php echo $StudentID?></td>
                    </tr>
                    <tr>
                        <th>First Name</th>
                        <td><?php echo $FName?></td>
                    </tr>
                    <tr>
                        <th>Last Name</th>
                        <td><?php echo $LName?></td>
                    </tr>
                    <tr>
                        <th>Branch</th>
                        <td><?php echo $Branch?></td>
                    </tr>
                    <tr>
                        <th>DOB</th>
                        <td><?php echo $DOB?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo $Email?></td>
                    </tr>
                    <tr>
                        <th>Date of Registration</th>
                        <td><?php echo $Date?></td>
                    </tr>

                </table>
                <a href="studentedit.php?edit=<?php echo $StudentID?>" class="btn btn-success btn-sl">Edit</a>
            </div>
        </div>
    <div class="col">        
    <div class="card bg-dark text-white mt-3">
        <h3 class="text-center py-3">
            Academic Details
        </h3>
    </div>
    </div>
        
        <div class="col-lg-12">
            <div class="card mt-3">
                <table class="table table-striped ">
                <tr>
                    <th>Ongoing Semester:</th>
                    <td><?php echo $Sem ?></td>
                </tr>
                <tr>
                    <th>CPGA Scored:</th>
                    <td><?php echo $CGPA?></td>
                </tr>
                <tr>
                    <th>Courses Completed:</th>
                    <td>
                        <?php
                            //print_r($row2);
                            while($row2=mysqli_fetch_assoc($res2)){
                                echo $row2['Course']."<br>";
                            }
                            
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Current Courses:</th>
                    <td>
                        <?php
                        while($row3=mysqli_fetch_assoc($res3)){
                            echo $row3['currCourses']."<br>";
                        }
                        ?>
                    </td>
                </tr>
                </table>
                <a href="studentacademicedit.php?edit=<?php echo $StudentID?>" class="btn btn-success btn-sl">Edit</a>
            </div>
        </div>



    <div class="col">        
    <div class="card bg-dark text-white mt-3">
        <h3 class="text-center py-3">
                  Contributions
        </h3>
    </div>
    </div>

        
        <div class="col-lg-12">
            
                <?php
                $c=0;
                $res4=mysqli_query($con,$sql4);

                class Contributions{

                    public $id;
                    public $oname;
                    public $iovit;
                    public $role;
                
                }
                $i=0;
                $s=array();

                while($row4=mysqli_fetch_assoc($res4))
                {
                    $s[$i]=new Contributions();
                    $s[$i]->id=$row4['ID'];
                    $s[$i]->oname=$row4['Oname'];
                    $s[$i]->iovit=$row4['IOvit'];
                    $s[$i]->role=$row4['Role'];
                    $i++;
                }
                if(!count($s)){
                    $msg="0 Contributions!";
                    echo '<div class="alert alert-danger text-center">'.$msg.'</div>';
                }
                else{

                    
                    for($i=0;$i<count($s);$i++){
                        $id=$s[$i]->id;
                        $on=$s[$i]->oname;
                        $io=$s[$i]->iovit;
                        $rl=$s[$i]->role;
                       
                    
                    ?>
                     <div align="center">
                     
                        <div class="col-lg-9 " > 
                        
                        <div class="card bg-dark text-white mt-3">

                        <div style="display: inline-block; ">
                            <h3 class="text-center py-3" >
                            Contribution <?php echo $i+1?>  <button style="padding: 0;  outline: none; border: none; background: none; width: 30px; height: 30px;" class="bg-dark rounded-circle mb-2" data-toggle="collapse" data-target="#c<?php echo $i+1?>"><img width="25" height="25" src="images/icons8-expand-arrow-48.png" alt="DropDown"></button>
                            </h3>
                        </div>
                    </div>
                        
                        </div>
    
                        
                        <div class="col-lg-9 collapse" id="c<?php echo $i+1?>">  
                        <div class="card mt-3 " >
                            
                           <table class="table table-striped "  >    
                                <tr>
                                    <th>Organization Name:</th>
                                    <td><?php echo "$on";?></td>
                                </tr>
                                <tr>
                                    <th>Inside/Outside VIT:</th>
                                    <td><?php echo "$io";?></td>
                                </tr>
                                <tr>

                                    <th>Role:</th>
                        
                                    <td><?php echo "$rl";?></td>
                            
                      
 

                 
                                </tr>
                                
                            </table>
                        </div>
                        </div>
                        </div>
                    
                
         
                
            <?php
             }   
            }

               ?>
               <div align="center" >
            <div class="col-lg-9">
            <div class="card mt-3 mb-5">
            <a href="studentcontributionedit.php?edit=<?php echo $StudentID?>" class="btn btn-success btn-sl">Edit Contributions</a>
            </div>
            </div>
            </div>
        </div>

  

    
    <div class="col">        
    <div class="card bg-dark text-white mt-3">
        <h3 class="text-center py-3">
                  Achievements
        </h3>
    </div>
    </div>

    <div class="col-lg-12">
          
            <?php
            $c=0;
            $sql="select * from achievements where Regno='".$GetID."';";
            $res5=mysqli_query($con,$sql);

            class Achievements{
                public $id;
                public $type;
                public $des;
                public $year;
                            
            }
            $i=0;
            $s=array();
            while($row5=mysqli_fetch_assoc($res5))
            {
                $s[$i]=new Achievements();
                $s[$i]->id=$row5['ID'];
                $s[$i]->type=$row5['Type'];
                $s[$i]->des=$row5['Description'];
                $s[$i]->year=$row5['Year'];
                $i++;
            }
            if(!count($s)){
                $msg="0 Achievements!";
                echo '<div class="alert alert-danger text-center">'.$msg.'</div>';
            }
            else{

                
                for($i=0;$i<count($s);$i++){
                    $id=$s[$i]->id;
                    $ty=$s[$i]->type;
                    $ds=$s[$i]->des;
                    $yr=$s[$i]->year;
                   
                
                ?>
                 <div align="center">
                    <div class="col-lg-9"> 
                    <div class="card bg-dark text-white mt-3">

                    <div style="display: inline-block; ">
                    <h3 class="text-center py-3">
                       Achievement <?php echo $i+1?> <button style="padding: 0;  outline: none; border: none; background: none; width: 30px; height: 30px;" class="bg-dark rounded-circle mb-2" data-toggle="collapse" data-target="#c<?php echo $i+1?>"><img width="25" height="25" src="images/icons8-expand-arrow-48.png" alt="DropDown"></button>
                    </h3>
                    </div>
                    </div>
                    </div>

                    
                    <div class="col-lg-9 collapse" id="c<?php echo $i+1?>"> 
                    <div class="card mt-3" >
                        
                       <table class="table table-striped "  >    
                            <tr>
                                <th>Type:</th>
                                <td><?php echo "$ty";?></td>
                            </tr>
                            <tr>
                                <th>Description:</th>
                                <td><?php echo "$ds";?></td>
                            </tr>
                            <tr>

                                <th>Year:</th>
                    
                                <td><?php echo "$yr";?></td>
                        
                  


             
                            </tr>
                            
                        </table>
                    </div>
                    </div>
                    </div>
                
            
     
            
        <?php
         }   
        }

           ?>
            <div align="center" >
            <div class="col-lg-9">
            <div class="card mt-3 mb-5">
            <a href="studentachievementedit.php?edit=<?php echo $StudentID?>" class="btn btn-success btn-sl">Edit Achievements</a>
            </div>
            </div>
            </div>
        </div>
    
    <div class="col">        
    <div class="card bg-dark text-white mt-3">
        <h3 class="text-center py-3">
                  Projects
        </h3>
    </div>
    </div>
    
    <div class="col-lg-12">  
   
            
            <?php
            $c=0;
            $sql7="select * from projects where Regno='".$GetID."';";
            $res6=mysqli_query($con,$sql7);
            
            class Projects {
    
                public $id;
                public $title;
                public $desc;
                public $tech;
                public $link;
                
              
              }
              $i=0;
              $s=array();
              
              
            while($row6=mysqli_fetch_assoc($res6)){
                $s[$i]=new Projects();
                $s[$i]->id=$row6['ID'];
                $s[$i]->title=$row6['Title'];
                $s[$i]->desc=$row6['Description'];
                $s[$i]->tech=$row6['Technologies'];
                $s[$i]->link=$row6['Link'];
                $i++;
            }
            if(!count($s)){
                $msg="0 Projects!";
                echo '<div class="alert alert-danger text-center">'.$msg.'</div>';
                
            }
            else{
                
                     
                 
                

                
                
                 for($i=0;$i<count($s);$i++){
                    $id=$s[$i]->id;
                    $t=$s[$i]->title;
                    $d=$s[$i]->desc;
                    $te=$s[$i]->tech;
                    $l=$s[$i]->link;
                   //echo"$te";
                
                ?>
                        <div align="center">
                        <div class="col-lg-9"> 
                        <div class="card bg-dark text-white mt-3">
                        <div style="display: inline-block; ">
                        <h3 class="text-center py-3">
                           Project <?php echo $i+1?> <button style="padding: 0;  outline: none; border: none; background: none; width: 30px; height: 30px;" class="bg-dark rounded-circle mb-2" data-toggle="collapse" data-target="#c<?php echo $i+1?>"><img width="25" height="25" src="images/icons8-expand-arrow-48.png" alt="DropDown"></button>
                        </h3>
                        </div>
                        </div>
                        </div>
    
                        
                        <div class="col-lg-9 collapse" id="c<?php echo $i+1?>">    
                        <div class="card mt-3" >
                            
                           <table class="table table-striped "  >    
                                <tr>
                                    <th>Title:</th>
                                    <td><?php echo "$t";?></td>
                                </tr>
                                <tr>
                                    <th>Description:</th>
                                    <td><?php echo "$d";?></td>
                                </tr>
                                <tr>

                                    <th>Technologies Involved:</th>
                        
                                    <td><?php echo "$te";?></td>
                            
                      
 

                 
                                </tr>
                                <tr>
                                    <th>Github/Demo Link:</th>
                                    <td align="left"><a href=<?php echo "$l";?>><?php echo "$l";?></a></td>
                                </tr>
                            </table>
                        </div>
                        </div>
                        </div>
                    
                
         
                
            <?php
             }   
            }

               ?>
           
           <div align="center" >
            <div class="col-lg-9">
            <div class="card mt-3 mb-5">
        <a href="studentprojectedit.php?edit=<?php echo $StudentID?>" class="btn btn-success btn-sl">Edit Projects</a>
        </div>
            </div>
            </div>
        </div>


    <div class="col">  
    <div class="card bg-dark text-white mt-3">
        <h3 class="text-center py-3">
                  Internships
        </h3>
    </div>
    </div>

    <div class="col-lg-12">
            
            <?php
            $c=0;
            $sql="select * from internships where Regno='".$GetID."'";
            $res7=mysqli_query($con,$sql);
            class Internships{

                public $id;
                public $cname;
                public $role;
            
            }

            $i=0;
            $s=array();
            while($row7=mysqli_fetch_assoc($res7))
            {
                $s[$i]=new Internships();
                $s[$i]->id=$row7['ID'];
                $s[$i]->cname=$row7['Cname'];
                $s[$i]->role=$row7['Role'];
                $i++;
            }
            if(!count($s)){
                $msg="0 Internships!";
                echo '<div class="alert alert-danger text-center">'.$msg.'</div>';
            }
            else{

                    
                for($i=0;$i<count($s);$i++){
                    $id=$s[$i]->id;
                    $cn=$s[$i]->cname;
                    $rl=$s[$i]->role;
                   
                
                ?>
                 <div align="center">
                    <div class="col-lg-9"> 
                    <div class="card bg-dark text-white mt-3">

                    
                    <div style="display: inline-block; ">
                    <h3 class="text-center py-3">
                       Internship <?php echo $i+1?> <button style="padding: 0;  outline: none; border: none; background: none; width: 30px; height: 30px;" class="bg-dark rounded-circle mb-2" data-toggle="collapse" data-target="#c<?php echo $i+1?>"><img width="25" height="25" src="images/icons8-expand-arrow-48.png" alt="DropDown"></button>
                    </h3>
                    </div>
                    </div>
                    </div>

                    
                    <div class="col-lg-9 collapse" id="c<?php echo $i+1?>">  
                    <div class="card mt-3" >
                        
                       <table class="table table-striped "  >    
                            <tr>
                                <th>Company Name:</th>
                                <td><?php echo "$cn";?></td>
                            </tr>
                            <tr>

                                <th>Role:</th>
                    
                                <td><?php echo "$rl";?></td>
                        
                            </tr>
                            
                        </table>
                    </div>
                    </div>
                    </div>
                
            
     
            
        <?php
         }   
        }           

               ?>
               
               <div align="center" >
            <div class="col-lg-9">
            <div class="card mt-3 mb-5">
            
            <a href="studentinternshipsedit.php?edit=<?php echo $StudentID?>" class="btn btn-success btn-sl">Edit Internships</a>
            </div>
            </div>
            </div>
        </div>

        
    <div class="col">  
    <div class="card bg-dark text-white mt-3">
        <h3 class="text-center py-3">
                  LOR
        </h3>
    </div>
    <div class="col-lg-12 mb-5">
    <div class="card mt-3">
    <table class="table table-striped "  >
    <tr><th>Faculty:</th><th>View</th></tr>
    <?php
    $res10=mysqli_query($con,$sql9);
    $arr=array();
    while($row=mysqli_fetch_assoc($res10)){

    $fid=$row['FacultyID'];
    $sqlfac="select * from faculty_data where FacultyID='$fid'";
        

        $result=mysqli_query($con,$sqlfac);
        while($row=mysqli_fetch_assoc($result)){
            $fname=$row['FacultyName'];
            
        }
                            if(!isset($_SESSION['Faculty']))
                            {
                            echo "<tr>".
                                "<th>Dr. $fname</th>".
                                "<td><a href='pdf.php?Faculty=$fid' class='btn btn-success btn-sl'>View</a></td>".
                            "</tr>";
                            }
                            else{
                                echo "<tr>".
                                "<th>Dr. $fname</th>".
                            "</tr>";
                            }                       
}
                            ?>
   
                            
    </table>

    
    
           
                
            </div>
        </div>
        <br>
    <br>
        


    </div>
    
   

<?php
}
else{

    $msg="Permission Denied";

    echo '<div class="alert alert-danger text-center"><img src="images/pdenied.png" alt="X "> '.$msg.'</div> ';

}


?>

</div>

    
<?php
    require_once('Includes/footer.php');
?>
