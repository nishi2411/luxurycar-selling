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
    <script type="text/javascript">     
        	function PrintDiv() {    
           var divToPrint = document.getElementById('print');
           var popupWin = window.open('');
           popupWin.document.open();
           popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.document.close();
                }
     </script>
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
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white  active" aria-current="page">Invoice</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->  
        <!-- invoice -->
        <section id="main-content">
	<section class="wrapper">
		<div class="form-w3layouts">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">       
                                </div>
                            <?php
                              $bill_id = $_REQUEST['bill_id'];
                              $sel = "SELECT signup_tbl.*,sell_detail.*,vehicle_detail.*,car_model.* FROM sell_detail JOIN signup_tbl ON signup_tbl.id = sell_detail.customerid JOIN vehicle_detail ON vehicle_detail.vehicle_id = sell_detail.vehicleid JOIN car_model ON car_model.c_mid = sell_detail.vehicleid WHERE sell_detail.id = '$bill_id'";
                              $res = mysqli_query($conn,$sel);
                              while($row = mysqli_fetch_array($res))
                              {
                              ?>
					<div id="print">
                        <center>
                        <table class="table-bordered" border="1" cellspacing="1" cellpadding="1" width="651">
                        <tr>
                            <td width="651" colspan="6" valign="top"><p align="center"><b>LUXURY CAR SELLING</b> </p></td>
                        </tr>
                        <tr>
                            <td width="651" colspan="6" valign="top"><p>&nbsp; <center><b>Invoice</b></center></p></td>
                        </tr>
                        <tr>
                            <td width="130" valign="top"><p align="center"><strong>Payment  Date :</strong></p></td>
                            <td width="325" colspan="2" valign="top"><p>&nbsp; <?php echo $row['payment_date'];?></p></td>
                            <td width="68" valign="top"><p align="center"><strong>Bill No :</strong></p></td>
                            <td width="127" valign="top"><p>&nbsp;<b> <?php echo $row['id'];?></b></p></td>
                            <td width="1"></td>
                        </tr>
                        <tr>
                            <td width="130" valign="top"><p align="center"><strong>Customer Name:</strong></p></td>
                            <td width="521" colspan="5" valign="top"><p>&nbsp;<?php echo $row['firstname'].' ' . $row['lastname'];?></p></td>
                        </tr>
                        <tr>
                            <td width="130" valign="top"><p align="center"><strong>Mobile  No: </strong></p></td>
                            <td width="521" colspan="5" valign="top"><p>&nbsp;<?php echo $row['mobile'];?></p></td>
                        </tr>
                        <tr>
                            <td width="130" valign="top"><p align="center"><strong>Ownername  :</strong></p></td>
                            <td width="521" colspan="5" valign="top"><p>&nbsp; <?php echo $row['owner_name']?></p></td>
                        </tr>
                        <tr>
                            <td width="650" colspan="5" valign="top"><p>&nbsp;</p></td>
                            <td width="1"></td>
                        </tr>
                        <tr>
                            <td width="130" valign="top"><p align="center"><strong>Sr    No.</strong></p></td>
                            <td width="260" valign="top"><p align="center"><strong>Vehicle</strong></p></td>
                            <td width="133" colspan="2" valign="top"><p align="center"><strong>Amount</strong></p></td>
                            <td width="127" valign="top"><p align="center"><strong>Total Amount</strong></p></td>
                            <td width="1"></td>
                        </tr>
                        <tr>
                            <td width="130" valign="top"><p align="center">1</p></td>
                            <td width="260" valign="top"><p>&nbsp; <?php echo $row['model_name'];?>   </p></td>
                            <td width="133" colspan="2" valign="top"><p>&nbsp;<?php echo $row['price'];?> Rs.</p></td>
                            <td width="127" valign="top"><p>&nbsp; <?php echo $row['price'];?> Rs.</p></td>
                            <td width="1"></td>
                        </tr>
                        <tr>
                            <td width="130" valign="top"><p>&nbsp;</p></td>
                            <td width="260" valign="top"><p>&nbsp;</p></td>
                            <td width="133" colspan="2" valign="top"><p>&nbsp;</p></td>
                            <td width="127" valign="top"><p>&nbsp;</p></td>
                            <td width="1"></td>
                        </tr>
                        <tr>
                            <td width="390" colspan="2" valign="top"><p><strong>Note:</strong></p>
                                <p><strong>Payment Type : <?php echo $row['payment_type'];?></strong><br>
                                    <strong>Payment Date : <?php echo $row['payment_date'];?></strong></p>
                                    
                                </td>
                            <td width="133" colspan="2" valign="top"><p align="center"><strong>Grand Total :</strong><strong> </strong></p></td>
                            <td width="127" valign="top"><p>&nbsp;<?php echo $row['price'];?> Rs.</p></td>
                            <td width="1"></td>
                        </tr>
                        <tr>
                            <td width="390" colspan="2" valign="top"><p align="center"><strong>&nbsp;</strong></p>
                                <p align="center"><strong>&nbsp; </strong></p>
                            <p align="center"><strong>Customer Sign</strong></p></td>
                            <td width="261" colspan="3" valign="top"><p align="center"><strong>&nbsp;</strong></p>
                                <p align="center"><strong>&nbsp;</strong></p>
                            <p align="center"><strong>Authorized Sign</strong></p></td>
                            <td width="1"></td>
                        </tr>
                        </table></center>
                        <?php } ?>
					</div>
					<br>
			<div class="">
          <center><button class="btn btn-success" onClick="PrintDiv();"> <i class="fa fa-print"></i> Print</button>	</center>							       
		</div>

			  <br><br>
                        </div>
                    </section>
                </div>
            </div>
            
            
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </div>
</section>
        <!-- invoice -->
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