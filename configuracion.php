<?php


// if ($_SERVER['SERVER_NAME'] == "localhost") {
// 	$servidor_mysql = "localhost";
// 	$usuario_mysql = "root";
// 	$password_mysql = "";
// 	$base_mysql = "panel_nezapp";
// 	//echo "Conectando desde localhost";
// }
// else {
// 	$servidor_mysql = "localhost";
// 	$usuario_mysql = "hmediaho_gob";
// 	$password_mysql = "meganI0605";
// 	$base_mysql = "hmediaho_nezapp";
// 	//echo "Conectando desde servidor";
// }



$enlace = mysqli_connect("35.225.116.249", "root", "imb090503", "nezapp")
or die("no se pudo conectar con el servidor");

mysqli_select_db($enlace, "nezapp")
or die("No se pudo conectar a la base de datos");

mysqli_query($enlace, "SET NAMES 'utf8'");


// $con = mysql_connect($servidor_mysql, $usuario_mysql, $password_mysql)
// or die("no se pudo conectar con el servidor");

// mysql_select_db($base_mysql, $con)
// or die("No se pudo conectar a la base de datos");
?>