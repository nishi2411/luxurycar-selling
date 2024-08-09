<?php
 $msg="";
  include ("connection.php");
  include("session_customer.php");
  if(isset($_REQUEST['submitbtn']))
  {
      $oldpassword = mysqli_real_escape_string($conn,md5($_REQUEST['old_password']));
      $newpassword = mysqli_real_escape_string($conn,md5($_REQUEST['password']));
      $cpassword = mysqli_real_escape_string($conn,md5($_REQUEST['cpassword']));
      $email = $_SESSION['customer'];
      
      $changeselect = "SELECT * FROM signup_tbl WHERE password ='$oldpassword' and email='$email'";
      $result = mysqli_query($conn,$changeselect);
      if(mysqli_num_rows($result)>0)
      {
        if($_REQUEST['password'] == $_REQUEST['cpassword'])
        {
          $q1 = "UPDATE signup_tbl SET password ='$newpassword',cpassword ='$cpassword' WHERE  email='$email'";
          mysqli_query($conn ,$q1);
          $msg="password change";
        }
        else               
        {
          $msg="New and Conform password Are Not Match";
        }
      }
      else
      {
    $msg="old Password is Invalid";
      }
  }
?>
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
        <?php include("menubar_customer.php"); ?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <!-- <h1 class="display-3 text-white mb-3 animated slideInDown">Change Password</h1> -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="customer_home.php">Home</a></li>
                            <li class="breadcrumb-item text-white  active" aria-current="page">Change password</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->  
        <!-- profile Start -->
        <div class="container rounded bg-white">
            <?php 
                $email = $_SESSION['customer'];
                $select_query = "SELECT city_mst.city_id,city_mst.city_name,signup_tbl.id,signup_tbl.firstname,signup_tbl.lastname,signup_tbl.email,signup_tbl.mobile,signup_tbl.city,signup_tbl.gender,signup_tbl.address,signup_tbl.image FROM signup_tbl INNER JOIN city_mst ON
              city_mst.city_id = signup_tbl.city WHERE email = '$email'";
                $res = mysqli_query($conn,$select_query);
                while($row = mysqli_fetch_array($res)){
            ?>
            <form method="POST">
            <div class="card-body">
                <center><b style="color:orange">
        <?php
          if($msg != '')
          {
            echo "* ".$msg; 
          }
        ?>
        </b></center><br>
                <div class="row border border-warning border-3">
                    <div class="col-md-5 border-right m-auto">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Change Password</h4>
                            </div>
                            <div class="row mt-2">
                            <div class="form-group">
                                <div class="col-12 m-2">
                                    <label for="old_password">Old Password</label>
                                    <input type="password" name="old_password" class="form-control" id="old_password" placeholder="Enter old password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-12 m-2">
                                <label for="new_password">New Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter new password" required>
                                </div>
                            </div>
                            <div class="form-group">
                               <div class="col-12 m-2">
                                    <label for="cpassword">Confirm Password</label>
                                    <input type="password" name="cpassword" class="form-control" id="cpassword" placeholder="Enter confirm password" required >
                               </div>
                            </div>
                        </div>
                    <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="submitbtn">Change password</button>
                            </div>   
                        </div> 
                        </div>
                    </div>
                </div>
            </form>
            <?php  } ?>
        </div>
</div>
</div>
       

        <!-- profile End -->

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