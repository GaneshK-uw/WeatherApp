<?php
	session_start();
?>

<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<title>Weather</title>
		
		<style>
			body
			{
				background-color: rgb(28,31,34);
				background-color: rgb(28,31,34);
				background-image: url("Lighthouse2.jpg");
				height: 100%;
				background-repeat: no-repeat;
				background-size: cover;
				background-position: center;
			}
			.container
			{
				text-align: center;
				margin-top: 300px;
				width: 700px;
			}
			h1
			{
				text-align: center;
				margin: 30px;
			}
			input
			{
				background-color: midnightblue;
				color: ivory;
			}
			.pic
			{
				background-image: url("Lighthouse2.jpg");
				height: 100%;
				background-position: center;
				background-repeat: no-repeat;
				background-size: cover;
			}
			.errorBox
			{
				width: 200px;
				height: 50px;
				padding: 10px;
				text-align: center;
				margin: auto;
				background-color: lightpink;
				color: red;
				border: 1px solid red;
				border-radius: 5px;
			}
		</style>
	</head>
	
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a style="color: #FF00FF;" class="navbar-brand" href="http://gkwebsites100-com.stackstaging.com/">Lighthouse</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav mr-auto">
					<a style="margin-left: 30px; color: #FF00FF;" class="nav-item nav-link" href="about.php">About</a>
					<!--<a style="margin-left: 30px; color: #FF00FF;" class="nav-item nav-link" href="#">Facts</a>-->
				</div>
				<!--<form class="form-inline my-2 my-lg-0">
					<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
					<button style="color: #FF00FF;" class="btn btn-outline my-2 my-sm-0" type="submit">Search</button>
				</form>-->
			</div>
		</nav>
		
		<h1>Weather Forecast</h1>
		
		<?php
			if ($_SESSION["errorMessage"] == "error")
			{
				echo "<div class='errorBox'><strong>Enter a valid city.</strong></div>";
			}
		?>
													
		<div class="container">
			<!-- Sets method to GET and sends action to output.php -->
			<form method="GET" action="output.php">
				<fieldset class="form-group">
					<label style="font-size: 20px;" for="city"><b>Enter city</b></label>
					<input type="text" class="form-control" id="city" name="city" placeholder="Eg: London or Reykjavik, IS">
				</fieldset>
				<button type="submit" class="btn btn-primary">Go!</button>
			</form>
		</div>
		
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>