<?php
/**
 * Author: Dustin Starnes
 * Date: 11/21/2019
 * File: index.class.php
 * Description:
 */

class Index extends IndexView
{
    public function display()
    {

        parent::header("Create an Account");
        ?>
        <!-- top row of page header -->
        <div class="top-row">Create an account</div>

        <!-- middle row of page header -->
        <div class="middle-row">
            <!-- baseline for the rest of the views -->
            <p>Complete the form</p>

            <form action="../../index.php?action=registered" method="post">
                <div><input class="text-box" type="text" name="Username" placeholder="username goes here" required /></div>
                <div><input class="text-box" type="password" name="Password" placeholder="password goes here" required  minlength="5"/></div>
                <div><input class="text-box" type="email" name="email" placeholder="Email" required type="email" /></div>
                <div><input class="text-box" type="text" name="FirstName" placeholder="First Name" required /></div>
                <div><input class="text-box" type="text" name="LastName" placeholder="Last Name" required /></div>
                <div><input type="submit" value="Register" class="button"/></div>
            </form>
        </div>

        <!-- bottom row of page header -->
        <div class="bottom-row">
            <span style="float: left">Already have an account? <a class="link" href="/index.php?action=login">Login</a> </span>
        </div>
        <?php
        parent::footer();
    }
}