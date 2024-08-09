<?php
  include ("connection.php");
  include("session_customer.php");
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ("css.php"); ?>
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

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container my-5 py-5">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="display-3 text-white animated slideInLeft">LET'S KEEP IT SIMPLE</h1>
                            <p class="text-white animated slideInLeft mb-4 pb-2">We are the best when it comes to Exotic Cars</p>
                            <!-- <a href="index.php" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Read More</a> -->
                        </div>
                        <!-- <div class="col-lg-6 text-center">
                            <img class="img-fluid" src="img/pexels-mike-bird-1007410.jpg" alt="">
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-medal text-primary mb-4"></i>
                                <h5>Highly Qualified</h5>
                                <p>We ensure every piece of pre-owned luxury vehicle we deliver from here is of high quality, has great maintenance, is in good condition, and is the best. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-money-bill-alt text-primary mb-4"></i>
                                <h5>Value for Money</h5>
                                <p>We value money, and it is important for us to give that vision to our customers also. We provide you with vehicles that have the value you provide to us. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-water text-primary mb-4"></i>
                                <h5>Flood-Free Policy</h5>
                                <p>Harman motors follows a flood free policy by which if you claim the insurance, Harman Motors will support to repair/rebuild the parts that suffer damage due to flood.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-tools  text-primary mb-4"></i>
                                <h5>Vehicles with Service History</h5>
                                <p>We , Harman is the Pioneer and Flagship Dealer of pre-owned Luxury  Cars in kerala with 1000+ delighted customers across India since the last five years. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="img/adam-stefanca-hdMSxGizchk-unsplash.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="img/kenny-eliason-FcyipqujfGg-unsplash.jpg" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="img/obi-pixel8propix-aZKJEvydrNM-unsplash.jpg">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="img/tabea-schimpf-O7WzqmeYoqc-unsplash.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">About Us</h5>
                        <h1 class="mb-4">Welcome</h1>
                        <p class="mb-4">Stepping up to create a benchmark in the pre-owned automotive industry, Harman Motors is a galore of the most exotic and expensive imported cars. Get to know and drive off with your dream car, through our hassle free sales process, clear documentation procedures and extensive customer support.</p>
                        <p class="mb-4">We have a nationwide sourcing capacity from across India and years of experience working with India’s leading automotive dealers and selling world’s most luxurious pre-owned cars that feature the finest cars in it’s pristine condition chosen after a series of stringent quality tests.</p>
                        <div class="row g-4 mb-4">
                            <!-- <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">15</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Years of</p>
                                        <h6 class="text-uppercase mb-0">Experience</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">50</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Popular</p>
                                        <h6 class="text-uppercase mb-0">Master Chefs</h6>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                      <!--  <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>-->
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
        <?php include ("footer.php"); ?>
        <!-- Testimonial End -->
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
     

       