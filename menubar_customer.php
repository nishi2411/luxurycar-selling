<?php 

include("connection.php");
include("session_customer.php");
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
<?php 
         $current_url = basename($_SERVER['PHP_SELF']);
           $active = "active";
       
      ?>
                <a href="" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-car me-1"></i> Luxury Car|Selling</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="customer_home.php" class="nav-item nav-link <?php if($current_url == "customer_home.php"){ echo $active;}?>">Home</a>
                    </div>
                    <!-- vehicle -->
                    <div class="nav-item dropdown">
                        <?php 
                            $select = "SELECT * FROM vehicle_mst";
                            $res = mysqli_query($conn, $select);
                        ?>
                        <a href="customer_cars.php" class="nav-link dropdown-toggle <?php if($current_url == "customer_cars.php" || $current_url == "customer_bike.php"){ echo $active;}?> " data-bs-toggle="dropdown">VEHICLE</a>
                        <div class="dropdown-menu m-0">
                            <?php 
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $vehicleType = $row['vehicle_type'];
                                    $vehicleId = $row['vid'];
                            ?>
                            <?php if ($vehicleId == 1): ?>
                                <a href="customer_cars.php?vehicle_id=<?php echo $vehicleId; ?>" class="dropdown-item <?php if($current_url == "customer_cars.php"){ echo $active;}?>"><?php echo $vehicleType; ?></a>
                            <?php elseif ($vehicleId == 2): ?>
                                <a href="customer_bike.php?vehicle_id=<?php echo $vehicleId; ?>" class="dropdown-item <?php if($current_url == "customer_bike.php"){ echo $active;}?>"><?php echo $vehicleType; ?></a>
                            <?php endif; ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="navbar-nav pe-4">
                        <a href="selling_customerdetail.php" class="nav-item nav-link <?php if($current_url == "selling_customerdetail.php"){ echo $active;}?>">Buy Vehicle</a>
                    </div>

                    <!-- vehicle end -->
                         <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle <?php if($current_url == "customerprofile.php" || $current_url == "document_upload.php" ||$current_url == "cust_changepass.php" ||$current_url == "logout.php"){ echo $active;}?> " data-bs-toggle="dropdown">WELCOME (<?php echo $firstname;  ?> <?php echo $lastname;  ?>)</a>
                            <div class="dropdown-menu m-0">
                                <a href="customerprofile.php" class="dropdown-item <?php if($current_url == "customerprofile.php"){ echo $active;}?>">User Profile</a>
                                <a href="document_upload.php" class="dropdown-item <?php if($current_url == "document_upload.php"){ echo $active;}?>">Documents</a>
                                <a href="cust_changepass.php" class="dropdown-item <?php if($current_url == "cust_changepass.php"){ echo $active;}?>">Change Password</a>
                                <a href="logout.php" class="nav-item nav-link <?php if($current_url == "logout.php"){ echo $active;}?>">Logout</a>     
                            </div>
                        </div> 
                </div>
            </nav>