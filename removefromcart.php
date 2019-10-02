<?php session_start(); 
include("includes/db.php"); 
$msg = ""; 
$error = ""; 
if(isset($_SESSION['user']) && isset($_SESSION['cartid'])) 
{ 
   
       //VARIABLES FROM THE FORM INPUT DATA 
        $product_code = $_POST['product_code']; 
        $id = $_POST['id']; 
        $product_cartid = $_POST['product_cartid']; 
        $product_quantity = $_POST['product_quantity']; 
        $productstock = 0;
        $newstock = 0;

        // stock from db
        // $stock = $_POST['stock']; 

        // $newstock = $stock - $product_quantity;

        //SAMPLE CODE TO HELP YOU GENERATE RANDOM 6 BYTE STRING FOR STORING UNIQUE STRINGS FOR YOUR DATA IN CART TABLE 
       // $prod_cartid = $_SESSION['cartid']; 
        
        //STORING USER SESSION NAME IN $USER 
        $usern = $_SESSION['user']; 


        //update product stock in products table
         $query = "SELECT * FROM products WHERE product_code = '$product_code'"; 
         $result = mysqli_query($conn, $query);
         if(mysqli_num_rows($result) > 0) 
         { 
            while( $row = mysqli_fetch_array($result)) 
            { 
                $productstock = $row['stock'];

            }

            $newstock = $productstock + $product_quantity;

            $query = "UPDATE products set stock = '$newstock' where product_code ='$product_code'"; 
            $result = mysqli_query($conn, $query);
            if($result)
            {
             $error="UPDATED"; 
            }
         }

       
             //CHECK IF NO ERROR EXISTS
             if($error == 'UPDATED')
            { 
                  
                  //REMOVE FROM CART TABLE 
                $query = "DELETE from cart WHERE id = '$id' AND product_cartid = '$product_cartid'"; 
                $result = mysqli_query($conn, $query); 
                if($result)
                { 
                      header("location: cart.php");

                }
            }
            
}
?>