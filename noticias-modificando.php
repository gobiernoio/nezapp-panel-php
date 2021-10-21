<?php include("header.php"); ?>
<?php include("aside.php"); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" ng-app="panelNezApp" ng-controller="nezappController">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Noticias 
        <small> Modificando Noticia</small>
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

                  /*
                  if($_POST['nota']) {
                    $nota = $_POST['nota'];
                  }
                  else {
                    $errores++;
                  }
                  */

                  if($_POST['enlace']) {
                    $enlace = $_POST['enlace'];
                  }
                  else {
                    $enlace = null;
                  }
                  

                  $id = $_POST['id'];
                  
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
                          $directorio = $_POST['fotoanterior'];
                        }

                  ?>


                  <script>
                    var getNoticias = new Firebase('https://nezapp.firebaseio.com/noticias/<?php echo $id; ?>');

                    getNoticias.child('titulo').set('<?php echo $titulo; ?>');
                    getNoticias.child('enlace').set('<?php echo $enlace; ?>');
                    getNoticias.child('imagen').set('<?php echo $directorio; ?>');

                  </script> 

                
                  <div class="callout callout-success">
                    <h4>Tu registro se ha agregado correctamente.</h4>
                    
                    Se modificó el reporte vial.</b>
                  </div>

                  <a class="btn btn-warning" href="noticias-administrar.php">Da clic en este enlace para regresar</a>

                <?php } ?>
                
             
        </div>

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include("footer.php"); ?>