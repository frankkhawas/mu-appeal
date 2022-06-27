<?php 
 $conn = mysqli_connect("127.0.0.1", "root", "", "mu_appeal");
if(isset($_POST['submit'])) {
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$sex = $_POST['gender'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$type = $_POST['type'];
$username = $_POST['username'];
$password = $_POST['password'];
$hash = sha1($password);

$sql = "INSERT INTO tbluser(fname, lname, sex, phone, email, type, username, password)
        VALUES('$fname', '$lname', '$sex', '$phone', '$email', '$type', '$username', '$hash');";

        $result = mysqli_query($conn,$sql);
        if($result) {

            echo "Your Application is Successful.........!!!!!";

        }

        else{
            die(mysqli_error($conn));
        }
}

	?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UserForm</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>

<body>
    <center>
        <h2>UserForm</h2>
    </center>
    <div class="card">
        <div class="card-body">
            
            <form method="post">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <input type="text" name="firstname" placeholder="First Name" class="form-control">
                    </div>
                    <div class="col-md-4 form-group">
                        <input type="text" name="lastname" placeholder="Last name" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <select name="gender" id="gender" class="form-control">
                            <option value="">---Select Gender---</option>
                            <option value="">Male</option>
                            <option value="">Female</option>
                            <option value="">Other</option>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <input type="text" name="phone" placeholder="phone" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <input type="email" name="email" placeholder="Email" class="form-control">
                    </div>
                    <div class="col-md-4 form-group">
                        <select name="type" id="type" class="form-control">
                            <option value="">---Select Type---</option>
                            <option value="">Student</option>
                            <option value="">Teacher</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-0">
                    <div class="col-md-4 form-group">
                        <input type="text" name="username" placeholder="Username" class="form-control">
                    </div>
                    <div class="col-md-4 form-group">
                        <input type="password" name="password" placeholder="password" class="form-control">
                    </div>
                    <div class="col-auto">
                        <button type="submit" name="submit" class="text-white btn btn-color"
                            style="background-color:#fd876d">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>