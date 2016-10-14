
<?php
//exec('java -jar C:\wamp64\www\myJava\newjar.jar', $result);
exec('java -jar C:\wamp64\www\Metalab\Metalab.jar -help', $result);
//system('java -jar C:\wamp64\www\Metalab\Metalab.jar -par parameter.json', $result);

echo "<h2>Thank you for using our service!</h2>";
echo "<h3>The following file has been generated in directory: </h3>";
var_dump($result);
?>