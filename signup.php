<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
require_once 'controllers/authController.php';
?>

<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
            
    <title>DRIP</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="image/driplogo.png">
    <script src="https://kit.fontawesome.com/2dc97f5638.js" crossorigin="anonymous"></script>
 </head>
 <header>
     <div class="nav-container">
        <div class="logo-name">
            <a href="index.html"><img src="image/driplogo.png" width="125px"></a>
        </div>
        <nav>
            <ul class="nav-lists" style="list-style:none;">
                        <li><input id="search" type="text" placeholder="🔍 Search For Products..."><button class="search" type="submit"><i class="fas fa-search"></i></button></li>
                        <li><a class="cart" href="cart.html"><i class="fas fa-shopping-bag fa-2x"></i></a></li>
                        <li><a id="current-page" href="index.html">HOME</a></li>
                        <li><a href="#">PRODUCTS</a></li>
                        <li><a href="#">ABOUT US</a></li>
                        <li><a href="contact.html">CONTACT US</a></li>
                        <li><a href="signin.html">ACCOUNT</a></li>
                        
            </ul>
        </nav>        
     </div> 
 </header>

     
     <body>
   
         <div class="register-page">
             <div class="container">
                 <div class="row">
                     <div class="col-1">
                         <img src="image/juju5.jpg" width="100%">
                     </div>
                     <div class="col-2">
                         <img src="image/driplogo.png">
                         <h1>Sign Up Now</h1>
                         <div>
                              <?php if(count($errors) > 0): ?>
                              <div class="alert alert-danger">
                                 <?php foreach($errors as $error): ?>
                                 <li><?php echo $error; ?></li>
                                 <?php endforeach; ?>
                              </div>
                                <?php endif; ?>
                         </div>
                         <form action="signup.php" method="post">
                            <input class="input-item" type="text" name="username" value="<?php echo $username; ?>" placeholder="User Name">
                            <input class="input-item" type="email" name="email" value="<?php echo $email; ?>" placeholder="Email">
                            <input class="input-item" type="password" name="password" placeholder="Password">
                            <input class="input-item" type="password" name="cpassword" placeholder="Confirm Password">
                            <p><span><input id="terms-check" type="checkbox"></span>I agree to accept terms and conditions</p>
                            <button type="submit" name="signup-btn" id="sign-up">Sign Up</button>
                            <hr>
                            <p class="or">OR</p>
                            <button type="button" class="signin-btn"><a href="#" style="color: white;"><img src="image/google.png">Login with Gmail</a></button>
                            <p class="already">Already have an account?<a id="already" href="signin.php">Sign In</a></p>
                         </form>
                    </div>
                 </div>
             </div>
         </div>


     </body>
</html>