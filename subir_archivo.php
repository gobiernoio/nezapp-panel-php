<?php
if (isset($_FILES['archivo'])) {
    $archivo = $_FILES['archivo'];
    $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
	$time = time();
    $nombre = "{$_POST['nombre_archivo']}_$time.$extension";
    if (move_uploaded_file($archivo['tmp_name'], "archivos_subidos/$nombre")) {
        

        if ($_SERVER['SERVER_NAME'] == "localhost") {
			$ruta = "http://".$_SERVER['SERVER_NAME']."/panelnezapp/archivos_subidos/".$nombre;
		}
		else {
			$ruta = "http://".$_SERVER['SERVER_NAME']."/archivos_subidos/".$nombre;
		}

		echo $ruta;

    } else {
        echo 0;
    }
}
?>
