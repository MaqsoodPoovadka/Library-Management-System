<?php
	include "admin/config.php";
	include 'session.php';
?>



<!DOCTYPE html>
<html lang="en">

<?php include 'head.html' ?>

<body>
	<!-- header -->
	<?php include 'header.php' ?>
	<!-- //header -->
	<!-- navigation -->
	<!-- //navigation -->

	<!-- banner-2 -->
	<!--div class="page-head_agile_info_w3l">

	</div-->
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
					<li>Books</li>
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
				<span>B</span>ooks
			</h3>
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-9">
					<div class="wrapper">
						<!-- first section -->
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<h6 class="heading-tittle font-italic"></h6>
							<div class="row">

								<?php
									//define total number of results you want per page  
    								$results_per_page = 9;  
  
    								//find the total number of results stored in the database  
    								$query = "SELECT * FROM books";  
    								$result = mysqli_query($connect, $query);  
    								$number_of_result = mysqli_num_rows($result);  
  
    								//determine the total number of pages available  
    								$number_of_page = ceil ($number_of_result / $results_per_page);

									    //determine which page number visitor is currently on  
    								if (!isset ($_GET['page']) ) {  
    							    	$page = 1;  
    								} else {  
        								$page = $_GET['page'];  
    								}  
  
    								//determine the sql LIMIT starting number for the results on the displaying page  
    								$page_first_result = ($page-1) * $results_per_page;  

									    //retrieve the selected results from database   
    								$query = "SELECT * FROM books LIMIT " . $page_first_result . ',' . $results_per_page;  
    								$result = mysqli_query($connect, $query);  

									//$crun = mysqli_query($connect, "SELECT * FROM `books`");
									while ($rows = mysqli_fetch_array($result)) { 
                    			?>

								<div class="col-md-4 product-men mt-5">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
											<img src="images/book.png" width="150px" alt="">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="single.html" class="link-product-add-cart">Quick View</a>
												</div>
											</div>
										</div>
										<div class="item-info-product text-center border-top mt-4">
											<div class="info-product-price pt-1">
											<a href="single.html"><span class="item_price"><?php echo $rows['title'];?></span></a>
											</div>
											<h6 class="my-2">
												<?php echo $rows['title'];?>
											</h6>
											
											<div
												class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
												<form action="#" method="post">
													<fieldset>
														<input type="hidden" name="cmd" value="_cart" />
														<input type="hidden" name="add" value="1" />
														<input type="hidden" name="business" value=" " />
														<input type="hidden" name="item_name" value="PSC English Topper" />
														<input type="hidden" name="amount" value="SAJIKUMAR PATTAZHI" />
														<input type="hidden" name="discount_amount" value="1.00" />
														<input type="hidden" name="currency_code" value="USD" />
														<input type="hidden" name="return" value=" " />
														<input type="hidden" name="cancel_return" value=" " />
														<input type="submit" name="submit" value="Add to cart"
															class="button btn" />
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
                            <?php
									//display the link of the pages in URL
									echo '
									<nav aria-label="Page navigation example" class="d-flex justify-content-center mt-5">
										<ul class="pagination">';
											if($page!=1){
												echo '<li class="page-item"><a class="page-link" href="?page=' . $page-1 . '">Previous</a></li>';
											} else {
												echo '<li class="page-item disabled"><a class="page-link">Previous</a></li>'; 
											} 
    										for($page = 1; $page<= $number_of_page; $page++) {  
    							    			//echo '<a href = "books.php?page=' . $page . '">' . $page . ' </a>'; 
												echo '
												<li class="page-item"><a class="page-link" href="?page=' . $page . '">'. $page .'</a></li>
												'; 
    										};
											if($_GET['page']!=$page-1){
												echo '<li class="page-item"><a class="page-link" href="?page=' . $_GET['page']+1 . '">Next</a></li>';
											} else {
												echo '<li class="page-item disabled"><a class="page-link">Next</a></li>'; 
											} 
											echo
										'</ul>
									</nav>';
							?>
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
	<div class="join-w3l1 py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<div class="row">
				<div class="col-lg-6">
					<div class="join-agile text-left p-4">
						<div class="row">
							<div class="col-sm-7 offer-name">
								<h6>Smooth, Rich & Loud Audio</h6>
								<h4 class="mt-2 mb-3">Branded Headphones</h4>
								<p>Sale up to 25% off all in store</p>
							</div>
							<div class="col-sm-5 offerimg-w3l">
								<img src="images/off1.png" alt="" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 mt-lg-0 mt-5">
					<div class="join-agile text-left p-4">
						<div class="row ">
							<div class="col-sm-7 offer-name">
								<h6>A Bigger Phone</h6>
								<h4 class="mt-2 mb-3">Smart Phones 5</h4>
								<p>Free shipping order over $100</p>
							</div>
							<div class="col-sm-5 offerimg-w3l">
								<img src="images/off2.png" alt="" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
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
	<!-- //cart-js -->

	

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


<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myDIV *").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
	<!-- //end-smooth-scrolling -->

	<!-- smooth-scrolling-of-move-up -->
	<!-- //smooth-scrolling-of-move-up -->

	<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
	<!-- //for bootstrap working -->
	<!-- //js-files -->

</body>

</html>