<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Agri</title>
	<!-- Start of Async Drift Code -->
	<script>
		"use strict";

		! function() {
			var t = window.driftt = window.drift = window.driftt || [];
			if (!t.init) {
				if (t.invoked) return void(window.console && console.error && console.error("Drift snippet included twice."));
				t.invoked = !0, t.methods = ["identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on"],
					t.factory = function(e) {
						return function() {
							var n = Array.prototype.slice.call(arguments);
							return n.unshift(e), t.push(n), t;
						};
					}, t.methods.forEach(function(e) {
						t[e] = t.factory(e);
					}), t.load = function(t) {
						var e = 3e5,
							n = Math.ceil(new Date() / e) * e,
							o = document.createElement("script");
						o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
						var i = document.getElementsByTagName("script")[0];
						i.parentNode.insertBefore(o, i);
					};
			}
		}();
		drift.SNIPPET_VERSION = '0.3.1';
		drift.load('5pkx2itf8kgf');
	</script>
	<!-- End of Async Drift Code -->
	<style>
		.plan_package {
			display: flex;
			justify-content: center;
			align-items: center;
			
		}
	</style>
</head>

<body>


	<?php include 'includes/session.php'; ?>
	<?php include 'includes/header.php'; ?>


	<body class="hold-transition skin-blue layout-top-nav">
		<div class="wrapper">

			<?php include 'includes/navbar.php'; ?>


			<div class="content-wrapper">
				<div class="container">

					<!-- Main content -->
					<section class="content">
						<div>
							<div>
								<?php
								if (isset($_SESSION['error'])) {
									echo "
	        					<div class='alert alert-danger'>
	        						" . $_SESSION['error'] . "
	        					</div>
	        				";
									unset($_SESSION['error']);
								}
								?>
								<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
									<ol class="carousel-indicators">
										<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
										<li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
										<li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
									</ol>
									<div class="carousel-inner">
										<div class="item active">
											<img src="images/banner_1.jpg" alt="First slide">
										</div>
										<div class="item">
											<img src="images/banner_2.jpg" alt="Second slide">
										</div>
										<div class="item">
											<img src="images/banner_3.jpg" alt="Third slide">
										</div>
									</div>
									<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
										<span class="fa fa-angle-left"></span>
									</a>
									<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
										<span class="fa fa-angle-right"></span>
									</a>
								</div>
								<div class="plan_package"><?php include 'plan.php'; ?></div>
								<h2>All Product</h2>
								<?php
								$month = date('m');
								$conn = $pdo->open();

								try {
									$inc = 3;
									$stmt = $conn->prepare("SELECT * FROM products");
									// $stmt = $conn->prepare("SELECT *, SUM(quantity) AS total_qty FROM details LEFT JOIN sales ON sales.id=details.sales_id LEFT JOIN products ON products.id=details.product_id WHERE MONTH(sales_date) = '$month' GROUP BY details.product_id ORDER BY total_qty DESC LIMIT 6");
									$stmt->execute();
									foreach ($stmt as $row) {
										$image = (!empty($row['photo'])) ? 'images/' . $row['photo'] : 'images/noimage.jpg';
										$inc = ($inc == 3) ? 1 : $inc + 1;
										if ($inc == 1) echo "<div class='row'>";
										echo "
	       							<div class='col-sm-4'>
	       								<div class='box box-solid'>
		       								<div class='box-body prod-body'>
		       									<img src='" . $image . "' width='100%' height='230px' class='thumbnail'>
		       									<h5><a href='product.php?product=" . $row['slug'] . "'>" . $row['name'] . "</a></h5>
		       								</div>
		       								<div class='box-footer'>
		       									<b>&#2547; " . number_format($row['price'], 2) . "</b>
		       								</div>
	       								</div>
	       							</div>
	       						";
										if ($inc == 3) echo "</div>";
									}
									if ($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>";
									if ($inc == 2) echo "<div class='col-sm-4'></div></div>";
								} catch (PDOException $e) {
									echo "There is some problem in connection: " . $e->getMessage();
								}

								$pdo->close();

								?>
							</div>
						</div>
					</section>


				</div>
			</div>

			<?php include 'includes/footer.php'; ?>
		</div>

		<?php include 'includes/scripts.php'; ?>
	</body>


</body>

</html>