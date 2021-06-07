<?php 
require_once'controllers/authController.php';
if(!isset($_SESSION['id'])){
    header('location: signin.php');
    exit();
}
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
    <style>
        a.logout{
            position: relative;
            bottom: 20px;
        }
        #mes{
            text-align: center;
        }


    </style>
    
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
                <li><a href="signin.php">ACCOUNT</a></li>
                
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
                     <?php if(isset($_SESSION['message'])): ?>
                         <div id="mes" class="alert <?php echo $_SESSION['alert-class']; ?>">
                            <?php 
                              echo $_SESSION['message'];
                             unset($_SESSION['message']);
                             unset($_SESSION['alert-class']);

                            
                            ?>


                         </div>
                     <?php endif; ?>
                         <h3> Welcome, <?php echo $_SESSION['username'];?></h3>

                         <a href="index.php?logout=1" class="logout">logout</a>
                         
                         <?php if(!$_SESSION['verified']): ?>
                         <div class="alert alert-warning">
                            You need to verify your account.
                            Sign in to your email account and click on the
                            verification link we just emailed you at
                            <strong><?php echo $_SESSION['email'];?></strong>
                         </div>
                         <?php endif; ?>

                         <?php if($_SESSION['verified']): ?>
                          <button class="signup-btn">I am verified!</button>
                         <?php endif; ?>
                     </div>
             </div>
         </div>
  </body>
</html>