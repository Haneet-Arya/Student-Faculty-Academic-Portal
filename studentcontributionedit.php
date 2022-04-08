<?php
 require_once('Includes/header.php');
 require_once('Includes/connection.php');

 if(isset($_SESSION['StudentID']) || isset($_SESSION['Faculty']))
    {
        $_SESSION['GET']=$GetID=$_GET['edit'];
   
        $GetID=$_GET['edit'];
    $sql="select * from contributions where Regno='".$GetID."'";
    mysqli_select_db($con,"student_management");
$res=mysqli_query($con,$sql);
class Contributions{

    public $id;
    public $oname;
    public $iovit;
    public $role;

}
  $i=0;
  $s=array();
  while($row=mysqli_fetch_assoc($res))
  {
      $s[$i]=new Contributions();
      $s[$i]->id=$row['ID'];
      $s[$i]->oname=$row['Oname'];
      $s[$i]->iovit=$row['IOvit'];
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
                    <h3 class="text-center text-white py-3">Edit Contribution Details</h3>
                </div>
         </div>
            </div>    

                <div class="card-body">

                <form action="update.php" method="POST" enctype="multipart/form-data">
                <input type='number' value='<?php echo count($s);?>' name='count' style='display:none;'>
                <input type='text' value='No' name='cout' style='display:none;'>
                <input type="text" value='<?php echo $GetID;?>' style="display:none;" name='regno'>
                
                <?php
                $k=0;
                for($i=0;$i<count($s);$i++){
                    $id=$s[$i]->id;
                    $on=$s[$i]->oname;
                    $io=$s[$i]->iovit;
                    $rl=$s[$i]->role;
                    $k=$i+1;
                    echo"<div class='card mt-1'>".
                    "<div class='card-title bg-dark rounded-top'>".
                        "<h3 class='text-center text-white py-3'>Contribution $k</h3>".
                    "</div>";
                    
                //echo"<h1 align='center'></h1><br>";
                echo "<input type='text'  name='id$i' style='display:none;' value= '$id'>";
                echo "<input type='text' placeholder='Organization Name' name='oname$i' class='form-control mb-2' value= '$on'>";
                if($io=='Inside VIT'){
                    echo "<select name='iovit$i' class='form-control mb-2'>
                    
                    <option value='Inside VIT'>Inside VIT</option>
                    <option value='Outside VIT'>Outside VIT</option>
                    </select>";

                }
                else{
                    echo "<select name='iovit$i' class='form-control mb-2'>
                    <option value='Outside VIT'>Outside VIT</option>
                    <option value='Inside VIT'>Inside VIT</option>
     
                    </select>";

                }
               
                
                echo "<input type='text' placeholder='Role' name='role$i' class='form-control mb-2' value= '$rl' >";
                echo"</div><br>";
                }
                ?>
                <div id="New" >
                   
   
               
            </div>
            
            <script>
                var s=0;
            </script>
            <div class="mt-3">
                <button class="btn btn-success" name="updatecontribution">Update</button>
                <button class="btn btn-success" type="button" id='k' onclick="add()">+ Add Contribution</button>
            </div>
                <script>
                    
                    function add(){
                        document.getElementById("k").style.display="none";

                document.getElementById("New").innerHTML+="<div class='card mt-3'><div class='card-title bg-dark rounded-top'><h3 class='text-center text-white py-3'>New Contribution</h3></div>"+"<?php echo "<input type='text'  name='id$k'  value='$k' style='display:none;'>";echo "<input type='text' placeholder='Organization Name' name='oname$k' class='form-control mb-2' required>";echo "<select name='iovit$i' class='form-control mb-2'><option value='null'>Choose Inside/Outside VIT</option><option value='Inside VIT'>Inside VIT</option><option value='Outside VIT'>Outside VIT</option></select>";echo "<input type='text' placeholder='Role' name='role$k' class='form-control mb-2'  required>";echo "<input type='text' value='Yes' name='cout' style='display:none;'>";echo"</div><br>";?>";
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
  




















    <!--    
<div class="container">
    <div class="row mb-5">
        <div class="col-lg-6 m-auto ">
            <div class="mt-5">
                <img src="images/slogin.png" alt="Student Register" width="150" height="150" class="d-flex m-auto">
            </div>
            <div class="card mt-5">
                <div class="card-title bg-dark rounded-top">
                    <h3 class="text-center text-white py-3">Edit Contribution Details</h3>
                </div>

                

                <div class="card-body">

                <form action="update.php" method="POST" enctype="multipart/form-data">
              
                
                <input type="number" placeholder="Contribution number" name="Cno" class="form-control mb-2" >
                <input type="number" placeholder="Organization name" name="Cno" class="form-control mb-2" >
                <select class="form-control mb-2">
                <option value="null">Choose Inside/Outside VIT</option>
                <option value="Inside VIT">Inside VIT</option>
                <option value="Outside VIT">Outside VIT</option>
                </select>
                <input type="number" placeholder="Role" name="role" class="form-control mb-2" >
                
               
                

                        
                    
                    
                   
                    
                    
<button class="btn btn-success" name="update">Update</button>

                </form >
                </div>
            </div>
        </div>
    </div>
</div>

-->










