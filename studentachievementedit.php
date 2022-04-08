<?php
 require_once('Includes/header.php');
 require_once('Includes/connection.php');


 if(isset($_SESSION['StudentID']) || isset($_SESSION['Faculty']))
 {
     $_SESSION['GET']=$GetID=$_GET['edit'];

     $GetID=$_GET['edit'];
    $sql="select * from achievements where Regno='".$GetID."'";
    mysqli_select_db($con,"student_management");
$res=mysqli_query($con,$sql);
class Achievements{
    public $id;
    public $type;
    public $des;
    public $year;
                
}
  $i=0;
  $s=array();
  while($row=mysqli_fetch_assoc($res))
  {
      $s[$i]=new Achievements();
      $s[$i]->id=$row['ID'];
      $s[$i]->type=$row['Type'];
      $s[$i]->des=$row['Description'];
      $s[$i]->year=$row['Year'];
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
                <img src="images/slogin.png" alt="Student Achievements" width="150" height="150" class="d-flex m-auto">
            </div>
            
                <div class="card-title bg-dark rounded-top">
                    <h3 class="text-center text-white py-3">Edit Achievements Details</h3>
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
                    $ty=$s[$i]->type;
                    $ds=$s[$i]->des;
                    $yr=$s[$i]->year;
                    $k=$i+1;
                    echo"<div class='card mt-1'>".
                    "<div class='card-title bg-dark rounded-top'>".
                        "<h3 class='text-center text-white py-3'>Achievement $k</h3>".
                    "</div>";
                    
                //echo"<h1 align='center'></h1><br>";
                echo "<div class='m-auto col-lg-9'><input type='text'  name='id$i' style='display:none;' value= '$id'>";
                if($ty=='Got Award/Rank'){
                    echo "<label for='achi'>Choose a Type:</label> <select id='achi' name='type$i' class='form-control mb-2'>
                    
                    <option value='Got Award/Rank'>Got Award/Rank</option>
                    <option value='Conducted Workshop/Techfest'>Conducted Workshop/Techfest</option>
                    <option value='Got Scholarship'>Got Scholarship</option>
                    </select>";

                }
                else if($ty=='Conducted Workshop/Techfest'){
                    echo "<label for='achi'>Choose a Type:</label> <select id='achi' name='type$i' class='form-control mb-2'>
                    
                    
                    <option value='Conducted Workshop/Techfest'>Conducted Workshop/Techfest</option>
                    <option value='Got Award/Rank'>Got Award/Rank</option>
                    <option value='Got Scholarship'>Got Scholarship</option>
                    </select>";

                }
                else if($ty=='Got Scholarship')
                {
                    echo "<label for='achi'>Choose a Type:</label> <select id='achi' name='type$i' class='form-control mb-2'>
                    
                
                    <option value='Got Scholarship'>Got Scholarship</option>
                    <option value='Conducted Workshop/Techfest'>Conducted Workshop/Techfest</option>
                    <option value='Got Award/Rank'>Got Award/Rank</option>
                    </select>";
                    
                }
                else{
                    echo "<label for='achi'>Choose a Type:</label> <select id='achi' name='type$i' class='form-control mb-2'>
                    
                
                    <option value='Got Award/Rank'>Got Award/Rank</option>
                    <option value='Got Scholarship'>Got Scholarship</option>
                    <option value='Conducted Workshop/Techfest'>Conducted Workshop/Techfest</option>
                    </select>";
                }
                $mD=substr($GetID,0,2);

                $date=date("Y-m");
                echo "<textarea placeholder='Description' name='des$i' rows='3' cols='8' class='form-control mb-2' >$ds</textarea>";
                echo "  <label for='year'>Year and Month of Achievements:</label>
                
                <input type='month' id='year' name='year$i'
                       min='20$mD-01' value=$date>";
                echo"</br></br></div></div><br>";
                }
                $mD=substr($GetID,0,2);
                ?>
                
                <div id="New" >
                   
   
               
            </div>
            
            <script>
                var s=0;
            </script>
            <div class="mt-3">
                <button class="btn btn-success" name="updateachievement">Update</button>
                <button class="btn btn-success" type="button" id='k' onclick="add()">+ Add Achievement</button>
            </div>
                <script>
                    
                    function add(){
                        document.getElementById("k").style.display="none";

                document.getElementById("New").innerHTML+="<div class='card mt-3'><div class='card-title bg-dark rounded-top'><h3 class='text-center text-white py-3'>New Achievement</h3></div>"+"<?php echo "<div class='m-auto col-lg-9'><input type='text'  name='id$k'  value='$k' style='display:none;'>";echo "<label for='achi'>Choose a Type:</label> <select id='achi' name='type$i' class='form-control mb-2'><option value='Got Award/Rank'>Got Award/Rank</option><option value='Got Scholarship'>Got Scholarship</option><option value='Conducted Workshop/Techfest'>Conducted Workshop/Techfest</option></select>";echo "<textarea placeholder='Description' name='des$i' rows='3' cols='8' class='form-control mb-2' required ></textarea>";echo "  <label for='year'>Year and Month of Achievements:</label><input type='month' id='year' name='year$i'min='20$mD-01' required> ";echo "<input type='text' value='Yes' name='cout' style='display:none;'>";echo"</br></br></div></div><br>";?>";
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
  


