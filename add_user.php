<?php

use Recommend\ClassFile\User;
use Recommend\ClassFile\connect;


require_once 'vendor/autoload.php';

/**
 * Get the user and insert to DB
 */


 if (isset($_POST['send'])) {

    $user = new User($_POST);

    /** Add user to database */
    if (!$user->addUser()) 
    {
        $_SESSION['message'] = connect::$error['message'];
        
    }
    else
    {
        $_SESSION['message'] = connect::$error['message'];
    }
    // selects user from database
    $query = $user->select_user();


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
                    if (isset($_SESSION['message'])) 
                    {
                        echo "<div class='alert'>" .$_SESSION['message']. "</div>";
                    }
                    if (isset($_SESSION['message'])) 
                    {
                        unset($_SESSION['message']);
                    }

                    
                ?>
                <div class="btns">
                    <a  href="./" class="user">Add User</a>
                    <a  href="/add_user" class="user">Back</a>
                </div>
                   
            </div>

        <div class="base table">
            <table class="striped">
                <tr>
                    <th>User Name</th>
                    <th>Add Product</th>
                    <th>Show Product</th>
                    <th>Show Recommend</th>
                </tr>

            <?php while ($result = mysqli_fetch_assoc($query)){ ?>
                <tr>
                    <td><?php echo $result['username'] ?></td>
                    <td>
                        <form action="add_product" method="get">
                            <input type="hidden" name="userId" value="<?php echo $result['id'];?>">
                            <button type="submit" >Add product</button>
                        </form>
                    </td>
                    <td>
                        <form action="show_product" method="get">
                            <input type="hidden" name="prodId" value="<?php echo $result['id']?>">
                            <button type="submit">Show products</button>
                        </form>
                    </td>
                    <td>
                        <form action="recom_product" method="post">
                            <input type="hidden" name="showId" value="<?php echo $result['id']?>">
                            <button type="submit">Show recommend</button>
                        </form>
                    </td>
                </tr>

                <?php }; ?>

            </table>
            
        </div>

    </div>
</section>