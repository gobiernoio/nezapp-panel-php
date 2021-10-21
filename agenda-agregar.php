<?php include("header.php"); ?>
<?php include("aside.php"); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Agenda
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

var config = {
  apiKey: "AIzaSyAF5l1DfB5QF3FfGfp6HeEf_eEZVQbBO58",
  authDomain: "nezapp.firebaseapp.com",
  databaseURL: "https://nezapp.firebaseio.com",
  storageBucket: "project-8647383937695665487.appspot.com",
  messagingSenderId: "839553948433"
};

firebase.initializeApp(config);

var database = firebase.database();

var ref = database.ref('directorio');


ref.push({
    nombre: "<?php echo $nombre; ?>", 
    telefono: "<?php echo $telefono; ?>"
});


  

  
</script> 

                
                  <div class="callout callout-success">
                    <h4>Tu registro se ha agregado correctamente.</h4>
                    
                    Se agregó el directorio <b><?php echo $nombre; ?></b>
                  </div>

                <?php } ?>
                
             
        </div>

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include("footer.php"); ?>