<?php include 'includes/session.php'; ?>

<?php include 'includes/header.php'; ?>
<head>
  
  <style>
    
    .register{
      padding-top: 5%;
      padding-bottom: 15%;
      padding-left: 35%;
      padding-right: 35%;
      
      
  background-image: url('images/pic1.jpg');
  background-size: cover;
  
    }
    .register-box-body{
      background-image: linear-gradient(to right, rgba(241, 196, 15), rgba(212, 172, 13 ));
      border-radius: 20px;
    }
    #text{
      color: white;
      font-size: 15px;
    }
  </style>
</head>
<body class="hold-transition register-page">
<div class="register">
  	<?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }

      if(isset($_SESSION['success'])){
        echo "
          <div class='callout callout-success text-center'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>
  	<div class="register-box-body">
    	<h3 class="login-box-msg"><b>Sign Up</b></h3>

    	<form action="register.php" method="POST">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="firstname" placeholder="Enter Your Firstname" value="<?php echo (isset($_SESSION['firstname'])) ? $_SESSION['firstname'] : '' ?>" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="lastname" placeholder="Enter Your  Lastname" value="<?php echo (isset($_SESSION['lastname'])) ? $_SESSION['lastname'] : '' ?>"  required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
      		<div class="form-group has-feedback">
        		<input type="email" class="form-control" name="email" placeholder="Enter Your  Email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" required>
        		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Enter Your  Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="repassword" placeholder="Enter Your  Confirm Password" required>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          
          
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="signup"><i class="fa fa-pencil"></i> Sign Up</button>
        		</div>
      		</div>
    	</form>
      <br>
      <a href="login.php" id="text">I already have a membership</a><br>
      <a href="index.php"><i class="fa fa-home" id="text"> Home</i> </a>
  	</div>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>
