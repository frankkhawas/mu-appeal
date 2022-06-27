<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

     <style type="text/css">
    body{
      background-color: #123;
    }
    </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card my-5"style="height:85% ;">
          <div class="card-header">
             <h2 class="text-center text-dark">MU-APPS</h2>
             <div class="text-center">
               <img src="img/mzumbe1.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="120px" height="90px"alt="profile">
            </div>
          </div>
          <center>
          <form class="card-body cardbody-color p-lg-3" action="login.php" method="POST">
          	<?php if(isset($_GET['error'])) { ?>
          		<div class="alert alert-danger">
          			<?php echo $_GET['error'] ?>
          		</div>
          	<?php } ?>
            <div class="mt-3 form-group">
              <div class="mt-3">
              <input type="text" class=" form-control" name="username" aria-describedby="emailHelp"
                placeholder="Username">
            </div>
            </div>
            <div class="form-group mt-4">
              <input type="password" class="form-control" name="password" placeholder="password">
            </div>
            <div class="text-center mt-4">
              <button type="submit" name="login" class="text-white btn btn-color px-5 w-100" style="background-color:#fd876d">Sign in
              </button>
            </div>
            <!-- <div id="emailHelp" class="form-text text-center mb-5 text-dark">Not
              Registered? <a href="registration.php" class="text-blue fw-bold"> Create an
                Account</a>
            </div> -->
           </form>
          </center>
        </div>
      </div>
    </div>
  </div>
</body>
</html>