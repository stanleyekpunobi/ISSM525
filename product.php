<?php include("includes/db.php");
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/custom.css">
    <script src="https://kit.fontawesome.com/d0457af364.js"></script>

</head>

<body>
  <div class="container-fluid">
        <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
                aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="store.html">Vuss Inc</a>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a id="loginatag" class="nav-link" href="login.html">Login <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aboutus.html">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true"> <i
                                class="fas fa-shopping-cart"></i>
                        </a>
                    </li>
                </ul>

            </div>
        </nav>

    </div>

 <div class="container-fluid store-body">

        <div class="row">
   <?php $query = "SELECT * FROM products"; 
    $result = mysqli_query($conn, $query); 
    if(mysqli_num_rows($result) > 0) 
    { 
    
     while( $row = mysqli_fetch_array($result)) 
    { 
   // echo $row['product_code'];
    ?>
    
    <!-- insert product page html code here -->

   
           
                    <div class="col-md-4">
                        <div class="card product-card">
                            <img src="<?php echo $row['picture'] ?>" class="card-img-top product-img" alt="">
                            <div class="card-body">
                                <h5 class="card-title product-title"><?php echo $row['name'] ?>
                                    <span class="badge badge-pill badge-primary">$<?php echo $row['price'] ?></span>
                                </h5>
                                <p class="card-text product-description"> Product code: <?php echo $row['product_code'] ?>
                                </p>
                                <a href="productdetails.php?productid=<?php echo $row['product_code'] ?>" class="btn btn-outline-success btn-sm btn-block">View </a>
                               
                            </div>
                            
                        </div>
                 
            </div>
    
    <?php 
        
    } } 
        
    ?>
     </div>
    </div>
    <div class="footer-section">
        <p class="footer-content">&copy; Vuss inc. Group F Lab Live Demo</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <!-- <script src="js/store.js"></script> -->
</body>

</html>