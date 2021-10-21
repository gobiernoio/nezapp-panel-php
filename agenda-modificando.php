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

                  if($_POST['id']) {
                    $id = $_POST['id'];
                  }
                  else {
                    $errores++;
                  }


                  if($_POST['nombre']) {
                    $nombre = $_POST['nombre'];
                  }
                  else {
                    $errores++;
                  }

                  if($_POST['telefono']) {
                    $telefono = $_POST['telefono'];
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

                  ?>


                  <script>
                    var getCanales = new Firebase('https://nezapp.firebaseio.com/directorio/<?php echo $id; ?>');

                    getCanales.child('nombre').set('<?php echo $nombre; ?>');
                    getCanales.child('telefono').set('<?php echo $telefono; ?>');

                  </script> 

                
                  <div class="callout callout-success">
                    <h4>Tu registro se ha agregado correctamente.</h4>
                    
                    Se modificó el número de <b><?php echo $nombre; ?></b>
                  </div>

                  <a class="btn btn-warning" href="agenda-revisar.php">Da clic en este enlace para regresar</a>

                <?php } ?>
                
             
        </div>

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include("footer.php"); ?>