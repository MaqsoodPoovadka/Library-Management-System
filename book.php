<?php
	include "admin/config.php";
	include 'session.php';
?>
<?php
        if (isset($_GET['id'])) {
        $book_id  = $_GET["id"];
        $sql = mysqli_query($connect, "SELECT * FROM `books` WHERE book_id = '$book_id'");
 	   	$row = mysqli_fetch_assoc($sql);                                        
	}
?>
<?php
                                                        $qavil = mysqli_query($connect, "SELECT avail FROM copies WHERE book_id='$book_id' AND avail='Available'");
									                    $avail = mysqli_num_rows($qavil); 
                                                        //echo $avail;
                                                        if ($avail==0) {
                                                            $availno = 'Out of Stock';
                                                        } else {
                                                            $availno = 'Available';
                                                        }
                                                    ?>


<!DOCTYPE html>


<html lang="en">

<?php 
	$h_title = $row['title'];
	include 'head.html';
?>

<body>
	<!-- header -->
	<?php include 'header.php' ?>
	<!-- //header -->
	<!-- navigation -->
	<!-- //navigation -->

	<!-- banner-2 -->
	<div class="page-head_agile_info_w3l"></div>
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
					<li>
						Book
						<i>-</i>
						<li><?php echo $row['book_id'];?></li>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->

	<!-- Single Page -->
	<div class="banner-bootom-w3-agileits py-5">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>B</span>ook</h3>
			<!-- //tittle heading -->
			<div class="row">
				<div class="col-lg-3 col-md-8 single-right-left ">
					<div class="grid images_3_of_2">
						<div class="flexslider">
							<ul class="slides">
								<li data-thumb="admin/uploads/<?php echo $row['book_img'];?>">
									<div class="thumb-image">
											<?php
                                        		if ($row['book_img']>1) {
                                            		echo '<img src="admin/uploads/'. $row['book_img']. '" data-imagezoom="true" class="img-fluid" alt="">';
                                        		} else {
                                            		echo '<img src="admin/images/no-image.jpg" data-imagezoom="true" class="img-fluid" alt="">';
                                        		}
                                    		?>
										<!--<img src="admin/uploads/<?php echo $row['book_img'];?>" data-imagezoom="true" class="img-fluid" alt=""> </div>-->
								</li>
											
								<!--<li data-thumb="images/si2.jpg">
									<div class="thumb-image">
										<img src="images/si2.jpg" data-imagezoom="true" class="img-fluid" alt=""> </div>
								</li>
								<li data-thumb="images/si3.jpg">
									<div class="thumb-image">
										<img src="images/si3.jpg" data-imagezoom="true" class="img-fluid" alt=""> </div>
								</li>-->
							</ul>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="col-lg-9 single-right-left simpleCart_shelfItem">
					<h2 class="mb-3"><?php echo $row['title'];?></h2>
					<p class="mb-3">
						<label>By </label>	
						<span class="item_price"><?php echo $row['author'];?></span>
						<mark class="mx-2 font-weight-light"><?php echo $availno;?></mark>
						
					</p>
					<div class="product-single-w3l">
						<ul>
							<li class="mb-3">
								<b>Book ID</b> : <?php echo $row['book_id'];?>
							</li>
							<li class="mb-3">
								<b>Category</b> : <?php echo $row['category'];?>
							</li>
							<li class="mb-3">
								<b>ISBN</b> : <?php echo $row['isbn'];?>
							</li>
							<li class="mb-3">
								<b>Publisher</b> : <?php echo $row['publisher'];?>
							</li>
							<li class="mb-3">
								<b>Edition</b> : <?php echo $row['edition'];?>
							</li>
							<li class="mb-3">
								<b>Language</b> : <?php echo $row['lang'];?>
							</li>
							<li class="mb-3">
								<b>No. of pages</b> : <?php echo $row['pages'];?>
							</li>
						</ul>
					</div>
					<div class="single-infoagile">
					<b class="my-sm-4 my-3">Summary :</b>
					<p class="mb-1"><?php echo $row['description'];?></p>
					</div>
					<div class="occasion-cart">
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
							<form action="#" method="post">
								<fieldset>
									<input type="hidden" name="mbrid" value="<?php echo $mbr['member_id'];?>" />
									<input type="hidden" name="name" value="<?php echo $mbr['name'];?>" />
									<input type="hidden" name="book_id" value="<?php echo $row['book_id'];?>" />
									<input type="hidden" name="title" value="<?php echo $row['title'];?>" />
									<input type="hidden" name="isbn" value="<?php echo $row['isbn'];?>" />
									<input type="hidden" name="res_date" value="<?php echo date('Y-m-d');?>" />
									<input type="hidden" name="status" value="Reserved" />
									<input type="hidden" name="waiting_list" value="" />
									
									<input type="hidden" name="return" value=" " />
									<input type="hidden" name="cancel_return" value=" " />
									
									<!--<input type="submit" name="reserve" value="Reserve" class="button" />-->
									<?php
                    					if ($_SESSION==NULL) {
                       						
                    					} else {
                        					echo '<input type="submit" name="reserve" value="Reserve" class="button" />';
                    					}
                    
                    				?>
									
								</fieldset>
							</form>
							<?php
							
                                
                                    if (isset($_POST['reserve'])) {
                                        $memberid = $_POST['mbrid'];
										$name     = $_POST['name'];
                                        $book_id  = $_POST['book_id'];
                                        $title    = $_POST['title'];
										$res_date = $_POST['res_date'];


                                        $reserve = "INSERT INTO `reservation`(`member_id`,`name`,`book_id`,`title`,`res_date`,`status`) VALUES ('$memberid','$name','$book_id','$title','$res_date','Requested')";
                                        $sql = mysqli_query($connect, $reserve);
                                        echo '<script>alert("Requested for Reservation")</script>';
										echo '<meta http-equiv="refresh" content="0; url=book.php?id=' . $row['book_id'] . '">';
                                    }
                                    
                            ?>


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //Single Page -->

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

	<!-- imagezoom -->
	<script src="js/imagezoom.js"></script>
	<!-- //imagezoom -->

	<!-- flexslider -->
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

	<script src="js/jquery.flexslider.js"></script>
	<script>
		// Can also be used with $(document).ready()
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			});
		});
	</script>
	<!-- //FlexSlider-->

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