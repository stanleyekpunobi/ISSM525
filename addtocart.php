<?php session_start(); 
include("includes/db.php"); 
$msg = ""; 
$error = ""; 
if(isset($_SESSION['user']) && isset($_SESSION['cartid'])) 
{ 
   
       //VARIABLES FROM THE FORM INPUT DATA 
        $product_code = $_POST['product_code']; 
        $product_name = $_POST['product_name']; 
        $product_price = $_POST['product_price']; 
        $product_quantity = $_POST['product_quantity']; 

        // stock from db
        $stock = $_POST['stock']; 

         $newstock = $stock - $product_quantity;

        //SAMPLE CODE TO HELP YOU GENERATE RANDOM 6 BYTE STRING FOR STORING UNIQUE STRINGS FOR YOUR DATA IN CART TABLE 
        $prod_cartid = $_SESSION['cartid']; 
        
        //STORING USER SESSION NAME IN $USER 
        $usern = $_SESSION['user']; 

        //CHECK IF PRODUCT QUANTITY SELECTED IS BIGGER THAN THE AMOUNT OF PRODUCT AVAILABLE 
        if($product_quantity > $stock) 
        {
             $error = "CANNOT SELECT MORE THAN THE AVAILABLE STOCK";


             } 
             //CHECK IF NO ERROR EXISTS

             if(empty($error))
              { 
                  
                  //INSERT FORM VARIABLES INTO CART TABLE IN THE DATABASE 
                  $query = "INSERT INTO cart (product_code, product_name, product_price, product_quantity, product_cartid, user) 
                  VALUE ('$product_code','$product_name','$product_price','$product_quantity','$prod_cartid', '$usern')"; 
                  $result = mysqli_query($conn, $query); 
                  if($result)
                   { 
                       //WRITE YOUR UPDATE QUERY TO UPDATE THE STOCK OF THE PRODUCT BY SUBTRACTING THE QUANTITY SELECTED FROM THE STOCKS IN THE PRODUCT TABLE 
                      
                        $query = "UPDATE products SET stock = '$newstock' WHERE product_code = '$product_code'"; 
                        $result = mysqli_query($conn, $query); 
                      
                       $error="UPDATED"; 
                       } 
                       else 
                       {
                            $error = "FAILED";
                        }
                            
                            
                             echo $error;

                    }
                }
            
                if($error == 'UPDATED'){
                    header("location: cart.php");
                }
                              ?>