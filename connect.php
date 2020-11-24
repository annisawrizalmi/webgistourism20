<?php
	$host = "localhost";
	$user = "postgres";
	$pass = "foodygreen";
	$port = "5432";
	$dbname = "TugasbesarIISI";
	$conn = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$pass) or die("Gagal");
	// header("Access-Control-Allow-Origin: *");
?>