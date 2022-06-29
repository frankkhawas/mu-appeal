<?php include('nav.php') ?>
<?php 

    include("../config/conn.php");

    $apeal_query = mysqli_query($conn, "SELECT * FROM `tblappeal`, tblstudent 
    WHERE tblappeal.student = tblstudent.student_id
    AND is_current = 1");
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body mt-3">
                <ul class="list-unstyled">
                    <li><span class="badge bg-danger text-white">1</span> Stage 1 HOD</li>
                    <li><span class="badge bg-dark text-white">2</span> Stage 2 Dean</li>
                    <li><span class="badge bg-warning text-white">3</span> Stage 3 Sanate</li>
                    <li><span class="badge bg-success text-white">4</span> Appel proccessed </li>
                </ul>
            </div>
            <?php if(isset($_GET['error'])) { ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    <a href="index.php" class="close">&times;</a>
                    <strong>Error!</strong><?php echo $_GET['error'] ?>
                </div>
            <?php } ?>
            <?php if(isset($_GET['success'])) { ?>
                <div class="alert alert-success alert-dismissible fade show">
                    <a href="index.php"  class="close">&times;</a>
                    <strong>Success!</strong><?php echo $_GET['success'] ?>
                </div>
            <?php } ?>
            <table class="table">
                <tr>
                    
                    <th>Registration number</th>
                    <th>Receipt_number</th>
                    <th>Semister</th>
                    <th>Appeal date</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
                <?php while($apel_row = mysqli_fetch_array($apeal_query)) { ?>
                    <tr>
                        <td><?php echo $apel_row['reg_numb'] ?></td>
                        <td><?php echo $apel_row['receipt_number'] ?></td>
                        <td><?php echo $apel_row['semister'] ?></td>
                        <td><?php echo $apel_row['appeal_date'] ?></td>
                        <td><?php echo $apel_row['status'] ?></td>
                        <td>
                            <form action="appeal.php" method="post">
                                <input type="text" name="appeal_id" value="<?php echo $apel_row['appeal_id'] ?>" hidden>
                                <input type="number" name="stage" value="<?php echo $apel_row['stage'] ?>" hidden>
                                <?php if($user_type == 'hod' && $apel_row['stage'] == 1 && $apel_row['status'] == "processing"): ?>
                                    <button class="btn btn-success btn-sm" name="accept">hod accept</button>
                                    <button class="btn btn-danger btn-sm" name="reject">hod reject</button>
                                <?php elseif($user_type == 'dean' && $apel_row['stage'] == 2 && $apel_row['status'] == "processing"): ?>
                                    <button class="btn btn-success btn-sm" name="accept">Dean accept</button>
                                    <button class="btn btn-danger btn-sm" name="reject">Dean reject</button>
                                <?php elseif($user_type == 'senate' && $apel_row['stage'] == 3 && $apel_row['status'] == "processing"): ?>
                                    <button class="btn btn-success btn-sm" name="accept">Senate accept</button>
                                    <button class="btn btn-danger btn-sm" name="reject">Senate reject</button>
                                <?php else: ?>
                                    <?php echo $apel_row['stage'] ?>
                                <?php endif ?>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
<?php include('footer.php') ?>