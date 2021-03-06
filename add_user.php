<?php


use Recommend\ClassFile\User;
use Recommend\ClassFile\connect;

session_start();
require_once 'vendor/autoload.php';

/**
 * Get the user and insert to DB
 */


 if ($_POST) {

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
    if (!$query) 
    {
        $_SESSION['message'] = connect::$error['message'];
    }

 }



?>

<?php require 'header.php' ?>

<section class="container">
    <div class="main_cont">
        <div class="header img">
            <h1>E-Store RECOMMENDATION SYSTEM</h1>

        </div>

        <div class="btns">
            <a  href="./" class="user">Add User</a>
            <a  href="./add_user" class="user blue">Back</a>
        </div>
            
           

        <div class="table">
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