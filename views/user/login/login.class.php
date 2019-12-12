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
        parent::header("Login");
        ?>

        <!-- top row of page header -->
        <div class="top-row">Login</div>


        <!-- middle row of page header -->
        <div class="middle-row">
            <p>Please login using your username & password</p>
            <form action="<?= BASE_URL . "/user/verify/" ?>" method="post">
                <div><input  type="text" name="username" placeholder="Username"/></div>
                <div><input  type="password" name="password" placeholder="Password" minlength="5"/></div>
                <div><input type="submit" value="Login" class="button"/></div>
            </form>
        </div>

        <!-- bottom row of page header -->
        <div class="bottom-row">
            <span style="float: left">Don't have an account? <a class="link" href="#"> Sign up!</a> </span>
        </div>
        <?php
        //footer method
        parent::footer();

    }



}