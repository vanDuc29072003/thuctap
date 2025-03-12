<?php
// Load biến môi trường từ file .env
	$_ENV = parse_ini_file(__DIR__ . '/.env');
	
	$host = $_ENV['DB_HOST'];
	$port = $_ENV['DB_PORT'];
	$dbname = $_ENV['DB_NAME'];
	$user = $_ENV['DB_USER'];
	$pass = $_ENV['DB_PASS'];
	
	$conn = new PDO("mysql:host=$host;
							port=$port;
							dbname=$dbname;charset=utf8", 
							$user,
							$pass);
?>