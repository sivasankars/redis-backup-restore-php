<?php
require "predis/autoload.php";
Predis\Autoloader::register();

$host = "pub-redis-18802.us-east-1-1.2.ec2.garantiadata.com";
$port = 18802;

$redis = new Predis\Client(array(
    "scheme" => "tcp",
    "host" => $host,
    "port" => $port,
    "password" => "xxxxxx"
	));

	?>