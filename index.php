<?php
require_once('Includes/header.php');
?>

<div class="container">
      <div class="d-flex justify-content-center">
        <h2>Welcome To the Student Faculty Interaction Portal</h2>
      </div>

      <div class="row d-flex justify-content-around">
        <div class="card mt-5 m-2 p-3" style="width: 18rem">
          <img
            class="card-img-top"
            src="images/student.png"
            alt="Card image cap"
          />
          <div class="card-body">
            <h5 class="card-title">Student</h5>
            <p class="card-text">
              Visiting The Student Route.. Lets You Access your Student Account
              and Lets You Access the Details For The Same
            </p>
            <a href="login.php" class="btn btn-dark"
              >Proceed To Student Login</a
            >
          </div>
        </div>
        <div class="card mt-5 m-2 p-3" style="width: 18rem">
          <img
            class="card-img-top"
            src="images/faculty.png"
            alt="Card image cap"
          />
          <div class="card-body">
            <h5 class="card-title">Faculty</h5>
            <p class="card-text">
              The Teacher route lets you view and admininstratively edit Student
              Profiles
              <br>
              <br>
            </p>
            <a href="./faculty-login.php" class="btn btn-dark"
              >Proceed To Faculty Login</a
            >
          </div>
        </div>
      </div>
    </div>


<?php

require_once('Includes/footer.php');
?>
