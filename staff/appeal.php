<?php  

    include("../config/conn.php");
    if(isset($_POST['accept'])) {
        $appel_id = $_POST['appeal_id'];
        $stage = $_POST['stage'];
        

        if($stage == 1) {
            $update_stage = mysqli_query($conn, "UPDATE tblappeal SET stage = stage + 1 WHERE appeal_id= $appel_id ");
            if($update_stage) {
                header("location:index.php?success=Appeal Accepted Successfully");
    
            }
            else {
                header("location:index.php?error=Appeal not Accepted Successfully");
            }
        }

        else if($stage == 2) {
            $update_stage = mysqli_query($conn, "UPDATE tblappeal SET stage = stage + 1 WHERE appeal_id= $appel_id ");
            if($update_stage) {
                header("location:index.php?success=Appeal Accepted Successfully");
    
            }
            else {
                header("location:index.php?error=Appeal not Accepted Successfully");
            }
        }

        else if($stage == 3) {
            $update_stage = mysqli_query($conn, "UPDATE tblappeal SET stage = $stage, status = 'accepted' WHERE appeal_id= $appel_id");
            if($update_stage) {
                header("location:index.php?success=Appeal Accepted Successfully");
    
            }
            else {
                header("location:index.php?error=Appeal not Accepted Successfully");
            }
        }
    }
    elseif(isset($_POST['reject'])) {
        $appel_id = $_POST['appeal_id'];
        $update_stage = mysqli_query($conn, "UPDATE tblappeal SET status = 'rejected' WHERE appeal_id= $appel_id");
        if($update_stage) {
            header("location:index.php?success=Appeal rejected Successfully");
        }
        else {
            header("location:index.php?error=Appeal not rejected Successfully");
        }
    }
?>