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
		<title>Media List</title>
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
									<strong>Media Search</strong>
								</header>

							<!-- Content -->
								<section>
									<header class="main">
										<h1>Media by Genre</h1>
									</header>

									<span class="image main"><img src="images/pic11.jpg" alt="" /></span>
									
									<p>Use one of the two forms below to see what types of media we have to see! More options in the works</p>

									<form id="music" method="POST" action="process.php">
										<div class="row gtr-uniform">
											<div class="col-6">
												<label>Music by Genre</label>
												<select name="genre"  />
														<option value="1">Show All</option>
														<option value="Pop">Pop</option>
														<option value="Hip-Hop/Rap">Rap/Hip-hop</option>
														<option value="New wave">New Wave</option>
														<option value="trap">Electronic</option>
														<option value="alt">Alternative</option>
											</select>
											</div>
											
											<!--- Break -->
																					
											<div class="col-12">
																	<input type="checkbox" id="check" name="check" value="1">
																	<label for="check">I am a human</label>
											</div>
											
											<!--- Break -->
											
											<div class="col-12">
													<ul class="actions">
														<li><input type="submit" name="submit" value="Query" class="primary" /></li>
													</ul>	
											</div>					
										</div>
									</form>							
									
									
									<form id="movie" method="POST" action="process.php">
										<div class="row gtr-uniform">
											<div class="col-6">
												<label>Movies by Genre</label>
												<select name="genre"  />
														<option value="1">Show All</option>
														<option value="Horror">Horror</option>
														<option value="Action">Action</option>
														<option value="Comedy">Comedy</option>
														<option value="Thriller">Thriller</option>
														<option value="Drama">Drama</option>
														<option value="History">Historical</option>
											</select>
											</div>
											
											<!--- Break -->
																					
											<div class="col-12">
																	<input type="checkbox" id="check2" name="check" value="0" >
																	<label for="check2">I am a human</label>
											</div>
											
											<!--- Break -->
											
											<div class="col-12">
													<ul class="actions">
														<li><input type="submit" name="submit" value="Query" class="primary" /></li>
													</ul>	
											</div>					
										</div>
									</form>							
								
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