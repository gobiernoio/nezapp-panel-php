<?php include("header.php"); ?>
<?php include("aside.php"); ?>

<?php 

if (isset($_GET['canal'])) {
  $canal =  $_GET['canal']; 
} else {
  $canal = "presidente-r26f";
}


?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" ng-app="panelNezApp" ng-controller="nezappController">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Chat 
        <small>Conectar a chat</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        
        
        <div class="col-md-3">


            <div class="box box-warning direct-chat direct-chat-warning">
              
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                      
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="width: 100%;">
                          Seleccionar Canal <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                          <li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?canal=presidente-r26f">Juan Hugo de la Rosa, Presidente Municipal</a></li>
                          <li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?canal=seguridad-j39x">Seguridad Ciudadana</a></li>
                          <li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?canal=agua-l29x">Agua Potable</a></li>
                          <li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?canal=bomberos-240s">Bomberos y Protección Civil</a></li>
                          <li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?canal=servicios-p19f">Servicios Públicos</a></li>
                          <li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?canal=tramites-p3x0">Trámites y Servicios</a></li>
                          <li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?canal=dif-s9u8">DIF</a></li>
                          <li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?canal=zonanorte-zn45">Zona Norte</a></li>
                          <li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?canal=cultura-r4m3">Cultura y Educación</a></li>
                        </ul>
                      </li>

                    </ul>
                 
                  </div>

            </div>




            <div class="box box-warning direct-chat direct-chat-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Tus chats recientes</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
              </div>


              <div class="box-body" style="padding: 10px;">
                  <div ng-repeat="usuario in usuarios" class="btn btn-warning btn-block" ng-click="mostrarMensajes(usuario.$id, usuario.usuario)">
                    <!-- {{ usuario.usuario }} -->
                    {{ usuario.$id }}
                  </div>
              </div>



            </div>
        </div>



        <div class="col-md-9">
              <!-- DIRECT CHAT -->
              <div class="box box-warning direct-chat direct-chat-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Chateando con...</h3>
                  

                  <!--
                  <div class="box-tools pull-right">
                    <span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow">3</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                      <i class="fa fa-comments"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                  -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages">







                    <div ng-repeat="mensaje in mensajes" ng-hide="cargador" class="panel-group">


                        <!-- Message. Default to the left -->
                        <div class="direct-chat-msg" ng-if="usuarioId === mensaje.usuarioId">
                          <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name pull-left">{{mensaje.usuarioId}}</span>
                            <span class="direct-chat-timestamp pull-right">{{mensaje.fecha}}</span>
                          </div>
                          <!-- /.direct-chat-info -->
                          <img class="direct-chat-img" src="uploads/blue-user-26936.jpg" alt="message user image"><!-- /.direct-chat-img -->
                          <div class="direct-chat-text">
                            {{mensaje.mensaje}}
                          </div>
                          <!-- /.direct-chat-text -->
                        </div>
                        <!-- /.direct-chat-msg -->


                        <!-- Message to the right -->
                        <div class="direct-chat-msg right" ng-if="usuarioId !== mensaje.usuarioId">
                          <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name pull-right">{{mensaje.usuario}}</span>
                            <span class="direct-chat-timestamp pull-left">{{mensaje.fecha}}</span>
                          </div>
                          <!-- /.direct-chat-info -->
                          <img class="direct-chat-img" src="uploads/nezapp-28-l-124x124.png" alt="message user image"><!-- /.direct-chat-img -->
                          <div class="direct-chat-text">
                            {{mensaje.mensaje}}
                          </div>
                          <!-- /.direct-chat-text -->
                        </div>
                        <!-- /.direct-chat-msg -->


            
                


                      </div>






                    

                    

                  </div>
                  <!--/.direct-chat-messages-->

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <form action="#" method="post">
                    <div class="input-group">
                      <input type="text" name="message" placeholder="Escribir mensaje ..." class="form-control">
                          <span class="input-group-btn">
                            <button type="button" class="btn btn-warning btn-flat">Envíar</button>
                          </span>
                    </div>
                  </form>
                </div>
                <!-- /.box-footer-->
              </div>
              <!--/.direct-chat -->
            </div>
            <!-- /.col -->









      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




<!-- **********   **********    ANGULAR   **********    ********** -->
<script>
  var miAplicacion = angular.module('panelNezApp', ['firebase'])

  miAplicacion.controller ('nezappController', [ '$scope', '$http', '$firebaseArray', function($scope, $http, $firebaseArray, miFirebase) {

    var config = {
      apiKey: "AIzaSyAF5l1DfB5QF3FfGfp6HeEf_eEZVQbBO58",
      authDomain: "nezapp.firebaseapp.com",
      databaseURL: "https://nezapp.firebaseio.com",
      storageBucket: "project-8647383937695665487.appspot.com",
      messagingSenderId: "839553948433"
    };

    firebase.initializeApp(config);
    var database = firebase.database();


    //var ref = firebase.database().ref("/canales");
    var ref = firebase.database().ref("/usuarios/presidente-r26f/mischats");
    
    
    ref.orderByKey().startAt("Carlos-91LE68M").limitToFirst(10).on("child_added", function(snapshot) {
      //console.log(snapshot.val());
      console.log(snapshot.key);
    });


    $firebaseArray(  database.ref('usuarios/<?php echo $canal ?>/mischats').orderByChild('orden').limitToFirst(30) ).$loaded().then( function(data) {
        $scope.usuarios = data;
        $('#preload-chats').hide();
      });


    $scope.mostrarMensajes = function(usuarioId, usuario) {
      $scope.cargador = true;

      var chat = usuarioId;
      $scope.usuarioEnTurno = usuario;
      $scope.usuarioId = usuarioId;

      $firebaseArray(  database.ref('usuarios/<?php echo $canal ?>/mensajes/'+usuarioId).orderByChild('orden').limitToFirst(30) ).$loaded().then( function(data) {
        $scope.mensajes = data;
        $scope.cargador = false;
      });

    }

  }])

</script>



<?php include("footer.php"); ?>