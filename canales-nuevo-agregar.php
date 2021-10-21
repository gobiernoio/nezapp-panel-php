<?php include("header.php"); ?>
<?php include("aside.php"); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" ng-app="panelNezApp" ng-controller="nezappController">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Canales de chat 
        <small>Agregando registro</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        
        <div class="col-md-12">
          


                <?php
                  $errores = 0;

                  if($_POST['nombre']) {
                    $nombre = $_POST['nombre'];
                  }
                  else {
                    $errores++;
                  }

                  if($_POST['clave']) {
                    $clave = $_POST['clave'];
                  }
                  else {
                    $errores++;
                  }
                  
                  
                ?>


            
                <?php if($errores >= 1) { ?>

                  <div class="callout callout-danger">
                    <h4>Ocurrió un error.</h4>
                    
                    Revisa que todos los datos sean correctos.

                    <div class="btn btn-default">Regresar</div>
                  </div>

                <?php } else { 


                  include_once("includes/imagen_class.php");

                  if(!empty($_FILES['foto']['tmp_name'])) {
                    $extension = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
                    $foto_file_name = "foto".$_POST['clave'].".".$extension;

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

var ref = database.ref('canales');


ref.push({
    id: "<?php echo $clave; ?>", 
    face: "<?php echo $directorio; ?>", 
    nombre: "<?php echo $nombre; ?>"
});

  
</script> 

                
                  <div class="callout callout-success">
                    <h4>Tu registro se ha agregado correctamente.</h4>
                    
                    Se agregó el canal <b><?php echo $nombre; ?></b>
                  </div>

                <?php } ?>
                
             
        </div>

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include("footer.php"); ?>