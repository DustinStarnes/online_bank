<?php
/**
 * Author: Emily Patrick
 * Date: $(DATE)
 * File: $(FILE_NAME)
 * Description:
 **/

class Login extends IndexView
{
    public function display(){

        //header method
        parent::header();
        ?>

        <!-- top row of page header -->
        <div class="top-row">Login</div>


        <!-- middle row of page header -->
        <div class="middle-row">
            <p>Please login using your username & password</p>
            <form action="../../../index.php?action=registered" method="post">
                <div><input type="text" name="Username" placeholder="username goes here"/></div>
                <div><input type="password" name="Password" placeholder="Password must be a minimum of 5 characters" minlength="5"/></div>
                <div><input type="submit" value="Login" class="button"/></div>
            </form>
        </div>

        <!-- bottom row of page header -->
        <div class="bottom-row">
            <span style="float: left">Don't have an account? Sign up! <a href="/index.php?action=register">Login</a> </span>
        </div>
        <?php
        //footer method
        parent::footer();

    }



}