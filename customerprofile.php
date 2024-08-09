<?php 
  include ("connection.php");
    include("session_customer.php");
    
    if(isset($_REQUEST['saveprofile']))
    {

        $firstname = $_REQUEST['firstname'];
        $lastname = $_REQUEST['lastname'];
        $email = $_REQUEST['email'];
        $mobile = $_REQUEST['mobile'];
        $city = $_REQUEST['city'];
        $address = $_REQUEST['address'];
        $email = $_SESSION['customer']; 
        $image = $_POST['oldImage'];
        // Check if a new image is uploaded
        if(!empty($_FILES['newImage']['name'])) {
            // Remove the old image
            if(file_exists('uploads/' . $image)) 
            {
                unlink('uploads/' . $image);
            }

    // Upload the new image
    $imageFileName = $_FILES['newImage']['name'];
    $imageTmpName = $_FILES['newImage']['tmp_name'];
    $imageSize = $_FILES['newImage']['size'];

    move_uploaded_file($imageTmpName, 'uploads/' . $imageFileName);
    $image = $imageFileName;
    } else {
        // No new image uploaded, use the old image
        $image = $image;
    }

    $query = "UPDATE signup_tbl SET firstname = '$firstname', lastname = '$lastname', email = '$email', 
            mobile = '$mobile', city = '$city', address = '$address', image = '$image' 
            WHERE email = '$email'";  
    $result = mysqli_query($conn, $query);  

    echo '<script>alert("successfully updated")</script>';
    echo "<script>window.location='customerprofile.php'</script>";
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
                    <!-- <h1 class="display-3 text-white mb-3 animated slideInDown">Profile Page</h1> -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="customer_home.php">Home</a></li>
                            <li class="breadcrumb-item text-white  active" aria-current="page">Customer Profile</li>
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
            <form method="post"  enctype="multipart/form-data">
                <div class="row border border-warning border-3">
                    <div class="col-md-3 border-right  m-auto">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-4">
                            <img class="rounded-circle" width="500px" src="uploads/<?php echo $row['image']; ?>">
                            <!-- new image -->
                                <label for="newImage" class="fas fa-edit text-warning mt-3"> <a href="">Update photo</a></label>
                                <input type="file" name="newImage" id="newImage" style="display:none;" value="<?php echo $row['image']; ?>">
                            <!-- old image -->
                                <!-- <label for="oldImage" class="fas fa-edit text-warning mt-2"> <a href="#">edit photo</a></label> -->
                                <input type="hidden" name="oldImage" id="oldImage" style="display:none;" value="<?php echo $row['image']; ?>" >

                                <span class="font-weight-bold mt-2"> <?php echo $row['firstname'] . " " .$row['lastname'];  ?></span>
                                <span class="text-black-50"><?php echo $row['email']; ?></span><span> </span>                                 
                        </div>
                    </div>
                   
                    <div class="col-md-5 border-right m-auto">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Profile</h4>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label class="labels">FirstName</label>
                                    <input type="text" class="form-control" name="firstname" value="<?php echo $row['firstname']; ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="labels">Lastname</label>
                                    <input type="text" class="form-control" name="lastname"  value="<?php echo $row['lastname']; ?>" required>
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $row['email']; ?>" readonly="" required>
                                    <div id="vid" style="color:red;font-weight:bold;"></div>
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">Mobile Number</label>
                                    <input type="text" class="form-control" name="mobile" value="<?php echo $row['mobile']; ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="city">City</label>
                                        <?php
                                            $select = "SELECT * FROM city_mst";
                                            $result = mysqli_query($conn,$select);

                                          ?>
                                            <select class="form-control select2 bg-white" style="width: 100%;" name="city" id="city">
                                                <!-- <option selected="selected">Select City</option> -->
                                                <?php while($rows = mysqli_fetch_array($result)){ ?>
                                                <option value="<?php echo $rows['city_id']; ?>"
                                              <?php
                                                if($row['city'] == $rows['city_id'])
                                                    {
                                                        echo "selected";
                                                    } 
                                            ?>
                                                
                                                ><?php echo $rows['city_name']; ?></option>
                                                <?php } ?>
                
                                            </select>
                                      
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="labels">Gender</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="male" value="male" required
                                            <?php
                                                    if($row['gender'] == 'male')
                                                    {
                                                        echo "checked";
                                                    }
                                                ?>>
                                            <label class="form-check-label" for="male">
                                                Male
                                            </label>
                                            </div>
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="female" value="female"  required
                                            <?php
                                                    if($row['gender'] == 'female')
                                                    {
                                                        echo "checked";
                                                    }
                                                ?>>
                                            <label class="form-check-label" for="female">
                                                Female
                                            </label>
                                        </div>    
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label class="labels">Address</label>
                                        <input type="text" class="form-control" name="address" value="<?php echo $row['address']; ?>">
                                    </div>
                                </div>
                            </div> 
                            <div class="mt-5 text-center">
                                <button type="submit" class="btn btn-primary profile-button"  name="saveprofile">Update Profile</button>
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