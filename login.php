<?php
    include("includes/db.php");
    session_start();
   // echo("PHP start");

    //ERROR DECLARATION VARIABLES
     //Set Error Values to EMPTY by default
      $userError = $passError = "" ;

      //CREATING BOOLEAN FOR CHECKING IF FIELDS ARE EMPTY
       $isEmpty = FALSE;

        if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
           // printf("Entered If condition!!!!!!!!!!!!");
            //DECLARE VARIABLES 
            $username = mysqli_real_escape_string($conn, $_REQUEST['txtusername']); 
            $passwd = mysqli_real_escape_string($conn, $_REQUEST['txtpword']); 

           
                              $sql = "SELECT * FROM users WHERE username = '$username' AND passwd = '$passwd'";
                              $result = mysqli_query($conn,$sql);
                              $row = mysqli_fetch_array($result);
  
        
                              //count the no of results returned- it should be only one result
                              $count = mysqli_num_rows($result);
                              printf ($count);
                              if($count == 1) {
                                  $_SESSION['user'] = $username;
                                $_SESSION['cartid'] = base64_encode(random_bytes(6)); 

                                  echo("Correct user login");
                                  header("location: product.php");
                               }else {
                                  $error = "Your Login Name or Password is invalid";
                                  echo("WRONG!! user login");
                               } 
        } 
    mysqli_close($conn)
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/loginPage.css">
</head>

<body>

    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Sign In</h3>

                    <!-- Contains social media icons -->
                    <!-- <div class="d-flex justify-content-end social_icon">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <span><i class="fab fa-google-plus-square"></i></span>
                        <span><i class="fab fa-twitter-square"></i></span>
                    </div> -->

                </div>
                <div class="card-body">
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"id="loginform" name="loginform">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" placeholder="username" name="txtusername" id="txtusername" required>

                        </div>
                        <!-- shows error -->
                        <i class="error"><?php echo $userError; ?></i>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-key"></i>
                                </span>
                            </div>
                            <input type="password" class="form-control" placeholder="password" name="txtpword" id="txtpword" required>
                        </div>
                        <div class="row align-items-center remember">
                            <input type="checkbox">Remember Me
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Login" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        Don't have an account?
                        <a href="#">Sign Up</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="#">Forgot your password?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous">
        </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous">
        </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous">
        </script>
        <!-- <script src="js/login.js"></script> -->
</body>

</html>