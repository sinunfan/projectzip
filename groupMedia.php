<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->

<?php

	session_start();
	$username = $_SESSION['username'];

?>

<html>
	<head>
		<title>Group Media FInder</title>
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
									<strong>Media For your group!</strong> 									
								</header>
								
								
								
								<form id="editUser" method="POST" action="/groupMedia.php">
										<div class="row gtr-uniform">
											<div class="col-6 col-12-xsmall">
											<label>Username</label>
												<input type="text" maxlength="20" name="groupmem" id="groupmem" value="" pattern=".{3,}"   required title="3 characters minimum"/>
											</div>
											
											<!--- Break -->
											
											<div class="col-12">
													<ul class="actions">
														<li><input type="submit" name="submit" value="Search" class="primary" /></li>
													</ul>	
											</div>		
										</div>
									</form>

							<?php
										
										
										if(isset($_POST['submit'])) 
										{
									
												if($username)
												{
													
														$groupmem = $_POST['groupmem'];
													
														// connect to the database server and select the database
														$con=mysqli_connect("localhost", "cs4430", "cs4430", "project");
														
														//check connection
														
														if (mysqli_connect_errno())
														{
															echo "Failed to connect to mysql: " .mysqli_connect_error();
															
														}
														
														// query to check the entered username
														
														$check =  mysqli_query($con, "SELECT * FROM users WHERE username = '$groupmem' ")
																			or die("\nFailed to query database" .mysqli_error());
														
														if(mysqli_num_rows($check)==0)			// Checking to see if the username is already registered 
														{
															echo "No user found by that name, check input or try registering your friend!";
														}
														else
														{
															echo "<header id='header'> <strong>Music Results -- Here are music recommendations based on the info you gave us!</strong></header>";
															
															//queries to find the common genre
														
															$result = mysqli_query($con, "SELECT genr FROM users U, musics M WHERE M.musid = U.musid AND U.username = '$username' ")
																				or die("\nFailed to query database" .mysqli_error());
																				
															$tempArray = mysqli_fetch_array($result, MYSQLI_ASSOC);
															$temp1 = $tempArray['genr'];
																				
															$guest = mysqli_query($con, "SELECT M1.genr FROM users U1, musics M1 WHERE M1.musid = U1.musid AND U1.username = '$groupmem' ")
																				or die("\nFailed to query database" .mysqli_error());
																			
															$tempArray2 = mysqli_fetch_array($guest, MYSQLI_ASSOC);
															$temp2 = $tempArray2['genr'];
															
															if ($temp1 == $temp2)
															{
																$group = mysqli_query($con, "SELECT * FROM musics WHERE genr = '$temp1' ")
																				or die("\nFailed to query database" .mysqli_error());
																
																
																echo "<div class='table-wrapper'>";
																echo "<table>";
																
																echo "<tr><th>Album Cover</th><th>Link</th><th>Name</th><th>Artist</th><th>Released</th><th>Genre</th></tr>";
															
															
																while($row = mysqli_fetch_array($group, MYSQLI_ASSOC)) 
																{
																	echo "<tr>";
																	$mediaImg	= $row['picpass'];
																	echo "<td> <img src='images/$mediaImg' /> </td>";
																	$mediaLink = $row['linkpath'];
																	echo "<td><a href= '$mediaLink' >More Info</a></td>";
																	echo "<td>" .  $row['name'] . "</td>";
																	echo "<td>" .  $row['artist'] . "</td>";
																	echo "<td>" .  $row['date'] . "</td>";
																	echo "<td>" .  $row['genr'] . "</td>";
																	
																	echo "</tr>";
																}
																	
																echo "</table>";
																echo "</div>";

																			
																
																
															}
															else
															{
																echo "No music matches found in our database!";																
															}
															
															echo "<header id='header'> <strong>Movie Results -- Here are movie recommendations based on the info you gave us!</strong></header>";
															
															//queries to find the common genre
														
															$mov1 = mysqli_query($con, "SELECT genr FROM users U, movies M WHERE M.movid = U.movid AND U.username = '$username' ")
																				or die("\nFailed to query database" .mysqli_error());
																				
															$movArray = mysqli_fetch_array($mov1, MYSQLI_ASSOC);
															$temp3 = $movArray['genr'];
																				
															$guest2 = mysqli_query($con, "SELECT M1.genr FROM users U1, movies M1 WHERE M1.movid = U1.movid AND U1.username = '$groupmem' ")
																				or die("\nFailed to query database" .mysqli_error());
																			
															$movArray2 = mysqli_fetch_array($guest2, MYSQLI_ASSOC);
															$temp4 = $movArray2['genr'];
															
															
															if ($temp3 == $temp4)
															{
																$group = mysqli_query($con, "SELECT picpass, movname, linkpass, date, genr FROM movies WHERE genr = '$temp3' ")
																				or die("\nFailed to query database" .mysqli_error());
																
																
																echo "<div class='table-wrapper'>";
																echo "<table>";
																
																echo "<tr><th>Movie Poster</th><th>Name</th><th>Link</th><th>Released</th><th>Genre</th></tr>";
															
															
																while($row = mysqli_fetch_array($group, MYSQLI_ASSOC)) 
																{
																	echo "<tr>";
																	$mediaImg	= $row['picpass'];
																	echo "<td> <img src='images/$mediaImg' /> </td>";
																	echo "<td>" .  $row['movname'] . "</td>";
																	$mediaLink = $row['linkpass'];
																	echo "<td><a href= '$mediaLink' >More Info</a></td>";
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
																echo "No movie matches found in our database!";																
															}
														}
																
													
												}
												else
												{
													
													echo "<header class='main'> <h1>You need to log in to get recommendations!<h1></header>";
													echo "<div class='col-6 col-12-xsmall'>";
													echo "<ul class='actions'>";
													echo "<li><a href='/User.php' class='button primary large'>Login</a></li>";
													echo "</ul>";
													echo "</div>";
											
													
												}
										
										}
										
									?>

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