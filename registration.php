<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>New User Registration</title>
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
									<strong>Register</strong>									
								</header>

							<!-- Content -->
								<section>
									<header class="main">
										<h1>New User Registration</h1>
									</header>

									<form id="movie" method="POST" action="/registration.php">
										<div class="row gtr-uniform">
											
											<div class="col-6 col-12-xsmall">
											<label>Username</label>
												<input type="text" maxlength="20" name="userName" id="userName" value="" pattern=".{3,}"   required title="3 characters minimum"/>
											</div>
											<div class="col-6 col-12-xsmall">
												<label>&nbsp;</label>
											</div>
											<div class="col-6 col-12-xsmall">
											<label>Password</label>
												<input type="password" maxlength="20" name="user_pass" id="user_pass" value="" pattern=".{6,}"   required title="6 characters minimum"/>
											</div>
											<div class="col-6 col-12-xsmall">
												<label>&nbsp;</label>
											</div>
										
										<!--BREAK-->
									
											<div class="col-6 col-12-xsmall">
												<label>Which one of these movies would you be most likely to watch?</label>
												<select name="movID"  />
														<option value="0">Avengers: Endgame</option>
														<option value="1">Toy Story 4</option>
														<option value="2">Frozen 2</option>
														<option value="3">Once Upon a Time in Hollywood</option>
														<option value="4">The Irishman</option>
														<option value="5">Booksmart</option>
														<option value="6">Joker</option>
														<option value="7">Midsommar</option>
														<option value="8">Rocketman</option>
														<option value="9">The King</option>
											</select>
											</div>
											
											<div class="col-6 col-12-xsmall">
												<label>Which one of these songs would you be most likely to listen to?</label>
												<select name="musID"  />
														<option value="0">"Senorita" - Shawn Mendes</option>
														<option value="1">"Sucker" - Jonas Brothers</option>
														<option value="2">"Beautiful People" - Ed Sheeran</option>
														<option value="3">"Old Town Road" - Lil Nas X</option>
														<option value="4">"Bad Guy" - Billie Eilish</option>
														<option value="5">"7 rings (Remix)" - Ariana Grande</option>
														<option value="6">"Ranson" - Lil Tecca</option>
														<option value="7">"Surge" - DaBaby</option>
														<option value="8">"Wish Wish" - DJ Khaled</option>
														<option value="9">"Harmony Hall" - Vampire Weekend</option>
											</select>
											</div>
																					
											<!--- Break -->
																					
											<div class="col-12">
																	<input type="checkbox" id="check2" name="check">
																	<label for="check2">I am a human</label>
											</div>
											
											<!--- Break -->
											
											<div class="col-12">
													<ul class="actions">
														<li><input type="submit" name="submit" value="Submit" class="primary" /></li>
													</ul>	
											</div>					
										</div>
									</form>
									
									
									<?php
									
										// Php to register the knew user or tell them if the username is already taken
									
									
										// two outputs Invalid username "Username already taken"
										// or Registraion Complete, you can update these preferrences anytime at the user page
										if(isset($_POST['submit'])) 
										{
										// Enter the code you want to execute after the form has been submitted
										// Display Success or Failure message (if any) 
											$username = $_POST['userName'];
											$password = $_POST['user_pass'];
											$movID = $_POST['movID'];
											$musID = $_POST['musID'];

											$con=mysqli_connect("localhost", "cs4430", "cs4430", "project");
											
											//check connection
											
											if (mysqli_connect_errno())
											{
												echo "Failed to connect to mysql: " .mysqli_connect_error();
												
											}
											
											// sanitize the input and query the database, since we are using straight user input
											
																						
											$result = mysqli_query($con, "SELECT * FROM users WHERE username = '$username' ")
																				or die("\nFailed to query database" .mysqli_error());
																																
											if(mysqli_num_rows($result)==0)			// Checking to see if the username is already registered 
											{
												
												$stmt = mysqli_query($con, "INSERT INTO users(username, password, movid, musid) VALUES ('$username','$password','$movID','$musID') ");
												echo "Registration Complete! You may change your options any time via the Users page";
												
												
											}
											else	   // If its not proceed with the registration
											{
												echo "This Username is already taken, Please try another";											
												
											}
											
											mysqli_close($con);
										} 
										else 
										{
										// Display the Form and the Submit Button
										}
											
									
									
									?>
										
						
									
								</section>

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