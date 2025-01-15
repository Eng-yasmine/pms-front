<?php
$title ="login_page" ;
include ('../inc/header.php');
include ('../inc/navbar.php');
?>
         <div class="container">
                <div class="row">
                    <div class="col-8">
                        <div>
                        <h2 class="bold">login</h2>
                        </div>
                       
                        <form action="../handellers/handelchecked.php" method="POST" class="form border my-2 p-3">  
                        <div class="mb-3">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="enter your name greater than 6 char">
                                </div>
                                <?php if(isset($_SESSION['name'])):?>
                              <h1 class="alert alert-danger" ><?=$_SESSION['name'] ; unset($_SESSION['name']);?></h1>
                              <?php endif;?>
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="enter your valid email">
                                </div>
                                <?php if(isset($_SESSION['email'])):?>
                                <h1 class="alert alert-danger" ><?=$_SESSION['email'];unset($_SESSION['email']);?></h1>
                                <?php endif;?>
                                
                                <div class="mb-3">
                                    <input type="submit" value="login" id="" class="btn btn-success">
                                    <p>if you have not account >> <a href="register.php">register </a></p>
                                </div>
                               
                            </div>
                          
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include '../inc/footer.php' ?>