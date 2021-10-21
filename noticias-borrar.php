<?php include("header.php"); ?>
<?php include("aside.php"); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Noticias 
        <small> Borrando noticia</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        
        <div class="col-md-12">
          


                <?php
                  $errores = 0;

                  if($_GET['id']) {
                    $id = $_GET['id'];
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


var config = {
    apiKey: "AIzaSyAF5l1DfB5QF3FfGfp6HeEf_eEZVQbBO58",
    authDomain: "nezapp.firebaseapp.com",
    databaseURL: "https://nezapp.firebaseio.com",
    storageBucket: "project-8647383937695665487.appspot.com",
    messagingSenderId: "839553948433"
  };

  firebase.initializeApp(config);

  var database = firebase.database();

  var miURL = database.ref('noticias/<?php echo $id ?>');

  miURL.remove().then(function() {

    function abrirURL() {
      location.href='noticias-administrar.php'
    }

    setTimeout(abrirURL, 3000);
  });


</script> 

                
                  <div class="callout callout-success">
                    <h4>Redireccionando...</h4>
                    <h5>El registro se ha borrado.</h5>

                    
                    
                  </div>

                <?php } ?>
                
             
        </div>

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include("footer.php"); ?>