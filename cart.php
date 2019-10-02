<?php 
include("includes/db.php");
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Check Out</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/custom.css">
    <script src="https://kit.fontawesome.com/d0457af364.js"></script>
</head>
<body>
    <div class="container">
            <div class="row">

                <div class="col-md-6 col-sm-12">
                    <div class="card checkout-card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Check out</h5>
                            <h6 class="card-subtitle mb-2 text-muted text-center">Please enter payment details</h6>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" id="name" required placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="email" required
                                    aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                    anyone
                                    else.</small>
                            </div>

                            <div class="form-group">
                                <label for="">Billing address</label>
                                <input type="text" class="form-control" id="address" required
                                    aria-describedby="emailHelp" placeholder="Billing address">

                            </div>

                            <div class="form-group">
                                <label for="">Postal Code</label>
                                <input type="text" class="form-control" id="postalcode" aria-describedby="emailHelp"
                                    placeholder="Postal code">
                            </div>

                            <button type="button" id="paybtn" class="btn btn-primary">Proceed to payment</button>
                        </div>
                    </div>
                </div>
               
                <div class="col-md-6 col-sm-12">
                    <div class="card checkout-card">
                        <div class="card-body">
                            <h5 class="card-title text-center">My Cart</h5>
                                            <p class="card-text cart-text" id="cartItem" style="font-size: 15px">

                <?php
                if(isset($_SESSION['user']) && isset($_SESSION['cartid'])) 
                { 

                    $cartid = $_SESSION['cartid'];
                    $user = $_SESSION['user'];
                    $cartTotal = 0;
                    $quantity = 0;
                    $price = 0;
                    // echo $cartid;
                   // echo $user;
                    $query = "SELECT * FROM cart WHERE product_cartid = '$cartid' AND user = '$user'";
                    $result = mysqli_query($conn, $query);

                     if(mysqli_num_rows($result) > 0) 
                    { 
                    
                    while( $row = mysqli_fetch_array($result)) 
                    { 
                    $price = $row['product_price'];
                    $quantity = $row['product_quantity'];
                        $cartTotal = $cartTotal +  (int)$price * (int)$quantity;

                    ?>
                                <form action="removefromcart.php" method="post">
                                <input type="hidden" name="product_code" value="<?php echo $row['product_code'] ?>">
                                 <input type="hidden" name="id" value="<?php echo $row['id'] ?>"> 
                                 <input type="hidden" name="product_cartid" value="<?php echo $row['product_cartid'] ?>"> 
                                 <input type="hidden" name="product_quantity" value="<?php echo $row['product_quantity'] ?>">
                                 <div class="row cartitem-row">
                                    <div class="col-md-5">
                                        <strong class="p-name"><?php echo $row['product_name'] ?></strong></p>
                                    </div>
                                    <div class="col-md-2">
                                        <p><strong>Price: <?php echo $row['product_price'] ?></strong>
                                       </p>
                                    </div>
                                    <div class="col-md-2">
                                     <span class="badge badge-primary quantity">Quantity <?php echo $row['product_quantity'] ?></span>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-secondary btn-sm remove-cart-item float-right">x</button>
                                    </div>
                                 </div>
                                </form>
                            <?php

                }
                }
            }
                ?>
                 <div class="row">
                                    <div class="col-md-12">

                                        <p class="text-right" id="">Total ($): <?php echo $cartTotal ?><span id="carttotal"></span></p>

                                    </div>

                                    <a href="product.php" class="btn btn-primary">Continue shopping</a>
                                </div>
              </p>

                        </div>
                    </div>
                </div>
                        
               
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

    <script src="js/checkout.js"></script>

    <script src="https://js.paystack.co/v1/inline.js"></script>

</body>

</html>