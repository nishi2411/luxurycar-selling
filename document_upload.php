<?php 
    include("connection.php"); 
    include("session_customer.php"); 
    if(isset($_REQUEST['update_document']))
    {
        $email = $_SESSION['customer'];

        $aadharcard = $_FILES['aadharcard']['name'];
        $aadharcard_tmp = $_FILES['aadharcard']['tmp_name'];
    
        $pancard = $_FILES['pancard']['name'];
        $pancard_tmp = $_FILES['pancard']['tmp_name'];
    
        $photo = $_FILES['photo']['name'];
        $photo_tmp = $_FILES['photo']['tmp_name'];
        
        move_uploaded_file($aadharcard_tmp, 'uploads/' . $aadharcard);
        move_uploaded_file($pancard_tmp, 'uploads/' . $pancard);
        move_uploaded_file($photo_tmp, 'uploads/' . $photo);

    $query = "UPDATE signup_tbl SET aadharcard = '$aadharcard', pancard = '$pancard', photo = '$photo',document_status = 'Deactive' WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    header("location: document_upload.php");
}  
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("css.php");?>
</head>

<body style="background-color:white;">
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
        <?php include("menubar_customer.php"); ?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <!-- <h1 class="display-3 text-white mb-3 animated slideInDown">Document Page</h1> -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="customer_home.php">Home</a></li>
                            <li class="breadcrumb-item text-white  active" aria-current="page">Document</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->  
        <!-- document Start -->
        <div class="container rounded bg-white">
            <form method="post"  enctype="multipart/form-data">
                <div class="row border border-warning border-3">
                    <h4 class="text-center mt-3">Document Upload</h4>
                    <div class="col-6 border-right  mx-auto p-3">
                        <div class="d-flex flex-column">
                            <label for="aadharcard">Adharcard</label>
                            <div class="col-8">
                                <input type="file" name="aadharcard" id="aadharcard" class="form-control" required>
                            </div> 
                            <div class="col-8">
                                <label for="pancard">Pancard</label>
                                <input type="file" name="pancard" id="pancard" class="form-control" required>
                            </div>
                            <div class="col-8">
                                <label for="photo">Photo</label>
                                <input type="file" name="photo" id="photo" class="form-control" required>
                            </div> 
                            <div class="mt-2">
                                <button type="submit" class="btn btn-warning profile-button"  name="update_document">Upload Document</button>
                            </div>                               
                        </div>
                    </div>    
                           
                <div class="row mt-5">
                    <div class="card-body">    
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                            <th>ID</th>
                            <th>USERNAME</th>
                            <th>AADHARCARD</th>
                            <th>PANCARD</th>
                            <th>PHOTO</th>
                            <th>Action</th>
                            <th>View</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $email = $_SESSION['customer'];
                                $selectquery = "SELECT * FROM signup_tbl WHERE email = '$email' and document_status!='pending'";
                                $run = mysqli_query($conn,$selectquery);
                                while($row = mysqli_fetch_array($run))
                                {
                                ?>
                            <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['firstname']. " ".$row['lastname']; ?></td>
                            <td><img src="uploads/<?php echo $row['aadharcard']; ?>" style="width:200px; height:200px;"></td>
                            <td><img src="uploads/<?php echo $row['pancard']; ?>" style="width:200px; height:200px;"></td>
                            <td><img src="uploads/<?php echo $row['photo']; ?>" style="width:200px; height:200px;"></td>
                            <td>
							<?php
							if($row['document_status']=='Deactive')
							{
							?>
							<b class="btn btn-danger"><?php echo $row['document_status']; ?></b>
							<?php
							}
							else
							{
							?>
							<b class="btn btn-success"><?php echo $row['document_status']; ?></b>
							<?php
							}
							?>
							
							
							</td>
                            <td>
                                <a href="company_master.php?edit=<?php echo $row['id']; ?>" class="btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">View</a>
                            </td>
                            </tr>
                            <?php  } ?>
                            </tbody>
                        </table>
                     </div>
                 </div> 
                           <!-- modal popup -->
                                <!-- Button trigger modal -->
                                <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Launch static backdrop modal
                                </button> -->

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">View Document</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php 
                                             $email = $_SESSION['customer'];
                                             $selectquery = "SELECT * FROM signup_tbl WHERE email = '$email'";
                                             $run = mysqli_query($conn,$selectquery);
                                             while($row = mysqli_fetch_array($run))
                                             {?>
                                                <img src="uploads/<?php echo $row['aadharcard']; ?>" class="w-75 mx-5" >
                                                <img src="uploads/<?php echo $row['pancard']; ?>" class="w-75 mx-5" >
                                                <img src="uploads/<?php echo $row['photo']; ?>" class="w-75 mx-5" >
                                          <?php   }
                                        
                                        ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                                    </div>
                                    </div>
                                </div>
                                </div>
                           <!-- modal popup -->
                        </div>
                    </div>
                </div>
            </form>
        </div>

       



       

        <!-- document End -->

        <!-- Footer Start -->
        <?php include ("footer.php"); ?>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- Datatables script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <!-- update validation when email alredy exists -->
    <script>
                $(document).ready(function(){
                $('#email').keyup(function(){
                var vid = $('#email').val();
                if(vid != '')
                {
                $.ajax({
                    url:"ajaxemailupd.php",
                    method:"GET",
                    data:{value:vid,id:'vid'},
                    success:function(data)
                    {
                    if(data == false)
                    {
                        $('#vid').text("email alredy exists");
                    }else
                    {
                        $('#vid').text('');
                    }
                    }
                });
                }
                });
                   });
</script>
</body>

</html>