<?php
	include "admin/config.php";
	include "session.php";
?>
<?php
                        if ($_SESSION==NULL) {
                            echo '<meta http-equiv="refresh" content="0; url=login.php">';
                        }
?>




<!DOCTYPE html>
<html lang="en">

<?php 
	$h_title ='Profile';
	include 'head.html'; 
?>


<body>
	<!-- header -->
	<?php include 'header.php'; ?>
	<!-- //header -->
	<!-- navigation -->
	<!-- //navigation -->

	<!-- banner-2 -->
	<div class="page-head_agile_info_w3l page-head_agile_info_w3l-2">

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
					<li>Profile</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->

	<!-- top Products -->
	<div class="ads-grid  py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>P</span>rofile
			</h3>
			<!-- //tittle heading -->
			<div class="row">

				<!-- product right -->
				<div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
					<div class="side-bar p-sm-4 p-3">
						<div class="search-hotel border-bottom py-2">

							<div class="d-flex justify-content-center my-3">
									<?php
                                        if ($mbr['photo']>1) {
                                            echo '<img src="admin/uploads/'. $mbr['photo'].  '" class="rounded-circle" width="75%" alt="no-image">';
                                        } else {
                                            echo '<img src="admin/images/0.png" class="rounded-circle" width="75%" alt="no-image">';
                                        }
                                    ?>
								<br>
								<!--<img src="admin/images/1.png" class="img-circle" alt="Cinque Terre" width="75%">-->
							</div>
							<h3 class="agileits-sear-head d-flex justify-content-center mb-2">
								<?php echo $mbr['name'];?>
							</h3>
							<div class="left-side py-2">
								<ul>
									<li>
										<span class="span">Name :</span>
										<span class="span float-right">
											<?php echo $mbr['name'];?>
										</span>
									</li>
									<!-- Student -->
									<?php if ($mbr['member_type']=="Student") { ?>
									<li>
										<span class="span">Reg No :</span>
										<span class="span float-right">
											<?php echo $mbr['member_id'];?>
										</span>
									</li>
									<li>
										<span class="span">Program :</span>
										<span class="span float-right">
											<?php echo $mbr['program'] .' - ' . $mbr['dept'];?>
										</span>
									</li>
									<?php } ?>
									
									<!-- Teacher -->
									<?php if ($mbr['member_type']=="Teacher") { ?>
									<li>
										<span class="span">Staff ID :</span>
										<span class="span float-right">
											<?php echo $mbr['member_id'];?>
										</span>
									</li>
									<li>
										<span class="span">Department :</span>
										<span class="span float-right">
											<?php echo $mbr['dept'];?>
										</span>
									</li>
									<?php } ?>


									<li>
										<span class="span">Mobile No :</span>
										<span class="span float-right">
											<?php echo $mbr['mobno'];?>
										</span>
									</li>
									<li>
										<span class="span">Email :</span>
										<span class="span float-right">
											<?php echo $mbr['email'];?>
										</span>
									</li>
								</ul>
							</div>
						</div>


						<!-- arrivals -->
						<!--div class="left-side border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">New Arrivals</h3>
							<ul>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">Last 30 days</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">Last 90 days</span>
								</li>
							</ul>
						</div-->
						<!-- //arrivals -->
					</div>
				</div>
				<!-- //product right -->

				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-9">
					<div class="checkout-right">
						<!--Horizontal Tab-->
						<div id="parentHorizontalTab">
							<ul class="resp-tabs-list hor_1">
								<li>Circulation</li>
								<li>Reservation</li>
								<li>Due Amount</li>
								<li>Password</li>
							</ul>
							<div class="resp-tabs-container hor_1">

								<div>
									<div class="vertical_post">
										<div class="table-responsive">
											<table class="timetable_sub" id="dtCirculation">
												<thead>
													<tr>
														<th>ID</th>
														<th>Book ID</th>
														<th>Title</th>

														<th>Issue Date</th>
														<th>Return Date</th>
														<th>Recieved Date</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
													<?php   // LOOP TILL END OF DATA  
                                						$sql1 = "SELECT * FROM circulation WHERE `member_id`='$userid' ORDER BY id DESC";
														$result1 = $connect->query($sql1);						
								
														while($rows=$result1->fetch_assoc()) 
                                						{ 
                            						?>
													<tr class="rem">
														<td class="invert">
															<?php echo $rows['id'];?>
														</td>

														<td>
															<?php echo $rows['acc_id'];?>
														</td>
														<td class="invert">
															<?php echo $rows['title'];?>
														</td>
														<td class="invert">
															<?php echo $rows['i_date'];?>
														</td>
														<td class="invert">
															<?php echo $rows['r_date'];?>
														</td>
														<td class="invert">
															<?php echo $rows['rd_date'];?>
														</td>
														<td class="invert">
															<?php echo $rows['status'];?>
														</td>
													</tr>

													<?php } ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								
								<div>
									<div class="vertical_post">
										<div class="table-responsive">
											<table class="timetable_sub" id="dtReservation">
												<thead>
													<tr>
														<th>ID</th>
														<th>Book ID</th>
														<th>Title</th>

														<th>Request Date</th>
														<th>Issue Date</th>
														
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
													<?php   // LOOP TILL END OF DATA  
                                						$sql2 = "SELECT * FROM reservation WHERE `member_id`='$userid' ORDER BY r_id DESC";
														$result2 = $connect->query($sql2);						
								
														while($rows=$result2->fetch_assoc()) 
                                						{ 
                            						?>
													<tr class="rem">
														<td class="invert">
															<?php echo $rows['r_id'];?>
														</td>

														<td>
															<?php echo $rows['book_id'];?>
														</td>
														<td class="invert">
															<?php echo $rows['title'];?>
														</td>
														<td class="invert">
															<?php echo $rows['res_date'];?>
														</td>
														<td class="invert">
															<?php echo $rows['isd_date'];?>
														</td>
														
														<td class="invert">
															<?php echo $rows['status'];?>
														</td>
													</tr>

													<?php } ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div>
									<div class="vertical_post">
										<div class="table-responsive">
											<table class="timetable_sub" id="dtDueAmount">
												<thead>
													<tr>
														<th>ID</th>
														<th>Cir ID</th>
														<th>Due Date</th>
														<th>Recieved Date</th>
														<th>No of Days</th>
														<th>Due Amount</th>
														<th>Remark</th>
													</tr>
												</thead>
												<tbody>
													<?php   // LOOP TILL END OF DATA  
                                						$sql1 = "SELECT * FROM dues WHERE `member_id`='$userid' ORDER BY id DESC";
														$result1 = $connect->query($sql1);						
								
														while($rows=$result1->fetch_assoc()) 
                                						{ 
                            						?>
													<tr class="rem">
														<td class="invert">
															<?php echo $rows['id'];?>
														</td>

														<td>
															<?php echo $rows['c_id'];?>
														</td>
														<td class="invert">
															<?php echo $rows['due_date'];?>
														</td>
														<td class="invert">
															<?php echo $rows['rec_date'];?>
														</td>
														<td class="invert">
															<?php echo $rows['due_days'];?>
														</td>
														<td class="invert">
															<?php echo $rows['due_amount'];?>
														</td>
														<td class="invert">
															<?php echo $rows['remark'];?>
														</td>
													</tr>

													<?php } ?>
													
												</tbody>
												
												<tfoot>
													<tr>
														<th></th>
														<th></th>
														<th></th>
														<th></th>
														<th></th>
														<th></th>
														<th></th>
													</tr>
													<tr>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td>TotalDue</td>
														<td>
														<?php
															$dasql = mysqli_query($connect,"SELECT SUM(due_amount) FROM dues WHERE member_id='$userid'");
															$drow = mysqli_fetch_row($dasql);
															$sum = $drow[0];
														?>
															<?php echo $sum;?>
														</td>
														<td></td>
													</tr>
													<tr>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td>Paid</td>
														<td>
														<?php
															$dasql = mysqli_query($connect,"SELECT SUM(due_amount) FROM dues WHERE member_id='$userid' AND remark='PAID'");
															$drow = mysqli_fetch_row($dasql);
															$sum = $drow[0];
														?>
															<?php echo $sum;?>
														</td>
														<td></td>
													</tr>
													<tr>
													<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td>Pending</td>
														<td>
														<?php
															$dasql = mysqli_query($connect,"SELECT SUM(due_amount) FROM dues WHERE member_id='$userid' AND remark=''");
															$drow = mysqli_fetch_row($dasql);
															$sum = $drow[0];
														?>
															<?php echo $sum;?>
														</td>
														<td></td>
													</tr>
													<tr>
														<th></th>
														<th></th>
														<th></th>
														<th></th>
														<th></th>
														<th></th>
														<th></th>
													</tr>
												</tfoot>
											</table>
										</div>
									</div>
								</div>
								
								<div class="number-paymk">
									<form method="post" class="creditly-card-form agileinfo_form">
										<div class="creditly-wrapper wthree, w3_agileits_wrapper">
											<div class="credit-card-wrapper">
												<div class="first-row form-group">
													
													<div class="w3_agileits_card_number_grids my-3">
														<div class="w3_agileits_card_number_grid_left">
															<div class="controls">
																<label class="control-label">Current Password</label>
																<input class="billing-address-name form-control" type="password" name="c_pswrd" placeholder="">
															</div>
														</div>
														<div class="w3_agileits_card_number_grid_right mt-2">
															<div class="controls">
																<label class="control-label">New Password</label>
																<input class="billing-address-name form-control" type="password" name="n_pswrd" placeholder="">
															</div>
														</div>
														<div class="w3_agileits_card_number_grid_right mt-2">
															<div class="controls">
																<label class="control-label">Confirm New Password</label>
																<input class="billing-address-name form-control" type="password" name="cn_pswrd" placeholder="">
															</div>
														</div>
														<div class="clear"> </div>
													</div>
												</div>
												<input type="submit" name="change" class="submit" value="Change Password">
											</div>
										</div>
									</form>
									<?php
	                                    if (isset($_POST['change'])) {
    	                                    $old_pswrd = $_POST['c_pswrd'];
											$cnt_pswrd =   $mbr['password'];
        	                                $new_pswrd = $_POST['n_pswrd'];
            	                            $cnf_pswrd = $_POST['cn_pswrd'];
											
											if ($old_pswrd==$cnt_pswrd & $new_pswrd==$cnf_pswrd) {
                                    	    	$change = "UPDATE `members` SET `password`='$new_pswrd' WHERE `member_id`='$userid'";
                                        		$sql = mysqli_query($connect, $change);
                                        		echo '<br>
												<div class="alert alert-success">
													<i class="fa fa-success-circle"></i> <strong>Success!</strong> Password has been changed.
												</div>';
											} else {
												echo '<br>
												<div class="alert alert-danger">
													<i class="fa fa-exclamation-circle"></i> The entered <strong>Crediantial</strong> is incorrect.
												</div>';

											}
                                    	}
                                	?>
								</div>
							</div>
						</div>
						
						<!--Plug-in Initialisation-->
					</div>

				</div>
				<!-- //product left -->

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





	<!-- easy-responsive-tabs -->
	<link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css " />
	<script src="js/easyResponsiveTabs.js"></script>

	<script>
		$(document).ready(function () {
			//Horizontal Tab
			$('#parentHorizontalTab').easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion
				width: 'auto', //auto or any width like 600px
				fit: true, // 100% fit in a container
				tabidentify: 'hor_1', // The tab groups identifier
				activate: function (event) { // Callback function if tab is switched
					var $tab = $(this);
					var $info = $('#nested-tabInfo');
					var $name = $('span', $info);
					$name.text($tab.text());
					$info.show();
				}
			});
		});
	</script>
	<!-- //easy-responsive-tabs -->
	
	<!--DataTables-->
 	<script type="text/javascript" src="plugins/DataTables/datatables.min.js"></script>
	 <script>
		$(document).ready(function () {
			$('#dtCirculation').DataTable({
				"order": [[ 6, "asc" ], [ 0, "desc" ]],
    			responsive: true
			});
			$('#dtReservation').DataTable({
				"order": [[ 0, "desc" ]]
			});
			$('#dtDueAmount').DataTable({
				//responsive: true
			});
		});
	</script>

</body>

</html>