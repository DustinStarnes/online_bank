<?php
/**
 * Author: Emily Patrick
 * Date: $(DATE)
 * File: $(FILE_NAME)
 * Description:
 **/

class Reset extends IndexView
{

    public function display()
    {
        //header method
        parent::header("Reset");
        ?>

        <!-- top row of page header -->
        <div class="top-row">Reset</div>

        <!-- middle row of page header -->
        <div class="middle-row">
        <p>Reset your password</p>
        <form action="../../../index.php" method="post">

        <input type="username" name="Username" value="<?php echo $_COOKIE['username'] ?>" readonly /><br />
        <input type="password" name="Password" placeholder="Create new password." />




        <div class="bottom-row">
            <span style="float: left">Cancel password reset? <a class="link" href="../../../index.php">Cancel Reset</a></span>
            <span style="float: right"></span>
        </div>
        <?php

        //footer method
        parent::footer();
    }
}