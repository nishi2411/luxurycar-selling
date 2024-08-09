<?php
  include ("connection.php");
  include("session_customer.php");

  if(isset($_POST['btnupdate']))
  {
   $payment = $_POST['payment'];
   $paymentdate = date('Y-m-d');
   $sell_id = $_POST['sell_id'];
      
      $update = "UPDATE sell_detail SET payment_status = 'payment pending', payment_date = '$paymentdate', payment_type = '$payment' WHERE id = '$sell_id'";
      $status_res = mysqli_query($conn,$update);
     
      header("location:selling_customerdetail.php");
 
  }

 
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("css.php");?>
	<style>
	.blink {
            animation: blinker 1.5s linear infinite;
            color: green;
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

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <!-- <h1 class="display-3 text-white mb-3 animated slideInDown">Luxury Car|Selling</h1> -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="customer_home.php">Home</a></li>
                            <li class="breadcrumb-item text-white  active" aria-current="page">Payment Page</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->  
        <!-- customer sell cars -->
        <div class="container rounded bg-white ">
        <div class="row mt-5">
            <div class="card-body">   
                <table id="example1" class="table table-bordered table-striped w-100">
                            <thead>
                            <tr>
                            <th>SELL ID</th>
                            <th>Customer Name</th>
                            <th>Model Name</th>
                            <th>Selling Date</th>
                            <th>Car Detail</th>
                            <th>Owner Detail</th>
							<th>Selling Status</th>
                            <th>Payment</th>
                            <th>Approval Status</th>
                            <th>Bill</th>
                            
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $i = 1;
                            $customerid = $sid;
                            $customername = $firstname;
                            $query = "SELECT sell_detail.*,vehicle_detail.*,car_model.* FROM sell_detail JOIN vehicle_detail ON vehicle_detail.vehicle_id = sell_detail.vehicleid JOIN car_model ON car_model.c_mid = vehicle_detail.modal_id WHERE sell_detail.customerid ='$customerid'";
                            $result = mysqli_query($conn,$query);
                            while($row = mysqli_fetch_array($result))
                            { 

                        ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $customername; ?></td>
                        <td><?php echo $row['model_name']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><a href="customerselling_car.php?cardetail=<?php echo $row['id']; ?>" class="btn-primary btn-sm">Car Detail</a></td>
                        <td><a href="ownerselling_car.php?ownerdetail=<?php echo $row['id']; ?>" class="btn-info btn-sm">Owner Detail</a></td>
						<td><?php
						     if($row['selling_status'] =='pending')
							 {
							 ?>
							 <b class="btn btn-danger"><?php echo $row['selling_status']; ?></b>
							 <?php
							 }else if($row['selling_status'] =='accept')
							 {
							 ?>
							 <b class="btn btn-success"><?php echo $row['selling_status']; ?></b>
							 <?php
							 }if($row['selling_status'] =='cancel')
							 {
							 ?>
							 <b class="btn btn-secondary"><?php echo $row['selling_status']; ?></b>
							 <?php
							 }
							 ?>
						 </td>
                        <td> 
                       
                               
                                <?php if($row['selling_status'] == 'accept' && $row['payment_status'] == ''){ ?>
                                <button type="submit" class="blink" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $i ?>">Payment</button>
                                <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop<?php echo $i ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="width:900px;">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form method="post"> 
                                            <div class="modal-body">
                                                        <div class="form-group">
                                                                <div class="col-6 d-flex p-3 mx-auto">
                                                                <input type="hidden" name="sell_id" value="<?php echo $row['id']; ?>">
                                                                    <div class="form-check mx-2 my-4 ">
                                                                        <input class="form-check-input" type="radio" checked="checked" name="payment" id="gpay" value="GPAY" required>
                                                                        <label class="form-check-label" for="gpay">
                                                                            GPAY
                                                                        </label>
                                                                        </div>
                                                                        <img src="adminlte/car_img/main-qimg-73dea30d1ea0335b12059467652e8e26-lq.jpg" width="100px;">

                                                                        <div class="form-check mx-2 my-4">
                                                                            <input class="form-check-input" type="radio" name="payment" id="cash" value="CASH"  required>
                                                                            <label class="form-check-label" for="cash">
                                                                                CASH
                                                                            </label>
                                                                        </div> 
                                                                        <div class="form-check mx-2 mb-2 my-4">
                                                                            <input class="form-check-input" type="radio" name="payment" id="upi" value="UPI"  required>
                                                                            <label class="form-check-label" for="upi">
                                                                                UPI Payment(carselling@okaxis)
                                                                            </label>
                                                                        </div> 
                                                                </div>
                                                                <div class=" mx-1">
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-warning"  name="btnupdate">Update</button>
                                                                        <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                                                                    </div>
                                                                </div>
                                                                </form> 
                                                            </div>
                                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- modal popup --> 
                                    <?php  }
									else
									{
									?>
                                   <b class="btn btn-primary"><?php echo $row['payment_type']; ?></b>
									<?php
                                    }  ?>
                           
                        </td>
                        <td>
                            <?php 
                                 if($row['payment_status'] == 'accept')
                                {?>
                                  <button class="btn btn-success btn-sm">Payment Approved</button>   
                               <?php }else if($row['payment_status'] == 'payment pending'){?>  
                        <button class="btn btn-danger btn-sm">Payment Approval pending</button>
                               <?php  } else {?>  
                                
                               <?php  } ?>      
                        </td>
                        <td>
                        <?php 
                                if($row['payment_status'] == 'accept')
                                {?>
                          <a href="invoice_print.php?bill_id=<?php echo $row['id'];  ?>" class="btn-success btn-sm">Bill</a>
                         
                                    <?php } else{ } ?>
                        </td>
                    </tr>
                    <?php $i++; } ?>
                </tbody>
                </table>
				 <b style="color:red">** if your selling status accept then you are eligible for payment </b>
                </form>
             </div>
                </div>          
            </div>
                    </div>
                </div>
            </div>
        <!-- customer sell cars -->
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