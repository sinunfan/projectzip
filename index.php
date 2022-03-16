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
		<title>Untitled database project</title>
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
									<strong>Homepage</strong>
								</header>

							<!-- Banner -->
								<section id="banner">
									<div class="content">
										<header>
											<h1>Media Search</h1>
											<p>A media database that will bring people together</p>
										</header>
										<p>Use this site ro find music and movies similar to what you or your group likes.</p>
									</div>
									<span class="image object">
										<img src="images/pic10.jpg" alt="" />
									</span>
								</section>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Get Started</h2>
									</header>
									<div class="posts">
										<article>
											<a href="https://www.imdb.com/title/tt1375666/" class="image"><img src="images/incept.png" alt="" /></a>
											<h3>Movies</h3>
											<p>This is the movies search for the recently popular movies in the media.</p>
											<ul class="actions">
												<li><a href="/MovieSearch.php" class="button">Find Me Movies!</a></li>
											</ul>
										</article>
										<article>
											<a href="https://open.spotify.com/album/0ETFjACtuP2ADo6LFhL6HN" class="image"><img src="images/beatle.png" alt="" /></a>
											<h3>Music</h3>
											<p>This is the music search for the recently popular music in the media.</p>
											<ul class="actions">
												<li><a href="/MusicSearch.php" class="button">Find Me Music!</a></li>
											</ul>
										</article>
										<article>
											<a href="/User.php" class="image"><img src="images/pic03.jpg" alt="" /></a>
											<h3>Login</h3>
											<p>You can login to become our member to keep you likes.</p>
											<ul class="actions">
												<li><a href="/User.php" class="button">Sign In/Up!</a></li>
											</ul>
										</article>
									</div>
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