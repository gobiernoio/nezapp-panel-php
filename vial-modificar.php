<?php include("header.php"); ?>
<?php include("aside.php"); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" ng-app="panelNezApp" ng-controller="nezappController">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Modificar  
        <small>Reporte vial</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        
        <div class="col-md-12">
          


              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Modifica los datos que quieras corregir.</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="vial-modificando.php" method="post" enctype="multipart/form-data">
                  

                  <div class="box-body">


                    <div class="form-group">
                        <label for="titulo">Título del reporte</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ingresar título">
                    </div>


                    <div class="form-group">
                        <label for="reporte">Reporte vial</label>
                        <input type="text" class="form-control" id="reporte" name="reporte" placeholder="Ingresar Reporte">
                    </div>


                    <input type="hidden" id="id" name="id" value="<?php echo $_GET['id']; ?>">

                  </div>


                    



                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-warning">Modificar reporte vial</button>
                  </div>
                </form>
              </div>



        </div>

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




<script>
  var miAplicacion = angular.module('panelNezApp', ['firebase'])

  miAplicacion.controller("nezappController", ["$scope",
  function($scope) {


    var config = {
      apiKey: "AIzaSyAF5l1DfB5QF3FfGfp6HeEf_eEZVQbBO58",
      authDomain: "nezapp.firebaseapp.com",
      databaseURL: "https://nezapp.firebaseio.com",
      storageBucket: "project-8647383937695665487.appspot.com",
      messagingSenderId: "839553948433"
    };

    firebase.initializeApp(config);

    var database = firebase.database();
  
    var miURL = database.ref('vialidad/<?php echo $_GET['id']; ?>');
     
    miURL.once('value').then(function(snapshot) {
      var inputTitulo = document.getElementById('titulo');
      var inputReporte = document.getElementById('reporte');

      var titulo = snapshot.val().titulo;
      var reporte = snapshot.val().noticia;
      
      inputTitulo.value = titulo;
      inputReporte.value = reporte;


    });
  }
]);

 
</script>


<?php include("footer.php"); ?>