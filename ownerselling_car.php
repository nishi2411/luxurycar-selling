<?php 
    include("connection.php"); 
    include("session_customer.php"); 
if(isset($_REQUEST['ownerdetail']))
    {
        $ownerdetail = $_REQUEST['ownerdetail']; 
        
        $carselect = "SELECT vehicle_detail.*,sell_detail.*,car_model.* FROM sell_detail JOIN vehicle_detail ON vehicle_detail.vehicle_id = sell_detail.vehicleid JOIN car_model ON car_model.c_mid = vehicle_detail.modal_id WHERE id = '$ownerdetail'";  
        $carresult = mysqli_query($conn,$carselect);
        $car = mysqli_fetch_array($carresult);    
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
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Document Page</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item text-white  active" aria-current="page">Document</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->  
        <!-- car Start -->
        <section class="content">
      <div class="row w-75 m-auto">
        <div class="col-8">
          <!-- /.card -->
          <div class="card">
            <div class="card-header bg-primary">
              <h3 class="card-title">Owner Details</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="d-flex bd-highlight">
                    <div class="p-2 flex-grow-1  bd-highlight"><b>ID</b></div>
                    <div class="p-2 bd-highlight"><?php echo $car['id']; ?></div>
                </div>
                <div class="d-flex bd-highlight">
                    <div class="p-2 flex-grow-1  bd-highlight"><b>Ownername</b></div>
                    <div class="p-2 bd-highlight"><?php echo $car['owner_name']; ?></div>
                </div>
                <div class="d-flex bd-highlight">
                    <div class="p-2 flex-grow-1  bd-highlight"><b>Owner Address</b></div>
                    <div class="p-2 bd-highlight"><?php echo $car['owner_address']; ?></div>
                </div> 
                <div class="d-flex bd-highlight">
                    <div class="p-2 flex-grow-1  bd-highlight"><b>Mobile Number</b></div>
                    <div class="p-2 bd-highlight"><?php echo $car['mobile']; ?></div>
                </div> 
                <div class="d-flex bd-highlight">
                    <div class="p-2 flex-grow-1  bd-highlight"><b>RC Book</b></div>
                    <div class="p-2 bd-highlight"><img src="adminlte/car_img/<?php echo $car['rc_book']; ?>" style="width:100px;height:100px;"></div>
                </div>
                
           </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
       

        <!--car End -->

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
    
</body>

</html>