<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->

<?php

	session_start();
	$username = $_SESSION['username'];
	
	if	($username != 'root')
	{
		header ('Location: /index.php');
		exit();
	}


?>

<html>
	<head>
		<title>Edit Users</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">
<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									<strong>Edit Users</strong>									
								</header>

							<!-- Content -->
								<section>
									<header class="main">
										<h1>Select a User to Delete</h1>
									</header>

																	
									
									<?php
									
										// connect to the database server and select the database
											$con=mysqli_connect("localhost", "cs4430", "cs4430", "project");
											
											//check connection
											
											if (mysqli_connect_errno())
											{
												echo "Failed to connect to mysql: " .mysqli_connect_error();
												
											}
											
											//query
											
											$result = mysqli_query($con, "SELECT * FROM users ")
																or die("\nFailed to query database" .mysqli_error());

											echo "<div class='table-wrapper'>";
											echo "<table>";
											
											echo "<tr><th>User ID</th><th>Username</th></tr>";
											
											
											
											while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
											{
												echo "<tr>";
												echo "<td>" .  $row['uid'] . "</td>";
												echo "<td>" .  $row['username'] . "</td>";
												echo "</tr>";
											}
											
											echo "</table>";
											echo "</div>";

											mysqli_close($con);
									
									?>
										
										
								<form id="editUser" method="POST" action="/editUsers.php">
										<div class="row gtr-uniform">
											<div class="col-6 col-12-xsmall">
											<label>Delete by User ID</label>
												<input type="number" min="1" max="100" name="userID" id="userID" />
											</div>
											
											<!--- Break -->
											
											<div class="col-12">
													<ul class="actions">
														<li><input type="submit" name="submit" value="DELETE" class="primary" /></li>
													</ul>	
											</div>		
										</div>
									</form>
									
									<?php
										
										if(isset($_POST['submit'])) 
										{
											
											$userID = $_POST['userID'];
											
											if($userID == 0)
											{
												
												echo "You can't delete the admin account!";
											}
											else
											{
												$con=mysqli_connect("localhost", "cs4430", "cs4430", "project");
											
												//check connection
												
												if (mysqli_connect_errno())
												{
													echo "Failed to connect to mysql: " .mysqli_connect_error();
													
												}
												
												// sanitize the input and query the database, since we are using straight user input
												
																							
												$result = mysqli_query($con, "SELECT * FROM users WHERE uid = '$userID' ")
																					or die("\nFailed to query database" .mysqli_error());
																																	
												if(mysqli_num_rows($result)==0)			
												{
													
													$stmt = mysqli_query($con, "DELETE FROM users WHERE uid = '$userID' ");
													echo "User Deleted";
												
												}
												else
												{
													echo "Error User ID is not valid, Please try again!";
												}
												
																					
												mysqli_close($con);
													
											}
									
										}
									?>
						
									
								</section>

						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">
						<?php 
							
									if($username)
									{
										echo "<header><strong>Signed in as $username </strong></header>";
									}
									else
									{
										echo "<p>not signed in</p>";
									}
									
							
							?>
							<!-- Menu -->
								<nav id="menu">
									<header class="major">
										<h2>Menu</h2>
									</header>
									<ul>
										<li><a href="index.php">Homepage</a></li>
										<?php 
							
											if($username)
											{
													echo "<li><a href='updateUser.php'>User Profile</a></li>";
											}
											else
											{
												echo "<li><a href='User.php'>Login</a></li>";
											}
											
										?>
										<li>
											<span class="opener">Media For You</span>
											<ul>
												<li><a href="MovieSearch.php">Movies For You</a></li>
												<li><a href="MusicSearch.php">Music For You</a></li>
											</ul>
										</li>
										<li><a href="MediaList.php">Media List</a></li>
										<li><a href="groupMedia.php">Group Media</a></li>
										<?php 
							
											if($username == 'root')
											{
													echo "<li><a href='admin.php'>Admin Page</a></li>";
											}
											
										?>
									</ul>
								</nav>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Featured Media</h2>
									</header>
									<div class="mini-posts">
										<article>
												<a href="https://www.imdb.com/title/tt0107290/" class="image"><img src="images/jpark.png" alt="" /></a>
											<p>Movie of the month</p>
										</article>
										<article>
											<a href="https://open.spotify.com/album/0bUTHlWbkSQysoM3VsWldT" class="image"><img src="images/demons.png" alt="" /></a>
											<p>Album of the month</p>
										</article>
									</div>
								</section>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Get in touch</h2>
									</header>
									<p>Any questions? Please feel free to send us an email!</p>
									<ul class="contact">
										<li class="icon solid fa-envelope"><a href="#">totallyReal@untitled.tld</a></li>
										<li class="icon solid fa-phone">877-CASH-NOW</li>
										<li class="icon solid fa-home">1234 Somewhere Road #8254<br />
										Nashville, TN 00000-0000</li>
									</ul>
								</section>

							<!-- Footer -->
								<footer id="footer">
									<p class="copyright">&copy; Untitled. NOT FOR PROFIT // FOR EDUATIONAL PURPOSES ONLY \\ Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
								</footer>

						</div>
					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
	</body>
</html>