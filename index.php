
<?php require 'header.php' ?>

<section class="container">
    <div class="main_cont">
        <div class="header img">
            <h1>RECOMMEDATION SYSTEM</h1>

        </div>

        <div class="base">
                <h2>Register User</h2>
            <form action="add_user" method="post">
                <div class="form_group">
                    <input type="text" name="username" id="username" placeholder="Enter username">
                </div>

                <div class="form_group">
                    <input type="submit" name="send" id="send" value="Register">
                </div>
            </form>
        </div>

    </div>
</section>
