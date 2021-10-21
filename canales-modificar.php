<?php include("header.php"); ?>
<?php include("aside.php"); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" ng-app="panelNezApp" ng-controller="nezappController">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Nuevo 
        <small>Canal de Chat</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        
        <div class="col-md-12">
          


              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Llena el siguiente formulario con los datos del canal que quieras agregar.</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="canales-modificando.php" method="post" enctype="multipart/form-data">
                  

                  <div class="box-body">


                    <div class="form-group">
                        <label for="nombre">Nombre del canal</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresar nombre">
                    </div>

                    <div class="form-group">
                        <label for="clave">Clave</label>
                        <input type="text" class="form-control" id="clave" name="clave" placeholder="Ingresar clave">
                    </div>

                    
                    <div class="form-group">
                        <label for="foto">Foto actual</label>

                        <div>
                          <img src="#" alt="" id="face">
                        </div>

                        <div class="form-group">
                          <label for="foto">Elige una nueva imagen si quieres cambiar la que está actualmente.</label>
                          <input type="file" id="foto" name="foto" class="form-control">

                          <p class="help-block">Elige la imagen que se verá en el chat como miniatura.</p>
                        </div>
                        
                        <input type="hidden" id="fotoanterior" name="fotoanterior">
                        <input type="hidden" id="id" name="id" value="<?php echo $_GET['id']; ?>">
                    </div>


                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-warning">Modificar Canal</button>
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
  
    var miURL = database.ref('canales/<?php echo $_GET['id']; ?>');
     
    miURL.once('value').then(function(snapshot) {
      var inputId = document.getElementById('clave');
      var inputNombre= document.getElementById('nombre');
      var inputFace= document.getElementById('face');
      var inputFotoAnterior= document.getElementById('fotoanterior');


      var id = snapshot.val().id;
      var nombre = snapshot.val().nombre;
      var face = snapshot.val().face;
      
      inputId.value = id;
      inputNombre.value = nombre;
      inputFotoAnterior.value = face;
      inputFace.src = face;


    });
  }
]);

 
</script>


<?php include("footer.php"); ?>