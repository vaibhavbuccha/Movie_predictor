<?php 
      session_start();
  // session_start();
  include_once "admin/connection.php";
  $select = "SELECT * FROM tbl_movies";
  $query = mysqli_query($con, $select);
  // print_r($_SESSION);


  if(isset($_POST['Login']))
  {
    // print_r($_POST);
    $email = $_POST['email'];
    $password = md5($_POST['password']);


    $check = "SELECT * FROM tbl_user where email='$email'AND password = '$password' ";
    $run = mysqli_query($con , $check);

    if($run->num_rows > 0)
    {
      while ($row = mysqli_fetch_assoc($run)) {
        // print_r($row);
        $_SESSION['name'] = $row['fname'].' '.$row['lname']; 
        $_SESSION['email'] = $row['email']; 
        $_SESSION['id'] = $row['id']; 
      }
      // echo "login";
    }
    else
    {
      echo "error";
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- bootstrap cdn -->
    <title>:: Movie ::</title>
</head>
<body>
	<!-- nav bar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <?php if (isset($_SESSION['name'])) {
        ?>
          <button type="button" class="btn btn-primary" style="border-radius: 50px;" data-toggle="modal" data-target="#exampleModal">
               <?php  echo $_SESSION['name'];  ?>
          </button>
          <button type="button" class="btn btn-primary" style="border-radius: 50px;" data-toggle="modal" data-target="#exampleModal">
             Log Out
        </button>
        <?php
      } else{ ?>
     <button type="button" class="btn btn-primary" style="border-radius: 50px;" data-toggle="modal" data-target="#exampleModal">
        Login
    </button>
  <?php  } ?>
    </form>
  </div>
</nav>
<!-- navbar end -->

<!-- modal -->
  
  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:pink;">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
          <h3 class="text-center" >
            Sign In
          </h3>
          <hr>
          <form action="" method="post">
              <div align="center">
                  <input type="email" name="email" placeholder="Email Address" class="form-control">
              </div>
              <br>
              <div align="center">
                  <input type="Password" name="password" placeholder="Password" class="form-control">
              </div>
              <br>
              <input class="btn btn-dark" type="submit"  value="Login" name="Login" >
                
              <!-- </button> -->
          </form>
      </div>
      <div class="modal-footer" style="background:pink;" >
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" onclick="dismiss()" >
         Create A New Account
        </button>
        <!-- <button type="button" class="btn btn-primary">Create A New Account</button> -->
      </div>
    </div>
  </div>
</div>

<!-- modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:pink;">
        <h5 class="modal-title" id="exampleModalLabel">Sign Up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
          <h3 class="text-center" >
            Sign Up
          </h3>
          <hr>
          <form action="signup.php" method="post" >
              <div align="center">
                  <input type="email" name="email" placeholder="Email Address" required class="form-control">
              </div>
              <br>
              <div align="center">
                  <input type="text" name="fname" required placeholder="First Name" class="form-control">
              </div>
              <br>
              <div align="center">
                  <input type="text" name="lname" required placeholder="Last Name" class="form-control">
              </div>
              <br>
              <div align="center">
                  <input type="Password" name="password" required placeholder="Password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"  >
              </div>
              <br>
               <div align="center">
                  <input type="Password" name="cnfpassword" required placeholder="Confirm Password" class="form-control">
                  <span class="cnfErr text-danger" ></span>
              </div>
              <br>
              <button class="btn btn-dark" id="btnsub" type="submit" >
                Signup 
              </button>
          </form>
      </div>
      <div class="modal-footer" style="background:pink;" >
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal"  onclick="dismiss()" >
         SignUp
        </button>
        <!-- <button type="button" class="btn btn-primary">Create A New Account</button> -->
      </div>
    </div>
  </div>
</div>


<!-- carosel -->
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	  <ol class="carousel-indicators">
	    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
	    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
	    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	  </ol>
	  <div class="carousel-inner">
	    <div class="carousel-item active">
	      <img class="d-block w-100" src="https://upload.wikimedia.org/wikipedia/commons/4/42/Shaqi_jrvej.jpg" alt="First slide" height="300vh">
	    </div>
	    <div class="carousel-item">
	      <img class="d-block w-100" src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/nature-quotes-1557340276.jpg?crop=0.666xw:1.00xh;0.168xw,0&resize=640:*" alt="Second slide"  height="300vh">
	    </div>
	    <div class="carousel-item">
	      <img class="d-block w-100" src="https://natureconservancy-h.assetsadobe.com/is/image/content/dam/tnc/nature/en/photos/tnc_69881045.jpg?crop=240,0,2400,1320&wid=4000&hei=2200&scl=0.6" alt="Third slide"  height="300vh">
	    </div>
	  </div>
	  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>

<!-- carosel -->
<!-- jumbotron -->
<div class="container">
<div class="jumbotron text-center">
	   <h1>Movies List</h1>
</div>

  <div class="row" style="height: 400px;overflow: auto;" >
      <?php 
        while ($row = mysqli_fetch_assoc($query)) {
      ?>
      <!-- <span  > -->
          <div class="col-sm-6" style="display: inline-block;" >
              <!-- <?php 
                  print_r($row);
              ?> -->
              <div class="text-center" style="background: yellow;padding: 20px;margin: 10px;margin-bottom: 0px;margin-left: 0px;font-size: 25px;">
                 <?=  $row['name'] ?>
              </div>
              <div>
                <iframe src="https://www.youtube.com/embed/tgbNymZ7vqY" frameborder="0" width="520" height="315"></iframe>
              </div>
              <div>
                <b>Description :- </b><?php echo $row['description']; ?>
              </div>
              <?php

                  $dir_id = $row['director_id'];
                  // echo "$dir_id";
                  $sql = "SELECT * FROM tbl_director where id='$dir_id' ";
                  $qury = mysqli_query($con , $sql);
                  while ($r = mysqli_fetch_assoc($qury)) {
                      // echo "$r['name']";
                        // print_r();
                    echo "<b>Director Name : </b> ".$r['name'];
                    }
              ?>
          </div>

      <!-- </span> -->
      <?php
        }
      ?>
  </div>

</div>
</body>

  <script>

  </script>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <script>
      
      $('[name="cnfpassword"]').on('keyup',()=>{
          // alert(`working`);
          var cnfpass = $('[name="cnfpassword"]').val();
          var pass = $('[name="password"]').val();
          // alert(`cnfpass = ${ pass }`);
          if(pass != cnfpass){
            $('.cnfErr').html('Please enter valid confirm password');
            $('#btnsub').attr('disabled',true);
          }
          else{
            $('.cnfErr').html('');
            $('#btnsub').attr('disabled',false);
          }


      });

  </script>

</html>