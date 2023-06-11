<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=EB+Garamond:ital@1&family=Open+Sans&family=Poppins:wght@500&family=Work+Sans&display=swap" rel="stylesheet">

  <style>

  </style>
</head>

<body>
  <header class="main-header">
    <nav class="navbar navbar-static-top" style="background-color: #00b712; padding:15px;">
      <div class="container">
        <div class="navbar-header">
          
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
          <li><a href="index.php" class="navbar-brand"><img src="images/logo.png" width="40px"></a></li>
            <li><a href="index.php">HOME</a></li>
            <li><a href="about.html">ABOUT US</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">CATEGORY <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <?php

                $conn = $pdo->open();
                try {
                  $stmt = $conn->prepare("SELECT * FROM category");
                  $stmt->execute();
                  foreach ($stmt as $row) {
                    echo "
                      <li><a href='category.php?category=" . $row['cat_slug'] . "'>" . $row['name'] . "</a></li>
                    ";
                  }
                } catch (PDOException $e) {
                  echo "There is some problem in connection: " . $e->getMessage();
                }

                $pdo->close();

                ?>
              </ul>
            </li>
          </ul>
          <form method="POST" class="navbar-form navbar-left" action="search.php">
            <div class="input-group">
              <input type="text" class="form-control" id="navbar-search-input" name="keyword" placeholder="Search for Product" required>
              <span class="input-group-btn" id="searchBtn" style="display:none;">
                <button type="submit" class="btn btn-default btn-flat"><i class="fa fa-search"></i> </button>
              </span>
            </div>
          </form>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown messages-menu">
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-shopping-cart"></i>
                <span class="label label-success cart_count"></span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have <span class="cart_count"></span> item(s) in cart</li>
                <li>
                  <ul class="menu" id="cart_menu">
                  </ul>
                </li>
                <li class="footer"><a href="cart_view.php">Go to Cart</a></li>
              </ul>
            </li>
            <?php
            if (isset($_SESSION['user'])) {
              $image = (!empty($user['photo'])) ? 'images/' . $user['photo'] : 'images/profile.jpg';
              echo '
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="' . $image . '" class="user-image" alt="User Image">
                    <span class="hidden-xs">' . $user['firstname'] . ' ' . $user['lastname'] . '</span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                      <img src="' . $image . '" class="img-circle" alt="User Image">

                      <p>
                        ' . $user['firstname'] . ' ' . $user['lastname'] . '
                        <small>Member since ' . date('M. Y', strtotime($user['created_on'])) . '</small>
                      </p>
                    </li>
                    <li class="user-footer">
                      <div class="pull-left">
                        <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                      </div>
                      <div class="pull-right">
                        <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                      </div>
                    </li>
                  </ul>
                </li>
              ';
            } else {
              echo "
                <li><a href='login.php'>LOGIN</a></li>
                <li><a href='signup.php'>SIGNUP</a></li>
              ";
            }
            ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>
</body>

</html>