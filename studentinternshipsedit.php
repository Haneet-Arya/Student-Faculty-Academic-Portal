<?php
 require_once('Includes/header.php');
 require_once('Includes/connection.php');
 
 if(isset($_SESSION['StudentID']) || isset($_SESSION['Faculty']))
    {
        $_SESSION['GET']=$GetID=$_GET['edit'];
   
        $GetID=$_GET['edit'];
    $sql="select * from internships where Regno='".$GetID."'";
    mysqli_select_db($con,"student_management");
$res=mysqli_query($con,$sql);
class Internships{

    public $id;
    public $cname;
    public $role;

}
  $i=0;
  $s=array();
  while($row=mysqli_fetch_assoc($res))
  {
    $s[$i]=new Internships();
    $s[$i]->id=$row['ID'];
    $s[$i]->cname=$row['Cname'];
    $s[$i]->role=$row['Role'];
    $i++;
  }


?>

<?php
 if(isset($_SESSION['Faculty']) || $_SESSION['GET']==$_SESSION['StudentID'])
 {
     ?>

<div class="container">
    <div class="row mb-5">
        <div class="col-lg-12 m-auto ">
            <div class="mt-5">
                <img src="images/slogin.png" alt="Student Register" width="150" height="150" class="d-flex m-auto">
            </div>
            
                <div class="card-title bg-dark rounded-top">
                    <h3 class="text-center text-white py-3">Edit Internships Details</h3>
                </div>
         </div>
            </div>    

                <div class="col-lg-9 m-auto card-body">

                <form action="update.php" method="POST" enctype="multipart/form-data">
                <input type='number' value='<?php echo count($s);?>' name='count' style='display:none;'>
                <input type='text' value='No' name='cout' style='display:none;'>
                <input type="text" value='<?php echo $GetID;?>' style="display:none;" name='regno'>
                
                <?php
                $k=0;
                for($i=0;$i<count($s);$i++){
                    $id=$s[$i]->id;
                    $cn=$s[$i]->cname;
                    $rl=$s[$i]->role;
                    $k=$i+1;
                    echo"<div class='card mt-1'>".
                    "<div class='card-title bg-dark rounded-top'>".
                        "<h3 class='text-center text-white py-3'>Internship $k</h3>".
                    "</div>";
                    
                //echo"<h1 align='center'></h1><br>";
                echo "<div class='m-auto col-lg-9'><input type='text'  name='id$i' style='display:none;' value= '$id'>";
                echo "<input type='text' placeholder='Company Name' name='cname$i' class='form-control mb-2' value= '$cn'>";          
                echo "<input type='text' placeholder='Role' name='role$i' class='form-control mb-2' value= '$rl' >";
                echo"</br></br></div></div><br>";
                }
                ?>
                <div id="New" >
                   
   
               
            </div>
            
            <script>
                var s=0;
            </script>
            <div class="mt-3">
                <button class="btn btn-success" name="updateinternship">Update</button>
                <button class="btn btn-success" type="button" id='k' onclick="add()">+ Add Internship</button>
            </div>
                <script>
                    
                    function add(){
                        document.getElementById("k").style.display="none";

                document.getElementById("New").innerHTML+="<div class='card mt-3'><div class='card-title bg-dark rounded-top'><h3 class='text-center text-white py-3'>New Internship</h3></div>"+"<?php echo "<div class='m-auto col-lg-9'><input type='text'  name='id$k'  value='$k' style='display:none;'>";echo "<input type='text' placeholder='Company Name' name='cname$k' class='form-control mb-2' required>";echo "<input type='text' placeholder='Role' name='role$k' class='form-control mb-2'  required>";echo "<input type='text' value='Yes' name='cout' style='display:none;'>";echo"</br></br></div></div><br>";?>";
                    }
                </script>
  
                
                </form >
                
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