
<?php require_once 'controllers/authController.php'; ?>

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
                     
                     <div class="col-2-signin">
                         <img src="image/driplogo.png">
                         <h1>Sign In</h1>
                           <div>
                              <?php if(count($errors) > 0): ?>
                                <div class="alert alert-danger">
                                   <?php foreach($errors as $error): ?>
                                   <li><?php echo $error; ?></li>
                                   <?php endforeach; ?>
                                </div>
                                   <?php endif; ?>
                           </div>  
                           <form action="signin.php" method="post">
                            <input class="input-item" type="text" name="username" value="<?php echo $username; ?>" placeholder="Email or User Name">
                            <input class="input-item" type="password" name="password" placeholder="Password">
                            <button type="submit" name="signin-btn" id="sign-in">Sign In</button>
                            <hr>
                            <p class="or">OR</p>
                            <button type="submit" class="signin-btn"><a href="#" style="color: white;"><img src="image/google.png">Login with Gmail</a></button>
                            <p class="already-signin">Don't have an account yet?<a id="already" href="signup.php">Sign Up</a></p>
                         </form>
                    </div>
                 </div>
             </div>
         </div>


     </body>
</html>