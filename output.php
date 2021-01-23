<?php
	session_start();
	
	if (!isset($_SESSION["errorMessage"]))
	{
		$_SESSION["errorMessage"] = "None";
	}
	
	$weather = "";
	$error = "";
	
	// $_GET['city'] from name='city' in index.php	
	if (isset($_GET['city']))
	{
		$source = file_get_contents ("https://api.openweathermap.org/data/2.5/weather?q=".$_GET['city']."&appid=####");
		$array = json_decode($source, true);
		//print_r($array);
		
		if ($array['cod'] == 200)
		{
			/*echo "<h1 id='title'>".$array['name'].", ".$array['sys']['country']."</h1>";
			echo "<h1>it works</h1>";
			echo "<h1>".$array['cod']."</h1>";
			echo "<h1>".$array['weather'][0]['description']."</h1>";
			echo "<h1>".$array['wind']['speed']."</h1>";*/
			$_SESSION["errorMessage"] = "None";
		}
		else
		{
			$_SESSION["errorMessage"] = "error";
			header("Location: http://gkwebsites100-com.stackstaging.com/");
			exit;
		}
	}
?>

<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" type="text/css">

		<title>Report</title>
	
		<style>
			body
			{
				margin: 0;
				background-color: gold;
				width: 100%
			}
			.logo
			{
				background-color: DarkOrange;
				height: 100px;
				width: 100%;
			}
			#information
			{
				height: auto;
				width: 100%;
			}
			.map 
			{
				height: 300px;
				width: 100%;
			}
			.curvedbox
			{
				background-color: yellow;
				border: 6px solid black;
				border-radius: 30px;
				height: 200px;
				width: 400px;
				margin-left: 30px;
				margin-top: 20px;
				margin-bottom: 50px;
				float: left;
			}
			@media screen and (max-width: 1000px) {
				.curvedbox {
					width: 400px;
				}
			}
		</style>
		
		<script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>
	</head>
	
	<body>		
		<div class="navigate">
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
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
					</form>-->
				</div>
			</nav>
		</div>
								
		<div id="information">
			<p style="text-align: center; margin-top: 20px; font-size: 40px;"><b><?php echo $array['name'].", ".$array['sys']['country']; ?></b></p>
			<div class="curvedbox" style="background-color: magenta">
				<img id="icons" style="position: relative; margin-left: 140px; margin-top: 30px;" src="http://openweathermap.org/img/wn/<?php echo $array['weather'][0]['icon']; ?>@2x.png">
				<p style="text-align: center; position: relative; margin-left: 0px; margin-top: 0px;"><b><?php echo ucfirst($array['weather'][0]['description']); ?></b></p>
			</div>
			<div class="curvedbox">
				<p style="text-align: center; position: relative; margin-left: 0px; margin-top: 65px; font-size: 40px;"> <b><?php echo $array['main']['temp']-273.15; ?> &deg;C </b></p>
			</div>
			<div class="curvedbox">
				<p style="position: relative; margin-left: 40px; margin-top: 20px;"> <b>Humidity:</b> <?php echo $array['main']['humidity']; ?> % </p>
				<p style="position: relative; margin-left: 40px; margin-top: 10px;"> <b>Windspeed:</b> <?php echo $array['wind']['speed']; ?> m/s (<?php echo $array['wind']['speed'];?> &deg &#8630) </p>
				<p style="position: relative; margin-left: 40px; margin-top: 10px;"> <b>Pressure:</b> <?php echo $array['main']['pressure']; ?> hPa </p>
				<p style="position: relative; margin-left: 40px; margin-top: 10px;"> <b>Visibility:</b> <?php echo $array['visibility']; ?> m </p>
			</div>
		</div>
		
		<div id="map" class="map"></div>
				
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		
		<script type="text/javascript">
			var regularmap = new ol.layer.Tile({
					source: new ol.source.OSM()});
			var cloudmap = new ol.layer.Tile({
					source: new ol.source.OSM({layer: 'clouds_new'})});
					
			var map = new ol.Map({
				target: 'map',
				layers: [
					regularmap
				],
				view: new ol.View({
					center: ol.proj.fromLonLat([<?php echo $array['coord']['lon']?> , <?php echo $array['coord']['lat']?>]),
					zoom: 7
				})
			});
		</script>
	</body>
</html>
