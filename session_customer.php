<?php 

        if(isset($_SESSION['customer']))
        {
            $email = $_SESSION['customer'];
            $selstudent = "SELECT * From signup_tbl  WHERE email='$email'";
            $resultstudent = mysqli_query($conn,$selstudent);
            $row2=mysqli_fetch_array($resultstudent);
            $sid = $row2['id'];
            $image = $row2['image'];
            $email = $row2['email'];
            $firstname = $row2['firstname'];
            $lastname = $row2['lastname'];
            // $lastname = $row2['lastname'];
            $address = $row2['address'];
            $mobile = $row2['mobile'];
            // $upload_resume = $row2['upload_resume'];
            // $scode = $row2['student_code'];
        }
        else
        {
            header("location:sign-in.php");
        }
    
?>