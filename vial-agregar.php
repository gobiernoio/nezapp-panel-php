<?php include("header.php"); ?>
<?php include("aside.php"); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" ng-app="panelNezApp" ng-controller="nezappController">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Reporte vial 
        <small> Agregando registro</small>
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

                  if($_POST['noticia']) {
                    $noticia = $_POST['noticia'];
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

                <?php } else { ?>


                  <script>
                    var getCanales = new Firebase('https://nezapp.firebaseio.com/vialidad/');

                    getCanales.push({
                      id: "<?php echo $clave; ?>", 
                      face: "<?php echo $directorio; ?>", 
                      nombre: "<?php echo $nombre; ?>"
                    })


                    
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