<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-car me-1"></i> Luxury Car|Selling</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <?php 
                    $current_url = basename($_SERVER['PHP_SELF']);
                    $active = "active";
       
                ?>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="index.php" class="nav-item nav-link <?php if($current_url == "index.php"){ echo $active;}?>">Home</a>
                        <a href="about.php" class="nav-item nav-link <?php if($current_url == "about.php"){ echo $active;}?>">About</a>
                        <a href="service.php" class="nav-item nav-link <?php if($current_url == "service.php"){ echo $active;}?>">Service</a>
                        <div class="nav-item dropdown">
                        <?php 
                            $select = "SELECT * FROM vehicle_mst";
                            $res = mysqli_query($conn, $select);
                        ?>
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Vehicle</a>
                            <div class="dropdown-menu m-0">
                            <?php 
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $vehicleType = $row['vehicle_type'];
                                    $vehicleId = $row['vid'];
                            ?>
                                <?php if ($vehicleId == 1): ?>
                                <a href="cars.php?vid=<?php echo $vehicleId; ?>" class="dropdown-item <?php if($current_url == "cars.php"){ echo $active;}?>"><?php echo $vehicleType; ?></a>
                            <?php elseif ($vehicleId == 2): ?>
                                <a href="bike.php?vid=<?php echo $vehicleId; ?>" class="dropdown-item <?php if($current_url == "bike.php"){ echo $active;}?>"><?php echo $vehicleType; ?></a>
                            <?php endif; ?>
                            <?php } ?>
                              
                            </div>
                        </div>
                        <a href="contact.php" class="nav-item nav-link <?php if($current_url == "contact.php"){ echo $active;}?>">Contact</a>
                    </div>
                    <a href="sign-in.php" class="btn btn-primary py-2 px-4">Sign In</a>
                </div>
            </nav>