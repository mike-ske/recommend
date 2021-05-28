<?php

use Recommend\ClassFile\connect;
use Recommend\ClassFile\product;

session_start();

require_once 'vendor/autoload.php';

// Get the user ID form the product page

if (isset($_GET['userId'])) 
{
    $_SESSION['user__id'] = $_GET['userId'];
   
}

// echo  $_SESSION['user__id'];
//** add the product to DB based on the USER ID */


if ($_POST) 
{
    
  $postObj = new product($_POST);

  $postObj->getData();
  $insert  = $postObj->insertProduct($_SESSION['user__id']);

  !$insert ? $_SESSION['message'] = connect::$error['message'] :  $_SESSION['message'] = connect::$error['message'];



}


?>

<?php require 'header.php' ?>



<section class="container">
    <div class="main_cont">
        <div class="header img">
            <h1>RECOMMENDATION SYSTEM</h1>

        </div>

                <div class="btns">
                    <a  href="./" class="user">Add User</a>
                    <a  href="./add_user" class="user">Back</a>
                </div>
        <div class="btn_section">
            <form action="" method="post">

                <?php
                    if (isset($_SESSION['message'])) 
                    {
                        echo "<div class='alert'>" .$_SESSION['message']. "</div>";
                    }
                    if (isset($_SESSION['message'])) 
                    {
                        unset($_SESSION['message']);
                    }

                ?>
                <div class="form_group">
                    <input type="text" name="product_name" id="product_name" placeholder="Enter product name">
                </div>
                <div class="form_group">
                    <span>Enter product</span>
                    <select name="product_category" id="product_category" class="select_cat">
                        <option checked></option>
                        <option value="Gowns">Gowns</option>
                        <option value="Native Shirt">Native Shirt</option>
                        <option value="Hood">Hood</option>
                        <option value="T-Shirt">T-Shirt</option>
                        <option value="Sleeves">Sleeves</option>
                    </select>
                </div>
                <div class="form_group">
                    <input type="text" name="product_rating" id="product_rating" placeholder="Enter product rating">
                </div>
                <div class="form_group">
                    <input type="text" name="product_purchase" id="product_purchase" placeholder="Enter product purchase i.e 2000 in Naira">
                </div>


                <button type="submit" name="user">Add Product</button>
            </form>

        </div>



    </div>
</section>