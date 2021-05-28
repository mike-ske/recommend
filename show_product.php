<?php 


use Recommend\ClassFile\connect;
use Recommend\ClassFile\product;

session_start();

require_once 'vendor/autoload.php';

// Get the user ID form the product page

if (isset($_GET['prodId'])) 
{
    echo $_SESSION['prodId'] = $_GET['prodId'];
   
}


$postObj = new product($_POST);
    
if (!$postObj) 
{
    $getUser = $postObj->selectProduct($_SESSION['prodId']);
    var_dump($getUser);
    if (!$getUser) 
    {
        $_SESSION['message'] = connect::$error['message'];
    }
}


?>

<?php require 'header.php' ?>



<section class="container">
    <div class="main_cont">
        <div class="header img">
            <h1>RECOMMEDATION SYSTEM</h1>

        </div>

        <div class="btn_section">
                <?php
                    if (isset($_SESSION['message'])) {
                        echo "<div class='alert'>" .$_SESSION['message']. "</div>";
                    }
                    
                ?>
                <div class="btns">
                    <a  href="./" class="user">Add User</a>
                    <a  href="./add_user" class="user">Back</a>
                </div>
            
            <div class="base table">
                <table class="striped">
                    <tr>
                        <th>Product</th>
                        <th>Rating</th>
                        <th>Purchase</th>
                    </tr>

                <?php while ($result = mysqli_fetch_assoc($getUser)){ ?>
                    <tr>

                        <td><?php echo $result['product_name'] ?></td>
                        <td><?php echo $result['product_rating'] ?></td>
                        <td><?php echo $result['product_purchase'] ?></td>
                        
                    </tr>

                <?php }; ?>

                </table>
                
            </div>
                
        </div>



    </div>
</section>