<?php 
   session_start();
   $user_type = $_SESSION['type'] ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff-Panel</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <!-- A grey horizontal navbar that becomes vertical on small screens -->
    <nav class="navbar navbar-expand-sm bg-dark">
        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-light" href="#">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="#">Appel</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="../logout.php">Logout</a>
            </li>
        </ul>
    </nav>
