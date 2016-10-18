
<?php
echo '<!DOCTYPE html>
		<html>
		<head>
			<title>MetaLab</title>
			<meta charset="UTF-8">
			<link href="css/styles.css" rel="stylesheet"/>
		</head>
		<body>
			<div class="header">
				<img src="img/logo.png">
				<h2>Data analysis</h2>
			</div>';

//exec('java -jar C:\wamp64\www\myJava\newjar.jar', $result);
exec('java -jar C:\wamp64\www\Metalab\Metalab.jar -help', $result);
//system('java -jar C:\wamp64\www\Metalab\Metalab.jar -par parameter.json', $result);

echo '<div style="width: 640px; margin:0 auto;"><h2>Thank you for using our service!</h2>';
echo "<h3>The following file has been generated in directory: </h3>";
var_dump($result);
echo "</div>";

echo '<div class="footer">
			<span>Metalab Copyright@2016</span>
			<div id="help">Help</div>
			<div id="privacy">Privacy and terms</div>
		</div>

		<script src="js/index.js"></script>
	</body>
	</html>';	
?>