<?php include("header.php"); ?>
<?php include("aside.php"); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" ng-app="panelNezApp" ng-controller="nezappController">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Reporte Víal 
        <small>Revisar reportes víales</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        
        <div class="col-md-12">

          <div>


                <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Teléfonos registrados</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table class="table table-bordered table-hover">
                      <tr>
                        <th>Id</th>
                        <th>Título</th>
                        <th>Reporte</th>
                        <th>Fecha</th>
                        <th width="40px">Editar</th>
                        <th width="40px">Borrar</th>
                      </tr>

                      <tr ng-repeat="telefono in directorio">
                        <td>{{ telefono.$id }}</td>
                        <td>{{ telefono.titulo }}</td>
                        <td>{{ telefono.noticia }}</td>
                        <td>{{ telefono.fecha }}</td>
                        <td>
                            <a class="btn btn-success" href="vial-modificar.php?id={{ telefono.$id }}">
                              <i class="fa fa-edit"></i> Editar
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="vial-borrar.php?id={{ telefono.$id }}">
                              <i class="fa fa-trash"></i> Borrar
                            </a>
                        </td>
                      </tr>
                      


                    </table>
                  </div>
                 
                </div>

            
            

          </div>
          
            



<!-- **********   **********    ANGULAR   **********    ********** -->
<script>
  var miAplicacion = angular.module('panelNezApp', ['firebase'])

  miAplicacion.controller("nezappController", ["$scope", "$firebaseArray",
  function($scope, $firebaseArray) {
     

    var config = {
      apiKey: "AIzaSyAF5l1DfB5QF3FfGfp6HeEf_eEZVQbBO58",
      authDomain: "nezapp.firebaseapp.com",
      databaseURL: "https://nezapp.firebaseio.com",
      storageBucket: "project-8647383937695665487.appspot.com",
      messagingSenderId: "839553948433"
    };

    firebase.initializeApp(config);
    var database = firebase.database();


    // Carga los canales de chats en la lista
    var traerCanales = function() {
        $firebaseArray(  database.ref('vialidad').orderByChild('orden').limitToFirst(20) ).$loaded().then( function(data) {
          $scope.directorio = data;
          //console.log(data);
        });
    }

    traerCanales();

   
  }
]);

 
</script>

                
                
             
        </div>

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include("footer.php"); ?>