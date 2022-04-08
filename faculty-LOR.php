<?php session_start(); ?>
<link rel='stylesheet' href='bootstrap/bootstrap.css'>
<?php

    //require_once('Includes/header.php');
    require_once('Includes/connection.php');
    // if(isset($_GET['saccess']))
    // {
    //     echo '<div class="alert alert-danger text-center"><img src="images/pdenied.png" alt="X ">'."Please Logout first from this faculty account".'</div>';
    // }
    
     if(isset($_SESSION['Faculty']))
     {
        $_SESSION['GET']=$GetID=$_GET['faculty'];
        if( $_SESSION['GET']==$_SESSION['Faculty']){
        
       if(isset($_GET['delete'])){
        
        $fac=$_GET['faculty'];
        $regno=$_GET['success'];
           $sqldel="DELETE FROM lor WHERE Regno='$regno' AND FacultyID='$fac'";
           //echo"<h1> Successfully Deleted!!! $fac $regno</h1>";
        mysqli_select_db($con,"student_management");
        if(mysqli_query($con,$sqldel)){
            $msg="Successfully Deleted!!!";
            
              echo"<div class='alert alert-success text-center'> $msg</div>";
           }
       }
       if(isset($_GET['success']) && isset($_GET['faculty'])){
            $fac=$_SESSION['Faculty'];
            $regno=$_GET['success'];
            //echo $regno;
            mysqli_select_db($con,"student_management");
            $sql1="Select * from student_data where Regno='$regno'";
            $sql3="SELECT * FROM lor WHERE Regno='$regno' AND FacultyID='$fac'";
            $res1=mysqli_query($con,$sql1);
            while($row=mysqli_fetch_assoc($res1)){
                $name=$row['FName']." ".$row['LName'];
                $branch=$row['Branch'];
            }
        }
        
        $sql2="select * from faculty_data where FacultyID='$fac'";
        

        $res2=mysqli_query($con,$sql2);
        while($row=mysqli_fetch_assoc($res2)){
            $namef=$row['FacultyName'];
            
        }
         
         

    ?>
<!DOCTYPE html>
<html>
<style>
.button {
  padding: 15px 25px;
  font-size: 18px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 15px;
  text-decoration:none;
}

.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
.inp{
    display:none;
}
</style>
    
    


    
    
    
<script>

// function add(){
//     var role=document.getElementById('k').value;
//     document.getElementById('role').innerHTML="<i><b>"+role+"</i></b>";
    
// }
</script>
<body >
<form target="_blank" action="pdf.php" method="POST">
<input type="text" class="inp" name="sname" value="<?php echo $name;?>" >
<input type="text" class="inp" name="fname" value="<?php echo $namef;?>">
<input type="text" class="inp" name="branch" value="<?php echo $branch;?>">
<input type="text" class="inp" name="fid" value="<?php echo $fac;?>">
<input type="text" class="inp" name="reg" value="<?php echo $regno;?>">
<!--<input type="text" class="inp" name="branch" value="<?php //echo $branch;?>">-->
<table style="width:100%;padding:30px;border: 3px solid black;">
<tr>
<th><img src="images/vitlogo.png" height="50%"></th>
</tr>
<tr>
<td align="center"><br><br><h1 ><i><u>Letter Of Recomendation</u></i></h1></td>
</tr>
<tr>
<td align="center"style="font-size:30px;padding:20px;"><br><br><br>  To who so ever it may concern I <i><b>Dr.<?php echo " $namef"; ?></i> </b>recomend <i><b> <?php echo "$name";?> </i></b>from VIT Vellore currently pursuing his/her bachelors degree in <i><b> <?php echo "$branch";?></i></b> discipline has proven himself/herself time and again showing that they can work under pressure .He/She has shown commendable leadership qualities alongside exceptional time management skills.<i><b><?php echo "$name";?></i></b> has my enthusiastic   recommendation. He/She is a kind, compassionate, intelligent, and strong person who has a clear sense of direction and purpose.I  am confident  that  he/she  will  bring  the  same  warmth,  support,  insight,  and  hard  work  to  all  her/his  future  endeavors . I  wish  him/her  all  the  very  best  and  request  you  to  overcome  your  hesitation contact me for any further information. 
</td>
</tr>
<tr>
<td>
<br>
<br>
<br><br><br>
<br>
<br><br><br>
<br>

<br><br>
&nbsp;&nbsp;<b>________________</b><br><br><i>Chancellor Of VIT</i>
</td>
</tr>
</table>
<?php
 $res9=mysqli_query($con,$sql3);
 if($res9->num_rows > 0){
echo"<br><div align='center'><a href='faculty-LOR.php?success=$regno&faculty=$fac&delete=1' class='button'>Delete</a></div>";
 }
 else{
?>
<div align="center">
<button type="submit"  class="button">Generate LOR</button>
</div>
<?php
}
?>
</form>



</body>
</html>

<?php   require_once('Includes/footer.php');

   


?>

     
     <?php
    }
else{
    echo"<script src='jquery/jquery.js'></script>
    <script type='text/javascript' src='js/bootstrap.min.js'></script>
    <link rel='stylesheet' href='css/bootstrap.css' />
    <link rel='stylesheet' href='bootstrap/bootstrap.css'>
    <link rel='stylesheet' href='sstyle.css'>";
    $msg="Permission Denied";

echo '<div class="alert alert-danger text-center"><img src="images/pdenied.png" alt="X "> '.$msg.'</div> ';
   }
}
else{
header("location:faculty-login.php?naccess");
}

?>