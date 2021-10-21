<?php include("header.php"); ?>
<?php include("aside.php"); ?>

<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" ng-app="panelNezApp" ng-controller="nezappController">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Noticias 
        <small> Modificar Noticia</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        
        <div class="col-md-12">
          


              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Modifica los datos que quieras modificar de la noticia.</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="noticias-modificando.php" method="post" enctype="multipart/form-data">
                  

                  <div class="box-body">


                    <div class="form-group">
                        <label for="titulo">Título del noticia</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ingresar titulo">
                    </div>


                    <div class="form-group">
                        <label for="enlace">Si quiere que la nota enlace a un sitio web, coloquelo aquí.</label>
                        <input type="text" class="form-control" id="enlace" name="enlace" placeholder="Colocar enlace aquí">
                    </div>


                    <div class="form-group">
                        <label for="foto">Foto actual</label>

                        <div>
                          <img src="{{ noticia.$value }}" alt="" width="200px">
                        </div>

                        <div class="form-group">
                          <label for="foto">Elige una nueva imagen si quieres cambiar la que está actualmente.</label>
                          <input type="file" id="foto" name="foto" class="form-control">

                          <p class="help-block">Elige la imagen que se verá en el chat como miniatura.</p>
                        </div>
                        
                        <input type="hidden" id="fotoanterior" name="fotoanterior" value="{{ noticia.$value }}">
                        <input type="hidden" id="id" name="id" value="<?php echo $_GET['id']; ?>">
                    </div>

  

                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-warning">Modificar Noticia</button>
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

  var miURL = database.ref('noticias/<?php echo $_GET['id']; ?>');
   
  miURL.once('value').then(function(snapshot) {
    var inputTitulo = document.getElementById('titulo');
    var inputEnlace = document.getElementById('enlace');

    var titulo = snapshot.val().titulo;
    var enlace = snapshot.val().enlace;
    
    inputTitulo.value = titulo;
    inputEnlace.value = enlace;


  });
}
]);

</script>


<?php include("footer.php"); ?>