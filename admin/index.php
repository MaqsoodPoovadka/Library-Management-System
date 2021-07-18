<?php 
	include 'config.php'; 
	include 'session.php';

	$today = date('Y-m-d');
?>

<!DOCTYPE HTML>
<html>

<?php 
include 'header.html'; 
?>

<body>
	<div id="wrapper">
		<!-- Navigation -->
		<?php include 'navigation.php';?>
		<!-- /Navigation -->

		<div id="page-wrapper">
			<div class="graphs">
				<div class="col_3">
					<div class="col-md-3 widget widget1">
						<div class="r3_counter_box">
							<i class="pull-left fa fa-book icon-rounded"></i>
							<div class="stats">
								<?php
									$query = mysqli_query($connect, "SELECT book_id FROM books");
									$total = mysqli_num_rows($query);
								?>
								<h5><strong><?php echo $total;?></strong></h5>
								<span>Books</span>
							</div>
						</div>
					</div>
					<div class="col-md-3 widget widget1">
						<div class="r3_counter_box">
							<i class="pull-left fa fa-users user1 icon-rounded"></i>
							<div class="stats">
								<?php
									$query = mysqli_query($connect, "SELECT id FROM authors");
									$total = mysqli_num_rows($query);
								?>
								<h5><strong><?php echo $total;?></strong></h5>
								<span>Members</span>
							</div>
						</div>
					</div>
					<div class="col-md-3 widget widget1">
						<div class="r3_counter_box">
							<i class="pull-left fa fa-list user2 icon-rounded"></i>
							<div class="stats">
								<?php
									$query = mysqli_query($connect, "SELECT id FROM categories");
									$total = mysqli_num_rows($query);
								?>
								<h5><strong><?php echo $total;?></strong></h5>
								<span>Categories</span>
							</div>
						</div>
					</div>
					<div class="col-md-3 widget">
						<div class="r3_counter_box">
							<i class="pull-left fa fa-exchange dollar1 icon-rounded"></i>
							<div class="stats">
								<?php
									$query = mysqli_query($connect, "SELECT id FROM languages");
									$total = mysqli_num_rows($query);
								?>
								<h5><strong><?php echo $total;?></strong></h5>
								<span>Languages</span>
							</div>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>

				
		
                <div class="col_1">
					<div class="col-md-4 span_8 col_2">
						<div class="">
							<h3>Overall</h3>

							<div class="box_1">
								<div class="col-md-6 col_1_of_2 span_1_of_2">
									<a class="tiles_info">
										<div class="tiles-head blue1">
											<div class="text-center">Circulations</div>
										</div>
											<?php
												//$query = mysqli_query($connect, "SELECT i_date FROM circulation WHERE i_date='$today'");
												$query = mysqli_query($connect, "SELECT id FROM circulation");
												$total = mysqli_num_rows($query);
											?>
										<div class="tiles-body blue1"><?php echo $total;?></div>
									</a>
								</div>
								<div class="col-md-6 col_1_of_2 span_1_of_2">
									<a class="tiles_info tiles_blue">
										<div class="tiles-head fb1">
											<div class="text-center">Issued</div>
										</div>
											<?php
												//$query = mysqli_query($connect, "SELECT rd_date FROM circulation WHERE rd_date='$today'");
												$query = mysqli_query($connect, "SELECT id FROM circulation WHERE status='Issued'");
												$total = mysqli_num_rows($query);
											?>
										<div class="tiles-body fb2"><?php echo $total;?></div>
									</a>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="box_1">
								<div class="col-md-6 col_1_of_2 span_1_of_2">
									<a class="tiles_info">
										<div class="tiles-head tw1">
											<div class="text-center">Returned</div>
										</div>
											<?php
												//$query = mysqli_query($connect, "SELECT r_date FROM circulation WHERE r_date='$today' AND status='Issued'");
												$query = mysqli_query($connect, "SELECT id FROM circulation WHERE status='Returned'");
												$total = mysqli_num_rows($query);
											?>
										<div class="tiles-body tw2"><?php echo $total;?></div>
									</a>
								</div>
								<div class="col-md-6 col_1_of_2 span_1_of_2">
									<a class="tiles_info tiles_blue">
										<div class="tiles-head red1">
											<div class="text-center">Overdue</div>
										</div>
											<?php
												$query = mysqli_query($connect, "SELECT id FROM circulation WHERE status='Issued' AND overdue='Yes'");
												$total = mysqli_num_rows($query);
											?>
										<div class="tiles-body red"><?php echo $total;?></div>
									</a>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="box_1">
								<div class="col-md-6 col_1_of_2 span_1_of_2">
									<a class="tiles_info">
										<div class="tiles-head fb1">
											<div class="text-center">Due - Pending</div>
										</div>
											<?php
												$query = mysqli_query($connect, "SELECT id FROM dues WHERE remark=''");
												$total = mysqli_num_rows($query);
											?>
										<div class="tiles-body fb2"><?php echo $total;?></div>
									</a>
								</div>
								<div class="col-md-6 col_1_of_2 span_1_of_2">
									<a class="tiles_info">
										<div class="tiles-head blue1">
											<div class="text-center">Due - Cleared</div>
										</div>
											<?php
												$query = mysqli_query($connect, "SELECT id FROM dues WHERE remark='Paid'");
												$total = mysqli_num_rows($query);
											?>
										<div class="tiles-body blue1"><?php echo $total;?></div>
									</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>

					</div>


					<div class="col-md-4 span_5">
						<div class="cal1 cal_2">
							<div class="clndr">
								<div class="clndr-controls">
									<div class="clndr-control-button">
										<p class="clndr-previous-button">previous</p>
									</div>
									<div class="month">July 2015</div>
									<div class="clndr-control-button rightalign">
										<p class="clndr-next-button">next</p>
									</div>
								</div>
								<table class="clndr-table" border="0" cellspacing="0" cellpadding="0">
									<thead>
										<tr class="header-days">
											<td class="header-day">S</td>
											<td class="header-day">M</td>
											<td class="header-day">T</td>
											<td class="header-day">W</td>
											<td class="header-day">T</td>
											<td class="header-day">F</td>
											<td class="header-day">S</td>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="day adjacent-month last-month calendar-day-2015-06-28">
												<div class="day-contents">28</div>
											</td>
											<td class="day adjacent-month last-month calendar-day-2015-06-29">
												<div class="day-contents">29</div>
											</td>
											<td class="day adjacent-month last-month calendar-day-2015-06-30">
												<div class="day-contents">30</div>
											</td>
											<td class="day calendar-day-2015-07-01">
												<div class="day-contents">1</div>
											</td>
											<td class="day calendar-day-2015-07-02">
												<div class="day-contents">2</div>
											</td>
											<td class="day calendar-day-2015-07-03">
												<div class="day-contents">3</div>
											</td>
											<td class="day calendar-day-2015-07-04">
												<div class="day-contents">4</div>
											</td>
										</tr>
										<tr>
											<td class="day calendar-day-2015-07-05">
												<div class="day-contents">5</div>
											</td>
											<td class="day calendar-day-2015-07-06">
												<div class="day-contents">6</div>
											</td>
											<td class="day calendar-day-2015-07-07">
												<div class="day-contents">7</div>
											</td>
											<td class="day calendar-day-2015-07-08">
												<div class="day-contents">8</div>
											</td>
											<td class="day calendar-day-2015-07-09">
												<div class="day-contents">9</div>
											</td>
											<td class="day calendar-day-2015-07-10">
												<div class="day-contents">10</div>
											</td>
											<td class="day calendar-day-2015-07-11">
												<div class="day-contents">11</div>
											</td>
										</tr>
										<tr>
											<td class="day calendar-day-2015-07-12">
												<div class="day-contents">12</div>
											</td>
											<td class="day calendar-day-2015-07-13">
												<div class="day-contents">13</div>
											</td>
											<td class="day calendar-day-2015-07-14">
												<div class="day-contents">14</div>
											</td>
											<td class="day calendar-day-2015-07-15">
												<div class="day-contents">15</div>
											</td>
											<td class="day calendar-day-2015-07-16">
												<div class="day-contents">16</div>
											</td>
											<td class="day calendar-day-2015-07-17">
												<div class="day-contents">17</div>
											</td>
											<td class="day calendar-day-2015-07-18">
												<div class="day-contents">18</div>
											</td>
										</tr>
										<tr>
											<td class="day calendar-day-2015-07-19">
												<div class="day-contents">19</div>
											</td>
											<td class="day calendar-day-2015-07-20">
												<div class="day-contents">20</div>
											</td>
											<td class="day calendar-day-2015-07-21">
												<div class="day-contents">21</div>
											</td>
											<td class="day calendar-day-2015-07-22">
												<div class="day-contents">22</div>
											</td>
											<td class="day calendar-day-2015-07-23">
												<div class="day-contents">23</div>
											</td>
											<td class="day calendar-day-2015-07-24">
												<div class="day-contents">24</div>
											</td>
											<td class="day calendar-day-2015-07-25">
												<div class="day-contents">25</div>
											</td>
										</tr>
										<tr>
											<td class="day calendar-day-2015-07-26">
												<div class="day-contents">26</div>
											</td>
											<td class="day calendar-day-2015-07-27">
												<div class="day-contents">27</div>
											</td>
											<td class="day calendar-day-2015-07-28">
												<div class="day-contents">28</div>
											</td>
											<td class="day calendar-day-2015-07-29">
												<div class="day-contents">29</div>
											</td>
											<td class="day calendar-day-2015-07-30">
												<div class="day-contents">30</div>
											</td>
											<td class="day calendar-day-2015-07-31">
												<div class="day-contents">31</div>
											</td>
											<td class="day adjacent-month next-month calendar-day-2015-08-01">
												<div class="day-contents">1</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
						<!----Calender -------->
						<link rel="stylesheet" href="css/clndr.css" type="text/css" />
						<script src="js/underscore-min.js" type="text/javascript"></script>
						<script src="js/moment-2.2.1.js" type="text/javascript"></script>
						<script src="js/clndr.js" type="text/javascript"></script>
						<script src="js/site.js" type="text/javascript"></script>
						<!----End Calender -------->
						
					<div class="col-md-4 span_8 col_2">
						<div class="">
							<h3>Today</h3>

							<div class="box_1">
								<div class="col-md-6 col_1_of_2 span_1_of_2">
									<a class="tiles_info">
										<div class="tiles-head red1">
											<div class="text-center">Circulation</div>
										</div>
											<?php
												$query1 = mysqli_query($connect, "SELECT id FROM circulation WHERE i_date='$today'");
												$issue = mysqli_num_rows($query1);
												$query1 = mysqli_query($connect, "SELECT id FROM circulation WHERE rd_date='$today'");
												$return = mysqli_num_rows($query1);
												$total = $issue+$return;
											?>
										<div class="tiles-body red"><?php echo $total;?></div>
									</a>
								</div>
								<div class="col-md-6 col_1_of_2 span_1_of_2">
									<a class="tiles_info">
										<div class="tiles-head tw1">
											<div class="text-center">Issued</div>
										</div>
											<?php
												//$query = mysqli_query($connect, "SELECT rd_date FROM circulation WHERE rd_date='$today'");
												$query = mysqli_query($connect, "SELECT id FROM circulation WHERE i_date='$today'");
												$total = mysqli_num_rows($query);
											?>
										<div class="tiles-body tw2"><?php echo $total;?></div>
									</a>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="box_1">
								<div class="col-md-6 col_1_of_2 span_1_of_2">
									<a class="tiles_info">
										<div class="tiles-head fb1">
											<div class="text-center">Return</div>
										</div>
											<?php
												$query = mysqli_query($connect, "SELECT id FROM circulation WHERE rd_date='$today'");
												//$query = mysqli_query($connect, "SELECT id FROM circulation WHERE status='Returned'");
												$total = mysqli_num_rows($query);
											?>
										<div class="tiles-body fb2"><?php echo $total;?></div>
									</a>
								</div>
								<div class="col-md-6 col_1_of_2 span_1_of_2">
									<a class="tiles_info">
										<div class="tiles-head blue1">
											<div class="text-center">Last Date</div>
										</div>
											<?php
												$query = mysqli_query($connect, "SELECT id FROM circulation WHERE r_date='$today' AND status='Issued'");
												$total = mysqli_num_rows($query);
											?>
										<div class="tiles-body blue1"><?php echo $total;?></div>
									</a>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="box_1">
								<div class="col-md-6 col_1_of_2 span_1_of_2">
									<a class="tiles_info">
										<div class="tiles-head tw1">
											<div class="text-center">Due - Pending</div>
										</div>
											<?php
												$query = mysqli_query($connect, "SELECT id FROM dues WHERE rec_date='$today' AND pay_date=''");
												$total = mysqli_num_rows($query);
											?>
										<div class="tiles-body tw2"><?php echo $total;?></div>
									</a>
								</div>
								<div class="col-md-6 col_1_of_2 span_1_of_2">
									<a class="tiles_info">
										<div class="tiles-head red1">
											<div class="text-center">Due - Cleared</div>
										</div>
											<?php
												$query = mysqli_query($connect, "SELECT id FROM dues WHERE pay_date='$today' AND remark='Paid'");
												$total = mysqli_num_rows($query);
											?>
										<div class="tiles-body red"><?php echo $total;?></div>
									</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>

					</div>

					<div class="clearfix"> </div>
				</div>


				<!--div class="content_bottom">
					<div class="col-md-12 span_3">
						<div class="bs-example1" data-example-id="contextual-table">
							<table class="table">
								<thead>
									<tr>
										<th>#</th>
										<th>Column heading</th>
										<th>Column heading</th>
										<th>Column heading</th>
									</tr>
								</thead>
								<tbody>
									<tr class="active">
										<th scope="row">1</th>
										<td>Column content</td>
										<td>Column content</td>
										<td>Column content</td>
									</tr>
									<tr>
										<th scope="row">2</th>
										<td>Column content</td>
										<td>Column content</td>
										<td>Column content</td>
									</tr>
									<tr class="success">
										<th scope="row">3</th>
										<td>Column content</td>
										<td>Column content</td>
										<td>Column content</td>
									</tr>
									<tr>
										<th scope="row">4</th>
										<td>Column content</td>
										<td>Column content</td>
										<td>Column content</td>
									</tr>
									<tr class="info">
										<th scope="row">5</th>
										<td>Column content</td>
										<td>Column content</td>
										<td>Column content</td>
									</tr>
									<tr>
										<th scope="row">6</th>
										<td>Column content</td>
										<td>Column content</td>
										<td>Column content</td>
									</tr>
									<tr class="warning">
										<th scope="row">7</th>
										<td>Column content</td>
										<td>Column content</td>
										<td>Column content</td>
									</tr>
									<tr>
										<th scope="row">8</th>
										<td>Column content</td>
										<td>Column content</td>
										<td>Column content</td>
									</tr>
									<tr class="danger">
										<th scope="row">9</th>
										<td>Column content</td>
										<td>Column content</td>
										<td>Column content</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					
					<div class="clearfix"> </div>
				</div-->
				<!-- Site Footer -->
				<?php include 'footer.html';?>
    			<!-- Site Footer -->
			</div>
		</div>
		<!-- /#page-wrapper -->
	</div>
	<!-- /#wrapper -->
	
</body>

</html>