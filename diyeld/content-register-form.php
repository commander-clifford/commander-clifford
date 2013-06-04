
<div>
    <main>
        <h2>Sign Up</h2>
        <?php 
        //error message reporting
        if(isset($msg)):
            echo $msg;
        endif;?>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>?page=register" method="post">

        <label for="username">Choose your Alias:</label>
        <input type="text" name="username" id="username" required="required" />

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required="required" />

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required="required" />

        <label for="repassword">Repeat Password:</label>
        <input type="password" name="repassword" id="repassword" required="required" />

        <input type="checkbox" name="policy" id="policy" value="1" required="required" />
        <label for="policy">I agree to the <a href="index.php?page=terms">terms of service and privacy policy</a></label>

        <input type="submit" value="Sign Up!" />
        <input type="hidden" name="did_register" value="1" />
    </main>
</div><!--wrapper-->