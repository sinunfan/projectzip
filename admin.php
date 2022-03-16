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
		<title>Admin</title>
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
									<strong>Admin</strong>									
								</header>

							<!-- Content -->
								<section>
									<header class="main">
										<h1>Admin Page</h1>
									</header>

									<form id="admin" method="POST" action="/admin.php">
										<div class="row gtr-uniform">
											<div class="col-6">
												<label>Admin Actions</label>
												<select name="admin_action"  />
														<option value="1">Delete User</option>
														<option value="2">Add Movie</option>
														<option value="3">Add Music</option>
													</select>
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
									
										if(isset($_POST['submit'])) 
										{
											$action = $_POST['admin_action'];
											
											if($action == 1)
											{
												
												// first action go to a new page with a table for the users, with a delete option for the users
												header ('Location: /editUsers.php');
												
											}
											else if($action == 2)
											{
												
												// go to a form with a way to input movies to the data base
												header ('Location: /addMovies.php');
												
												
											}
											else if($action == 3)
											{
												
												// go to a form with a way to input music to the data base
												header ('Location: /addMusic.php');
												
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