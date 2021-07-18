<?php
	include "admin/config.php";
	include 'session.php';
?>

<?php
                                    if (isset($_GET['cat'])) {
                                        $cat  = $_GET["cat"];
										$cat = str_replace('_', ' ', $cat);
										
                                        $sql = mysqli_query($connect, "SELECT * FROM `books` WHERE category = '$cat'");
                                        $row = mysqli_fetch_assoc($sql);
                                        
                                    }
                                ?>

<!DOCTYPE html>
<html lang="en">

<?php 
	$h_title = $row['category'];
	include 'head.html'; 
?>

<body>
	<!-- header -->
	<?php include 'header.php' ?>
	<!-- //header -->
	<!-- navigation -->
	<!-- //navigation -->

	<!-- banner-2 -->
	<div class="page-head_agile_info_w3l">

	</div>
	<!-- //banner-2 -->
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.html">Home</a>
						<i>|</i>
					</li>
					<li>Category
						<i>-</i>
					</li>
					<li><?php echo $row['category'];?></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->

	<!-- top Products -->
	<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span><?php echo $row['category'];?></span></h3>
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-9">
					<div class="wrapper">
						<!-- first section -->
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<div class="row">

								<?php
									$crun = mysqli_query($connect, "SELECT * FROM `books` WHERE category = '$cat'");
									while ($rows = mysqli_fetch_assoc($crun)) { 
                  
                    			?>

								<div class="col-md-4 product-men mt-5">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
											<?php
                                        		if ($rows['book_img']>1) {
                                            		echo '<img src="admin/uploads/'. $rows['book_img'].  '" width="150px" alt="no-image">';
                                        		} else {
                                            		echo '<img src="admin/images/no-image.jpg" width="150px" alt="no-image">';
                                        		}
                                    		?>
											<!--<img src="admin/uploads/<php echo $rows['book_img'];?>" width="150px" alt="">-->
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="book.php?id=<?php echo $rows['book_id'];?>" class="link-product-add-cart">Quick View</a>
												</div>
											</div>
										</div>
										<div class="item-info-product text-center border-top mt-4">
											<div class="info-product-price pt-1">
												<a href="book.php?id=<?php echo $rows['book_id'];?>"><span class="item_price"><?php echo $rows['title'];?></span></a>
											</div>
											<h6 class="my-2">
												<?php echo $rows['author'];?>
											</h6>
											
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
												<form>
													<fieldset>
														<a href="book.php?id=<?php echo $rows['book_id'];?>">
															<input value="View Book" class="button btn" />
														</a>
													</fieldset>
												</form>
											</div>
											
										</div>
									</div>
								</div>
								<?php
									}
								?>
							</div>
						</div>
					</div>
				</div>
				<!-- //product left -->

				<!-- right side -->
				<?php include 'right.php' ?>
				<!-- //product right -->
			</div>
		</div>
	</div>
	<!-- //top products -->

	<!-- middle section -->
	<!-- middle section -->

	<!-- footer -->
	<?php include 'footer.html' ?>
	<!-- //footer -->
	<!-- copyright -->
	<!-- //copyright -->

	<!-- js-files -->
	<!-- jquery -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- //jquery -->

	<!-- nav smooth scroll -->
	<script>
		$(document).ready(function () {
			$(".dropdown").hover(
				function () {
					$('.dropdown-menu', this).stop(true, true).slideDown("fast");
					$(this).toggleClass('open');
				},
				function () {
					$('.dropdown-menu', this).stop(true, true).slideUp("fast");
					$(this).toggleClass('open');
				}
			);
		});
	</script>
	<!-- //nav smooth scroll -->

	<!-- popup modal (for location)-->
	<script src="js/jquery.magnific-popup.js"></script>
	<script>
		$(document).ready(function () {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>
	<!-- //popup modal (for location)-->

	<!-- cart-js -->
	<script src="js/minicart.js"></script>
	<script>
		paypals.minicarts.render(); //use only unique class names other than paypals.minicarts.Also Replace same class name in css and minicart.min.js

		paypals.minicarts.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 3) {
				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});
	</script>
	<!-- //cart-js -->

	<!-- password-script -->
	<script>
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>
	<!-- //password-script -->

	<!-- smoothscroll -->
	<script src="js/SmoothScroll.min.js"></script>
	<!-- //smoothscroll -->

	<!-- start-smooth-scrolling -->
	<script src="js/move-top.js"></script>
	<script src="js/easing.js"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->

	<!-- smooth-scrolling-of-move-up -->
	<script>
		$(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->

	<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
	<!-- //for bootstrap working -->
	<!-- //js-files -->

</body>

</html>