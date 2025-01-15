<?php 
$title = "register_page " ;
include ('../inc/header.php');
include ('../inc/navbar.php');
?>
    
<div class="container px-4 px-lg-5 mt-5">
    <div class="row">
        <div class="col-8 mx-auto">
        <h1>Register</h1>
            <form action="../handellers/handel_register.php" method="POST" class="form border my-2 p-3">

                <div class="mb-3">
                    <?php if(isset($_SESSION['errors'])) : ?>
                    <?php foreach($_SESSION['errors'] as $key => $value) :?>
                    <h2 class="alert alert-danger"><?php print($_SESSION['errors']['value']) ; unset($_SESSION['errors']) ;?></h2>
                    <?php endforeach;?>
                    <?php endif;?>
                    <div class="mb-3">
                        <label for="name">user name</label>
                        <input type="text" name="username" id="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email">email</label>
                        <input type="text" name="useremail" id="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="pass">password</label>
                        <input type="password" name="userpassword" id="pass" class="form-control">
                    </div>

                    <div class="mb-3">
                        <p>select role</p>
                    <select name="role" id="type">
                        <option value="admin">admin</option>
                        <option value="user">user</option>
                    </select>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="login" id="" class="btn btn-success">
                        <p>if you have an account >> <a href="login.php">login </a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    



</body>
</html>

 <?php include ('../inc/footer.php');?>