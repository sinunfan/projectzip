<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->


<html>
	<head>
		<title>Results</title>
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
								
								<?php
								
									$genre = $_POST['genre'];
									$release = $_POST['date'];
									$title = $_POST['title'];
										
									// selection based on which list page the user came from, using a variable
									
									if($check == 1)
									{
										
										if($temp == 1)
										{
											//header
												
											echo "<header id='header'> <strong>Query Results -- Selected Genre: ALL </strong></header>";
											// get the values from the form 
										
												
											
											// connect to the database server and select the database
											$con=mysqli_connect("localhost", "cs4430", "cs4430", "project");
											
											//check connection
											
											if (mysqli_connect_errno())
											{
												echo "Failed to connect to mysql: " .mysqli_connect_error();
												
											}
											
											//query
											
											$result = mysqli_query($con, "SELECT * FROM musics ")
																or die("\nFailed to query database" .mysqli_error());

											echo "<div class='table-wrapper'>";
											echo "<table>";
											
											echo "<tr><th>Album Cover</th><th>Link</th><th>Name</th><th>Artist</th><th>Released</th><th>Genre</th></tr>";
											
											
											
											while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
											{
												echo "<tr>";
												$mediaImg	= $row['picpass'];
												echo "<td> <img src='images/$mediaImg'  /> </td>";
												$mediaLink = $row['linkpath'];
												echo "<td><a href= '$mediaLink' >Media List</a></td>";
												echo "<td>" .  $row['name'] . "</td>";
												echo "<td>" .  $row['artist'] . "</td>";
												echo "<td>" .  $row['date'] . "</td>";
												echo "<td>" .  $row['genr'] . "</td>";
											
												echo "</tr>";
											}
											
											echo "</table>";
											echo "</div>";

											mysqli_close($con);
										}
										else
										{
												//header
												
											echo "<header id='header'> <strong>Query Results -- Selected Genre: " . $temp . "</strong></header>";
											// get the values from the form 
										
												
											
											// connect to the database server and select the database
											$con=mysqli_connect("localhost", "cs4430", "cs4430", "project");
											
											//check connection
											
											if (mysqli_connect_errno())
											{
												echo "Failed to connect to mysql: " .mysqli_connect_error();
												
											}
											
											//query
											
											$result = mysqli_query($con, "SELECT * FROM musics WHERE genr = '$temp' ")
																or die("\nFailed to query database" .mysqli_error());
											
											echo "<div class='table-wrapper'>";
											echo "<table>";
											
											echo "<tr><th>Album Cover</th><th>Link</th><th>Name</th><th>Artist</th><th>Released</th><th>Genre</th></tr>";
											
											
											while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
											{
												echo "<tr>";
												$mediaImg	= $row['picpass'];
												echo "<td> <img src='images/$mediaImg' /> </td>";
												$mediaLink = $row['linkpath'];
												echo "<td><a href= '$mediaLink' >Media List</a></td>";
												echo "<td>" .  $row['name'] . "</td>";
												echo "<td>" .  $row['artist'] . "</td>";
												echo "<td>" .  $row['date'] . "</td>";
												echo "<td>" .  $row['genr'] . "</td>";
												
												echo "</tr>";
											}
											
											echo "</table>";
											echo "</div>";

											mysqli_close($con);
												
										}
										
									}
									else
									{
										if($temp == 1)
										{
											//header
												
											echo "<header id='header'> <strong>Query Results -- Selected Genre: ALL </strong></header>";
											// get the values from the form 
										
												
											
											// connect to the database server and select the database
											$con=mysqli_connect("localhost", "cs4430", "cs4430", "project");
											
											//check connection
											
											if (mysqli_connect_errno())
											{
												echo "Failed to connect to mysql: " .mysqli_connect_error();
												
											}
											
											//query
											
											$result = mysqli_query($con, "SELECT * FROM movies ")
																or die("\nFailed to query database" .mysqli_error());

											echo "<div class='table-wrapper'>";
											echo "<table>";
											
											echo "<tr><th>Movie Poster</th><th>Name</th><th>Link</th><th>Released</th><th>Genre</th></tr>";
											
											
											
											while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
											{
												echo "<tr>";
												$mediaImg	= $row['picpass'];
												echo "<td> <img src='images/$mediaImg' /> </td>";
												echo "<td>" .  $row['movname'] . "</td>";
												$mediaLink = $row['linkpath'];
												echo "<td><a href= '$mediaLink' >Watch</a></td>";
												echo "<td>" .  $row['date'] . "</td>";
												echo "<td>" .  $row['genr'] . "</td>";
												echo "</tr>";
											}
											
											echo "</table>";
											echo "</div>";

											mysqli_close($con);
										}
										else
										{
											//header
												
											echo "<header id='header'> <strong>Query Results -- Selected Genre: " . $temp . "</strong></header>";
											// get the values from the form 
										
												
											
											// connect to the database server and select the database
											$con=mysqli_connect("localhost", "cs4430", "cs4430", "project");
											
											//check connection
											
											if (mysqli_connect_errno())
											{
												echo "Failed to connect to mysql: " .mysqli_connect_error();
												
											}
											
											//query
											
											$result = mysqli_query($con, "SELECT * FROM movies WHERE genr = '$temp' ")
																or die("\nFailed to query database" .mysqli_error());

											echo "<div class='table-wrapper'>";
											echo "<table>";
											
											echo "<tr><th>Movie Poster</th><th>Name</th><th>Link</th><th>Released</th><th>Genre</th></tr>";
											
											while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
											{
												echo "<tr>";
												$mediaImg	= $row['picpass'];
												echo "<td> <img src='images/$mediaImg' /> </td>";
												echo "<td>" .  $row['movname'] . "</td>";
												$mediaLink = $row['linkpass'];
												echo "<td><a href= '$mediaLink' />More Info</a></td>";
												echo "<td>" .  $row['date'] . "</td>";
												echo "<td>" .  $row['genr'] . "</td>";
												echo "</tr>";
											}
											
											echo "</table>";
											echo "</div>";

											mysqli_close($con);
											
										}
									}
									
							?>
							
							
						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">
							<!-- Menu -->
								<nav id="menu">
									<header class="major">
										<h2>Menu</h2>
									</header>
									<ul>
										<li><a href="index.html">Homepage</a></li>
										<li><a href="User.php">Login</a></li>
										<li>
											<span class="opener">Search by Media</span>
											<ul>
												<li><a href="MovieSearch.php">Search by Movies</a></li>
												<li><a href="MusicSearch.php">Search by Music</a></li>
											</ul>
										</li>
										<li><a href="MediaList.php">Media List</a></li>
									</ul>
								</nav>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Featured Media</h2>
									</header>
									<div class="mini-posts">
										<article>
											<a href="#" class="image"><img src="images/jpark.png" alt="" /></a>
											<p>Movie of the month</p>
										</article>
										<article>
											<a href="#" class="image"><img src="images/demons.png" alt="" /></a>
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