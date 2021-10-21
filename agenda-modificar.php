<?php include("header.php"); ?>
<?php include("aside.php"); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" ng-app="panelNezApp" ng-controller="nezappController">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Agenda 
        <small> Modificar registro</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        
        <div class="col-md-12">
          


              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Cambia los datos que sean necesarios y después da clic en el botón "Modificar registro".</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="agenda-modificando.php" method="post" enctype="multipart/form-data">
                  

                  <div class="box-body">


                    <div class="form-group" ng-repeat="telefono in directorio">

                      
                        <div ng-if="telefono.$id == 'nombre'">
                            <label for="nombre">Nombre del telefono</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresar nombre" value="{{ telefono.$value }}">
                        </div>

                        <div ng-if="telefono.$id == 'telefono'">
                            <label for="telefono">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingresar teléfono"  value="{{ telefono.$value }}">
                        </div>

                        <input type="hidden" id="id" name="id" value="<?php echo $_GET['id']; ?>">

                    </div>


                    



                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-warning">Modificar registro</button>
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

  miAplicacion.controller("nezappController", ["$scope", "$firebaseArray",
  function($scope, $firebaseArray) {
     

    var getDirectorio = new Firebase('https://nezapp.firebaseio.com/directorio/<?php echo $_GET['id']; ?>');
    $scope.directorio = $firebaseArray(getDirectorio);
    console.log($firebaseArray(getDirectorio));

  }
]);

 
</script>


<?php include("footer.php"); ?>