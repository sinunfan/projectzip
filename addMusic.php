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
		<title>Music Entry</title>
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
									<strong>Music Entry</strong>									
								</header>

							<!-- Content -->
								<section>
									<header class="main">
										<h1>Enter new songs here! Please double check everything!</h1>
									</header>

									<form id="addMusic" method="POST" action="/addMusic.php">
										<div class="row gtr-uniform">
											
											<div class="col-6 col-12-xsmall">
											<label>Song Name</label>
												<input type="text" maxlength="25" name="songName" id="songName" value=""/>
											</div>
											<div class="col-6 col-12-xsmall">
											<label>Artist Name</label>
												<input type="text" maxlength="25" name="artist" id="artist" value=""/>
											</div>
											<div class="col-6 col-12-xsmall">
											<label>Link</label>
												<input type="text" maxlength="100" name="outLink" id="outLink" value=""/>
											</div>
											<div class="col-6 col-12-xsmall">
											<label>Picture Name</label>
												<input type="text" maxlength="25" name="picID" id="picID" value=""/>
											</div>
											<div class="col-6 col-12-xsmall">
											<label>Year Released</label>
												<input type="text" maxlength="25" name="year" id="year" value=""/>
											</div>
											<div class="col-6 col-12-xsmall">
											<label>Genre</label>
												<input type="text" maxlength="25" name="genre" id="genre" value=""/>
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
											$songname = $_POST['songName'];
											$artist = $_POST['artist'];
											$linkPass = $_POST['outLink'];
											$picPath = $_POST['picID'];
											$year	= $_POST['year'];
											$genre = $_POST['genre'];

											$con=mysqli_connect("localhost", "cs4430", "cs4430", "project");
											
											//check connection
											
											if (mysqli_connect_errno())
											{
												echo "Failed to connect to mysql: " .mysqli_connect_error();
												
											}
											
											// sanitize the input and query the database, since we are using straight user input
											
																						
											$result = mysqli_query($con, "SELECT * FROM musics WHERE name = '$songname' ")
																				or die("\nFailed to query database" .mysqli_error());
																																
											if(mysqli_num_rows($result)==0)			
											{
												
												$stmt = mysqli_query($con, "INSERT INTO musics(picpass, linkpath, name, artist, date, genr) VALUES ('$picPath','$linkPass','$songname','$artist','$year','$genre') ");
												echo "Entry Added!";
												
												
											}
													
											mysqli_close($con);
																				
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