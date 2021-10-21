<?php include("header.php"); ?>
<?php include("aside.php"); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Reporte Vial
        <small>Modificando registro</small>
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


                  if($_POST['titulo']) {
                    $titulo = $_POST['titulo'];
                  }
                  else {
                    $errores++;
                  }

                  if($_POST['reporte']) {
                    $reporte = $_POST['reporte'];
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

var config = {
  apiKey: "AIzaSyAF5l1DfB5QF3FfGfp6HeEf_eEZVQbBO58",
  authDomain: "nezapp.firebaseapp.com",
  databaseURL: "https://nezapp.firebaseio.com",
  storageBucket: "project-8647383937695665487.appspot.com",
  messagingSenderId: "839553948433"
};

firebase.initializeApp(config);

var database = firebase.database();

var miURL = database.ref('vialidad/<?php echo $id; ?>');

miURL.update({
  titulo: '<?php echo $titulo; ?>', 
  noticia: '<?php echo $reporte; ?>'
});


</script> 

                
                  <div class="callout callout-success">
                    <h4>Tu registro se ha agregado correctamente.</h4>
                    
                    Se modificó el reporte vial.</b>
                  </div>

                  <a class="btn btn-warning" href="vial-revisar.php">Da clic en este enlace para regresar</a>

                <?php } ?>
                
             
        </div>

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include("footer.php"); ?>