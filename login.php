<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: cart_view.php');
  }
?>
<?php include 'includes/header.php'; ?>
<head>
<head>
  <title>Sign in</title>
  <style>
    .register{
      padding-top: 8%;
      padding-bottom: 20%;
      padding-left: 35%;
      padding-right: 35%;
  
      
      background-image: url('images/pic2.jpg');
  background-size: cover;
    }
    .login-box-body{
      background-color:#f0c893;
      border-radius: 20px;
    }
    #text{
      color: white;
      font-size: 15px;
    }
  </style>
</head>
</head>
<body class="hold-transition login-page">
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
  	<div class="login-box-body">
    	<h3 class="login-box-msg"><b>Sign in</b></h3>

    	<form action="verify.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="email" class="form-control" name="email" placeholder="Email" required>
        		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Sign In</button>
        		</div>
      		</div>
    	</form>
      <br>
      <a href="password_forgot.php" id="text">Forgot Password</a><br>
      <a href="signup.php" class="text-center" id="text">Register a New Membership</a><br>
      <a href="index.php"><i class="fa fa-home" id="text"> Home</i></a>
  	</div>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>