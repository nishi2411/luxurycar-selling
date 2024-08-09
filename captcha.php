<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="captcha.js"></script>

</head>
<body onLoad="generate()">
    <form action="" method="post">
    <div id="user-input" class="inline">
        <br>
             <input type="text" class="form-control" id="submit" placeholder="Captcha code" required />
                                        </div>
                                        <div class="inline" onClick="generate()">
                                            <i class="fas fa-sync"></i>
                                        </div>

                                        <div id="image" class="inline" selectable="False">
                                        </div>  <div class="col-md-3">            
                                        <p id="key" style="color:red"></p>
                                     </div>
                                     <div class="col-12">
                                            <div id="vid">
                                                <button class="btn btn-primary w-100 py-3" type="submit" name="signupbtn" onClick="printmsg()">Sign Up</button>
                                            </div>
                                        </div>
    </form>
</body>
</html>