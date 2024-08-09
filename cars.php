<?php include("connection.php");  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("css.php");?>
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
        <?php include("menubar.php"); ?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <!-- <h1 class="display-3 text-white mb-3 animated slideInDown">old|bike-car|selling</h1> -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white  active" aria-current="page">Car Detail Page</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->  
        <!-- car selling main Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <!-- <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5> -->
                    <h1 class="mb-5">Cars Detail</h1>
                </div>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                    <?php 
                            $vehicleid = $_GET['vid'];
                            $select = "SELECT vehicle_mst.vid,vehicle_mst.vehicle_type,company_mst.cid,company_mst.company,car_model.c_mid,car_model.model_name,
                            vehicle_detail.vehicle_id,vehicle_detail.vehicle_name,vehicle_detail.company_id,vehicle_detail.modal_id,vehicle_detail.description,
                            vehicle_detail.color,vehicle_detail.fual_type,vehicle_detail.modal_year,vehicle_detail.price,
                            vehicle_detail.ownership,vehicle_detail.total_km,vehicle_detail.fornt_image,vehicle_detail.back_image,
                            vehicle_detail.interior_image,vehicle_detail.image_chassis,vehicle_detail.insurance_image,vehicle_detail.puc_image,vehicle_detail.owner_name,vehicle_detail.owner_address,
                            vehicle_detail.mobile,vehicle_detail.rc_book,vehicle_detail.vehicle_verify_status FROM vehicle_detail INNER JOIN
                            vehicle_mst ON vehicle_mst.vid = vehicle_detail.vehicle_name INNER JOIN company_mst ON company_mst.cid = vehicle_detail.company_id INNER JOIN car_model ON car_model.c_mid = vehicle_detail.modal_id WHERE vehicle_name = '$vehicleid' and vehicle_verify_status='pending'";
                            $res = mysqli_query($conn,$select);      
                     ?>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <?php while($row = mysqli_fetch_array($res)){ ?>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                    <?php //while($row = mysqli_fetch_array($res)){  ?>
                                        <img class="flex-shrink-0 img-fluid rounded" src="adminlte/car_img/<?php echo $row['fornt_image']; ?>" style="width:200px;height:200px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex">
                                                <h4 class="border-bottom"><?php echo $row['company']; ?> - <?php echo $row['model_name']; ?></h4>
                                                <p>Yr-<?php echo $row['modal_year']; ?> - <?php echo $row['total_km']; ?> km.</p>
                                               
                                                <span class="text-primary">Rs. <?php echo $row['price']; ?></span>
                                            </h5>
                                            <small class="fst-italic"><?php echo $row['description']; ?></small>
											<a href="sign-in.php" class="btn btn-primary" style="width:200px">View Car Detail</a>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- car selling main End -->
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
</body>

</html>