<?php 
include("connection.php");
include("session_customer.php");

    if(isset($_REQUEST['vid']))
    {
        $vehicleid = $_REQUEST['vid'];
        $customerid = $sid;
        $date = date('Y-m-d');  
        
        $insert = "INSERT INTO sell_detail VALUES('NULL','$vehicleid','$customerid','$date','pending','','','')";
        $result = mysqli_query($conn,$insert);
        header("location:bike_detailpage.php?vehicle=$vehicleid");

    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("css.php");?>
  <link rel="stylesheet" href="adminlte/dist/css/adminlte.min.css">
  <style>
    .text-primary
     {
    color: #FEA116!important;
    }
    .btn-primary {
    color: #fff;
    background-color: #FEA116;
    border-color: #FEA116;
    box-shadow: none;
}
.section-title::after {
    background-color: #FEA116;

}
   .blink {
            animation: blinker 1.5s linear infinite;
            color: white;
            font-size: 1.5em;
            /* Larger, responsive font size */
            margin-bottom: 20px;
        }

        @keyframes blinker {
            50% {
                opacity: 0;
            }
        }
    </style>
</head>

<body>
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
       </div>
        <!-- Navbar & Hero End --> 
  <!-- Main content -->
  <section class="content">

            <!-- Default box -->
            <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <?php
                    $vehicle = $_GET['vehicle'];
                    $select = "SELECT vehicle_mst.vid,vehicle_mst.vehicle_type,company_mst.cid,company_mst.company,car_model.c_mid,car_model.model_name,
                    vehicle_detail.vehicle_id,vehicle_detail.vehicle_name,vehicle_detail.company_id,vehicle_detail.modal_id,vehicle_detail.description,
                    vehicle_detail.color,vehicle_detail.fual_type,vehicle_detail.modal_year,vehicle_detail.price,
                    vehicle_detail.ownership,vehicle_detail.total_km,vehicle_detail.fornt_image,vehicle_detail.back_image,
                    vehicle_detail.interior_image,vehicle_detail.image_chassis,vehicle_detail.insurance_image,vehicle_detail.puc_image,vehicle_detail.owner_name,vehicle_detail.owner_address,
                    vehicle_detail.mobile,vehicle_detail.rc_book,vehicle_detail.vehicle_verify_status FROM vehicle_detail INNER JOIN
                    vehicle_mst ON vehicle_mst.vid = vehicle_detail.vehicle_name INNER JOIN company_mst ON company_mst.cid = vehicle_detail.company_id INNER JOIN car_model ON car_model.c_mid = vehicle_detail.modal_id WHERE vehicle_id = '$vehicle'";
                    $res = mysqli_query($conn,$select);
                    while($row = mysqli_fetch_array($res)){

                     ?>
                <div class="col-12 col-sm-6">
                    <div class="col-12">
                    <img src="adminlte/car_img/<?php echo $row['fornt_image']; ?>" class="product-image" alt="Product Image">
                    </div>
                    <div class="col-12 product-image-thumbs">
                    <div class="product-image-thumb" ><img src="adminlte/car_img/<?php echo $row['fornt_image']; ?>" alt="Product Image"></div>
                    <div class="product-image-thumb" ><img src="adminlte/car_img/<?php echo $row['back_image']; ?>" alt="Product Image"></div>
                    <div class="product-image-thumb" ><img src="adminlte/car_img/<?php echo $row['interior_image']; ?>" alt="Product Image"></div>
                    <div class="product-image-thumb" ><img src="adminlte/car_img/<?php echo $row['image_chassis']; ?>" alt="Product Image"></div>
                    </div>
                </div>

                <div class="col-12 col-sm-6">
                    <h3 class="my-2"><?php echo $row['company'];?> - <?php echo $row['model_name'];?></h3>
                   
                    <p class="my-1"><?php echo $row['description'];  ?></p>
                    <hr>
                    <div class="btn-group btn-group-toggle d-flex" data-toggle="buttons">
                       <div class="col-6 my-1">
                        <h6><i class="fas fa-palette" style='font-size:20px;color:#3783c6'></i> <?php echo $row['color'];  ?> </h6>
                       </div>
                       <div class="col-6 my-1">
                        <h6><i class="fas fa-calendar-alt" style='font-size:20px;color:#3783c6'></i> <?php echo $row['modal_year'];  ?> </h6>
                       </div>  
                    </div>
                    <div class="btn-group btn-group-toggle d-flex" data-toggle="buttons">
                       <div class="col-6 my-1">
                        <h6><i class='fas fa-gas-pump' style='font-size:20px;color:#3783c6'></i> <?php echo $row['fual_type'];  ?> </h6>
                       </div>
                       <div class="col-6 my-1">
                        <h6> <i class="nav-icon fas fa-tachometer-alt" style='font-size:20px;color:#3783c6'></i> <?php echo $row['total_km'];  ?> km </h6>
                       </div>  
                    </div>
                    <div class="btn-group btn-group-toggle d-flex" data-toggle="buttons">
                       <div class="col-6 my-1">
                        <h6><i class="fas fa-user-alt" style='font-size:20px;color:#3783c6'></i>  <?php echo $row['ownership'];  ?> </h6>
                       </div> 
                    </div>
                   
                    <div class="bg-gray py-2 px-3 mt-4">
                    <h2 class="mb-0">
                       Rs.<?php echo $row['price'];  ?>
                    </h2>
                    </div>

                    <div class="mt-4">
					<?php
                     
                            $sell2 = "SELECT * FROM signup_tbl WHERE id = '$sid' and document_status!='pending'";
                            $sell_result2 = mysqli_query($conn,$sell2);
                            if(mysqli_num_rows($sell_result2)>0)
                            {
							?>
                    <?php
                     $vid = $_GET['vehicle'];
                            $sell = "SELECT * FROM sell_detail WHERE vehicleid = '$vid' AND customerid = '$sid'";
                            $sell_result = mysqli_query($conn,$sell);
                            if(mysqli_num_rows($sell_result)>0)
                            {?>
                                <div class="btn btn-danger btn-lg btn-flat" style="cursor: not-allowed; opacity: 0.7;">
                                    <a class="text-white disabled-link" disabled>
                                        <i class="fas fa-cart-plus"></i> All ready requested
                                    </a>
                                </div>
                           <?php }else{?>
                                 <div class="btn btn-danger btn-lg btn-flat"> 
                                    <a href="bike_detailpage.php?vid=<?php echo $row['vehicle_id']; ?>" class="text-white" onClick="return confirm('Are You Sure Request For This Vehicle?')">
                                    <i class="fas fa-cart-plus"> Sell Now</i></a>
                                 </div>

                           <?php }
                             
                            ?>
							<?php
							}
							else
							{
							?>
							<center>
							 <div class="btn btn-danger"> 
                                    <a href="document_upload.php" class="text-white">
                                    <p class="blink"> Upload Document</p></a>
                                 </div></center>
							<?php
							}
							?>

                    <!-- <div class="btn btn-default btn-lg btn-flat">
                        <i class="fas fa-heart fa-lg mr-2"></i> 
                        Add to Wishlist
                    </div> -->
                    <div class="row mt-4  d-flex">
                        <h4 class="bg-primary py-1">Owner Detail</h4>
                            <p><label for="">Owner Name:</label> <?php echo $row['owner_name'];  ?></p>
                            <p><label for="">Owner Address:</label> <?php echo $row['owner_address'];  ?></p>
                            <p><label for="">Owner Mobile Number:</label> <?php echo $row['mobile'];  ?></p>
                            <h4 class="bg-primary py-1">Document Detail</h4>
                            <table class="table table-bordered p-0">
                                <tr>
                                    <!--<th>ID</th>-->
                                    <th>Insurance Image</th>
                                    <th>PUC Image</th>
                                    <th>RC-BOOK Image</th>
                                </tr>
                                <tr>
                                   <?php /*?> <td><?php echo $row['vehicle_id']; ?></td><?php */?>
                                    <td><img src="adminlte/car_img/<?php echo $row['insurance_image']; ?>" style="width:100px;height:100px;"></td>
                                    <td><img src="adminlte/car_img/<?php echo $row['puc_image']; ?>" style="width:100px;height:100px;"></td>
                                    <td><img src="adminlte/car_img/<?php echo $row['rc_book']; ?>" style="width:100px;height:100px;"></td>
                                </tr>
                            </table>
                    </div>
                      <?php } ?>
                   
                    </div>

                </div>
                </div>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->

</section>
<!-- /.content -->
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

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="adminlte/dist/js/demo.js"></script>
</body>

</html>