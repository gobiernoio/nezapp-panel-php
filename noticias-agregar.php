<?php include("header.php"); ?>
<?php include("aside.php"); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Noticias
        <small>Agregando noticia</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        
        <div class="col-md-12">
          


                <?php
                  $errores = 0;

                  if($_POST['titulo']) {
                    $titulo = $_POST['titulo'];
                  }
                  else {
                    $errores++;
                  }

                  if($_POST['nota']) {
                    $nota = $_POST['nota'];
                  }
                  else {
                    $errores++;
                  }


                  if($_POST['enlace']) {
                    $enlace = $_POST['enlace'];
                  }
                  else {
                    $enlace = null;
                  }

                  date_default_timezone_set("America/Mexico_City");
                  $fecha = date('m/d/Y', time());
                  
                  
                ?>


            
                <?php if($errores >= 1) { ?>

                  <div class="callout callout-danger">
                    <h4>Ocurrió un error.</h4>
                    
                    Revisa que todos los datos sean correctos.

                    <div class="btn btn-default">Regresar</div>
                  </div>

                <?php } else { 

                  //echo $titulo."<br>";
                  //echo $enlace."<br>";
                  //echo $nota."<br>";


                  include_once("includes/imagen_class.php");

                  if(!empty($_FILES['foto']['tmp_name'])) {
                    $extension = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
                    $foto_file_name = "foto".".".$extension;

                    $foto_picture = new Image;
                    $foto_picture->loadImage($_FILES['foto']['tmp_name']);
                    $foto_picture->resizeWH(200, 200, true);
                    $foto_picture->saveImage("uploads/".$foto_file_name, 60); 

                    
                    //Obtenemos el directorio
                    $curdir = dirname($_SERVER['REQUEST_URI'])."/";
                    $directorio = "http://".$_SERVER['SERVER_NAME'].$curdir."uploads/".$foto_file_name;
                  }
                  else {
                    echo "NO HAY FOTO";
                    $foto_file_name = NULL;
                  }
                  ?>


<script>

var config = {
  apiKey: "AIzaSyAF5l1DfB5QF3FfGfp6HeEf_eEZVQbBO58",
  authDomain: "nezapp.firebaseapp.com",
  databaseURL: "https://nezapp.firebaseio.com",
  storageBucket: "project-8647383937695665487.appspot.com",
  messagingSenderId: "839553948433"
};

firebase.initializeApp(config);

var database = firebase.database();

var ref = database.ref('noticias');

var makeFecha = "<?php echo $fecha ?>";
timePositive = Date.now();
timeNegative = timePositive - ( timePositive * 2 );

ref.push({
    orden: timeNegative, 
    titulo: "<?php echo $titulo; ?>", 
    imagen: "<?php echo $foto_file_name; ?>", 
    enlace: "<?php echo $enlace; ?>", 
    noticia: "<?php echo $nota; ?>", 
    fecha: makeFecha
});


</script>



                
                  <div class="callout callout-success">
                    <h4>Tu registro se ha agregado correctamente.</h4>
                    
                    Se agregó tu noticia correctamente.</b>
                  </div>

                <?php } ?>
                
             
        </div>

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include("footer.php"); ?>