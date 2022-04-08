<?php
    require_once('Includes/header.php');
    require_once('Includes/connection.php');
    if(isset($_GET['saccess']))
    {
        echo '<div class="alert alert-danger text-center"><img src="images/pdenied.png" alt="X ">'."Please Logout first from this faculty account".'</div>';
    }
    if(isset($_SESSION['Faculty']))
    {
        $fac=$_SESSION['Faculty'];
        $sql="select * from student_data";
        mysqli_select_db($con,"student_management");

        $res=mysqli_query($con,$sql);
    }
    else{
        header("location:faculty-login.php?naccess");
    }
    ?>

    <div class="container" ng-app="app" ng-controller="search">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular.min.js"></script>
    
        <div class="row">
            <div class="col">
                <div class="card bg-dark text-white mt-5">
                    <h3 class="text-center py-3">Student Details</h3>

                </div>
            
            </div>
        
        </div>

        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-title">

                    </div>

                <div class="card-body">
                    <table class="table table-striped" >


                        <tr>
                        <div class="form-inline mb-3">
                        <input type="text" placeholder="Search name or regno. " class="form-control"  ng-model="Searchtext" >
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <!--<form action="search.php" method="POST">
                            <div class="form-inline mb-3">
                                <input type="text" placeholder="Search" class="form-control">
                                <button class="btn btn-success">Search</button>
                            </div>
                        </form>-->
                       
                        <input type="text" placeholder="Search Skills " class="form-control"  ng-model="SearchSkills" >
                        </div>
                        </tr>
                        <tr class="bg-success text-white">
                            <td>Regno</td>
                            <td>Name</td>
                            <td>Branch</td>
                            <td>Email</td>
                            <td>Skills</td>
                            <td >Operation</td>
                            <td >Generate LOR</td>
                        </tr>
                    <script>
                       var arrobj=[];
                       var a=angular.module("app",[]);
                       
                       a.controller("search",function($scope){
                       

                        <?php 
                    
                   
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //$i=0;   
                        $skills="";            
                        //unset($skills);
                        $StudentID= $row['Regno'];
                        $FName=$row['FName'];
                        $LName=$row['LName'];
                        $Branch=$row['Branch'];
                        $Email=$row['Email'];
                        $sql2="SELECT * FROM projects WHERE Regno='$StudentID'";
                        $res2=mysqli_query($con,$sql2);
                        
                   while($row2=mysqli_fetch_assoc($res2)){
                         $m=$row2['Technologies'];
                        //array_push($skills,$m);
                        //$i++;
                        $skills=$skills.$m;
                         
                   }
                       
                    ?>
                    
                       
                       
                       
                   
                    arrobj.push({Reg:"<?php echo $StudentID?>",name:"<?php echo $FName.' '.$LName?>",branch:"<?php echo $Branch?>",email:"<?php echo $Email?>",skills:"<?php echo $skills;?>"});
                       
                    
                    $scope.arrobj=arrobj;

                    
                    
                
                <?php
                }
                ?>
                 $scope.SearchByNameAndReg=function(field){
                        if($scope.Searchtext==undefined && $scope.SearchSkills==undefined){
                              return true;
                        }
                        else{
                            if($scope.Searchtext!=undefined && $scope.SearchSkills!=undefined){
                             if((field.name.toLowerCase().indexOf($scope.Searchtext.toLowerCase()) != -1 || field.Reg.toLowerCase().indexOf($scope.Searchtext.toLowerCase()) != -1 ) && field.skills.toLowerCase().indexOf($scope.SearchSkills.toLowerCase()) != -1){
                                  return true;
                            }
                            else{
                                return false;
                            }
                            
                            }
                            else if($scope.Searchtext!=undefined ){
                             if(field.name.toLowerCase().indexOf($scope.Searchtext.toLowerCase()) != -1 || field.Reg.toLowerCase().indexOf($scope.Searchtext.toLowerCase()) != -1 ){
                                  return true;
                            }
                            else{
                                return false;
                            }
                            }
                            else if($scope.SearchSkills!=undefined){
                             if(field.skills.toLowerCase().indexOf($scope.SearchSkills.toLowerCase()) != -1){
                                  return true;
                            }
                            else{
                                return false;
                            }
                            
                            }

                            
                            }
                            // if($scope.SearchSkills!=undefined)
                            // {
                            //     if(field.skills.toLowerCase().indexOf($scope.SearchSkills.toLowerCase()) != -1 ){
                            //         return true;
                            //     }
                            //     else{
                            //     return false;
                            //     }
                            
                        //}
                        
                        }
                   
                        
                
                });
                </script>
                
                    <tr ng-repeat="i in arrobj | filter: SearchByNameAndReg">
                        
                     
                    
                        
                        <td id="reg">{{i.Reg}}</td>
                        <td>{{i.name}}</td>
                        <td>{{i.branch}}</td>
                        <td>{{i.email}}</td>
                        <td>{{i.skills}}</td>
                        
                        <td><a href="view.php?success={{i.Reg}}" class="btn btn-success btn-sm">View</a></td>
                        
                        <td><a href="faculty-LOR.php?success={{i.Reg}}&faculty=<?php echo $fac;?>" class="btn btn-success btn-sm">Generate LOR</a></td>      
                         
                    </tr>
                   
                   
                
                                
                
                
                
                    
                    </table>
                </div>

            </div>
                
        </div>
    </div>
</div>



<?php   require_once('Includes/footer.php');

   


?>