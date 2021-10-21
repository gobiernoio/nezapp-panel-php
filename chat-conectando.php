<?php include("header.php"); ?>
<?php include("aside.php"); ?>


<style>
  .user-chat {
    display: block;
    padding: 10px!important;
    cursor: pointer;
  }

  .user-chat:hover {
    background: #EEE;
  }
</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" ng-app="panelNezApp" ng-controller="nezappController">
    
    <!-- Main content -->
    <section class="content">

      <div class="row">
        
        
        <div class="col-md-4">
            <div class="box box-warning">
            <div class="box-header with-border">
              <h3 id="conectadoa" class="box-title"><small>Conectar </small>Chat</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <form ng-submit="traerChat(chat)">
                    <input id="chat" name="chat" type="text" class="form-control input-sm" ng-model="chat" placeholder="Ingrese clave de chat">
                  </form>
                  <span class="glyphicon glyphicon-refresh form-control-feedback"></span>
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">



                  <div ng-repeat="usuario in usuarios" class="user-chat user-block" ng-click="mostrarMensajes(usuario.$id, usuario.usuario)">
                    <img class="img-circle img-bordered-sm" src="uploads/blue-user-26936.jpg" alt="message user image">
                        <span class="username">
                          <a href="#">{{ usuario.usuario }}</a>
                          <span class="label pull-right bg-red">{{ usuario.badge }}</span>
                        </span>
                    <span class="description">{{ usuario.fecha }}</span>
                  </div>

                  
                  <div id="preload-chats" class="overlay">
                    <i class="fa fa-refresh fa-spin"></i>
                  </div>
            </div>
            
          </div>

        </div>



        <div class="col-md-8">
             


              <!-- DIRECT CHAT -->
              <div id="mostrando-chat" class="box box-warning direct-chat direct-chat-warning" style="display: none;">
                <div class="box-header with-border">
                  <h3 class="box-title">Chateando con {{usuarioEnTurno}} ( {{usuarioEnTurnoId}} )</h3>
                  
                  <div class="box-tools pull-right">
        
                    <button ng-click="enviarArchivo(  )" type="button" class="btn btn-box-tool"><i class="fa fa-paperclip"></i>
                    <button ng-click="borrarChat( usuarioId )" type="button" class="btn btn-box-tool"><i class="fa fa-trash-o"></i>
                    </button>
                  </div>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages" style="height: 545px;">



                  



                    <div ng-repeat="mensaje in mensajes" ng-hide="cargador" class="panel-group">


                        <!-- Message. Default to the left -->
                        <div class="direct-chat-msg" ng-if="usuarioId === mensaje.usuarioId">
                          <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name pull-left">{{mensaje.usuario}}</span>
                            <span class="direct-chat-timestamp pull-right">{{mensaje.fecha}}</span>
                          </div>
                          <!-- /.direct-chat-info -->
                          <img class="direct-chat-img" src="uploads/blue-user-26936.jpg" alt="message user image"><!-- /.direct-chat-img -->
                          <div class="direct-chat-text">
                            {{mensaje.mensaje}}
                                  <div ng-if="mensaje.foto">
                                        <img src="{{mensaje.foto}}" alt="" class="foto-mensaje">
                                    </div>
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
                                 <div ng-if="mensaje.foto">
                                    <img src="{{mensaje.foto}}" alt="" class="foto-mensaje">
                                </div>

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
                  <form ng-submit="procesarMensaje(mensaje)">
                    <div class="input-group">
                      <input type="text" name="message" placeholder="Escribir mensaje ..." class="form-control" ng-model="mensaje">
                          <span class="input-group-btn">
                            <button type="submit" class="btn btn-warning btn-flat">Envíar</button>
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



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Envíar archivo</h4>
      </div>
      <div class="modal-body">
            
            <form action="javascript:void(0);">
              <div class="form-group">
                <label for="nombreArchivo">Nombre del archivo:</label>
                <input type="text" name="nombre_archivo" id="nombre_archivo" class="form-control">
              </div>
              
              <div class="form-group">
                <label for="archivo">Seleccione archivo</label>
                <input type="file" name="archivo" id="archivo">
                <!-- <p class="help-block"></p> -->
              </div>


              <div class="form-group">
                <label for="">Cuando el archivo termine de subir se enviará.</label>
                <progress class="form-control" id="barra_de_progreso" value="0" max="100"></progress>
              </div>

              <!-- <div class="form-group">
                <div id="archivos_subidos"></div>
              </div> -->
            </form>

            

            


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button id="boton_subir" type="button" class="btn btn-success">Enviar</button>
      </div>
    </div>
  </div>
</div>



<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->  
<script src="js/upload.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>


<script>

$(document).ready(function() {
  $('#preload-chats').hide();
});
var miAplicacion = angular.module('panelNezApp', ['firebase'])

//    ====================================================    Controller
miAplicacion.controller ('nezappController', [ '$scope', '$http', '$firebaseArray', function($scope, $http, $firebaseArray) {

  var remitente, remitenteId, destinatario, destinatarioId;

  var config = {
    apiKey: "AIzaSyAF5l1DfB5QF3FfGfp6HeEf_eEZVQbBO58",
    authDomain: "nezapp.firebaseapp.com",
    databaseURL: "https://nezapp.firebaseio.com",
    storageBucket: "project-8647383937695665487.appspot.com",
    messagingSenderId: "839553948433"
  };

  firebase.initializeApp(config);
  var database = firebase.database();
  


  // Empiezan pruebas
  // var claves = "https://nezapp.firebaseio.com/usuarios/presidente-r26f/mischats.json?shallow=true&print=pretty";
  // var conexion = new XMLHttpRequest();

  // conexion.onreadystatechange = function() {
  //   if(conexion.readyState == 4 && conexion.status == 200) {
  //     var registros = JSON.parse(conexion.responseText);
  //     console.log(conexion.responseText);
  //   }
  // }

  // conexion.open('GET', claves, true);
  // conexion.send();

     

  // var datosRemitente = database.ref('usuarios/presidente-r26f/mischats').orderByKey().limitToFirst(10);

  // datosRemitente.once('value', function(snapshot) {
  //   var cadenaCanales = snapshot.val();
  //   console.log(cadenaCanales);

  //   //Buscamos el canal seleccionado y asignamos variables remitente.
  //   for( cadena in cadenaCanales ) {

  //     if(cadenaCanales[cadena].id == chat) {
  //         remitente = cadenaCanales[cadena].nombre;
  //         remitenteId = chat;
  //         console.log("Conectado al canal: "+remitente+" con el id: "+remitenteId);
  //     }
  //   }
  // });





  // Carga un canal de chats
  $scope.traerChat = function(chat) {
      $('#preload-chats').show();

      $firebaseArray(  database.ref('usuarios/'+chat+'/mischats').orderByChild('orden').limitToFirst(30) ).$loaded().then( function(data) {
        $scope.usuarios = data;

        var chat = document.getElementById('chat');
        chat.value = "";
        $('#preload-chats').hide();

      });

      var datosRemitente = database.ref('canales');
      datosRemitente.once('value', function(snapshot) {
        var cadenaCanales = snapshot.val();

        // Buscamos el canal seleccionado y asignamos variables remitente.
        for( cadena in cadenaCanales ) {

          if(cadenaCanales[cadena].id == chat) {
              remitente = cadenaCanales[cadena].nombre;
              remitenteId = chat;

              $('#conectadoa').html('<span style="font-size: 0.8em">' + remitente + '</span>');
              console.log("Conectado al canal: "+remitente+" con el id: "+remitenteId);
          }
        }
      });
  }

  //$scope.traerChat("presidente-r26f");

  // Carga los mensajes de un chat
  $scope.mostrarMensajes = function(usuarioId, usuario) {
      var cajaChat = document.getElementById('mostrando-chat');
      var chat = usuarioId;
      $scope.usuarioEnTurno = usuario;
      $scope.usuarioEnTurnoId = usuarioId;
      $scope.usuarioId = usuarioId;
      destinatario = usuario;
      destinatarioId = usuarioId;

      $firebaseArray(  database.ref( 'usuarios/'+remitenteId+'/mensajes/'+chat ) ).$loaded().then( function(data) {
        $scope.mensajes = data;
        $(cajaChat).show();
      });

      // Remover Badge si es que existe
      var reiniciarBadge = database.ref( 'usuarios/'+remitenteId+'/mischats/' + usuarioId + '/badge' );
      reiniciarBadge.remove();

      console.log("Chateando ahora con: "+destinatario+" con el id: "+destinatarioId);
  }


  //    ====================================================    Adjuntar Archivos
  $scope.enviarArchivo = function() {
    $('#myModal').modal('show');
  }


  function subirArchivos() {
      $("#archivo").upload('subir_archivo.php',
      {
          nombre_archivo: $("#nombre_archivo").val()
      },
      function(respuesta) {
          enviarArchivoMensajes(respuesta);
          //Subida finalizada.
          $("#barra_de_progreso").val(0);
          if (respuesta === 1) {
              mostrarRespuesta('El archivo ha sido subido correctamente.', true);
              $("#nombre_archivo, #archivo").val('');
          } else {
              mostrarRespuesta('El archivo NO se ha podido subir.', false);
          }
          //mostrarArchivos();
      }, function(progreso, valor) {
          //Barra de progreso.
          $("#barra_de_progreso").val(valor);
      });
  }
  function eliminarArchivos(archivo) {
      $.ajax({
          url: 'eliminar_archivo.php',
          type: 'POST',
          timeout: 10000,
          data: {archivo: archivo},
          error: function() {
              mostrarRespuesta('Error al intentar eliminar el archivo.', false);
          },
          success: function(respuesta) {
              if (respuesta == 1) {
                  mostrarRespuesta('El archivo ha sido eliminado.', true);
              } else {
                  mostrarRespuesta('Error al intentar eliminar el archivo.', false);                            
              }
              mostrarArchivos();
          }
      });
  }
  function mostrarArchivos() {
      $.ajax({
          url: 'mostrar_archivos.php',
          dataType: 'JSON',
          success: function(respuesta) {
              if (respuesta) {
                  var html = '';
                  for (var i = 0; i < respuesta.length; i++) {
                      if (respuesta[i] != undefined) {
                          html += '<div class="row"> <span class="col-lg-2"> ' + respuesta[i] + ' </span> <div class="col-lg-2"> <a class="eliminar_archivo btn btn-danger" href="javascript:void(0);"> Eliminar </a> </div> </div> <hr />';
                      }
                  }
                  $("#archivos_subidos").html(html);
              }
          }
      });
  }
  function mostrarRespuesta(mensaje, ok){
      $("#respuesta").removeClass('alert-success').removeClass('alert-danger').html(mensaje);
      if(ok){
          $("#respuesta").addClass('alert-success');
      }else{
          $("#respuesta").addClass('alert-danger');
      }
  }
  $(document).ready(function() {
      mostrarArchivos();
      $("#boton_subir").on('click', function() {
          subirArchivos();
      });
      $("#archivos_subidos").on('click', '.eliminar_archivo', function() {
          var archivo = $(this).parents('.row').eq(0).find('span').text();
          archivo = $.trim(archivo);
          eliminarArchivos(archivo);
      });
  });


  //    ====================================================    Borra preferencias de un chat
  $scope.borrarChat = function(item) {
    //console.log("No se ha borrado el item: " + item);

    var removeChat = database.ref( 'usuarios/presidente-r26f/mensajes/'+item);
    var removeMisChats = database.ref( 'usuarios/presidente-r26f/mischats/'+item);
    // var removeUsuario = database.ref( 'usuarios/'+item);

    // removeMisChats.remove();
    // removeChat.remove();
    // removeUsuario.remove();
  }


  // ====================================================================================
  // ===================================================   Envíar Push
  function enviarPush(remitente, destinatarioId, mensaje) {
      $http({
          method: 'POST', 
          url: 'https://onesignal.com/api/v1/notifications', 
          data: {
          "app_id": "24fb1008-1a7e-414f-bb62-01251ad15b4a", 
          "tags": [{"key": "Canal", "relation": "=","value": destinatarioId }], 
          "android_group" : remitente, 
          "android_group_message" : { "en" : "Tienes $[notif_count] mensajes de " + remitente}, 
          "data": { "hoja": "tab.chats" }, 
          "contents": {"en": mensaje }
          },
          headers: {
          'Authorization': 'Basic YjE2MTQzYzgtMjZiNS00YzJhLWIwMzMtZTc4OTEyY2RlMzJk'
          }
      }).then(function successCallback(response) {
      }, function errorCallback(response) {
      });
  }
  
  // ====================================================================================
  // ====================================   Añadiendo un cero a la hora que es menor a 10
  function ponerCero(i) {
      if (i < 10) {
          i = "0" + i;
      }
      return i;
  }

  // ====================================================================================
  // ===================================================   Crear Fecha
  function makeFecha() {
      var fecha = new Date();
      var opciones = { weekday: "long", year: "numeric", month: "long", day: "numeric" }
      return fecha.toLocaleDateString("es-ES", opciones);
  }

  // ====================================================================================
  // ===================================================   Crear Hora
  function makeHora() {
    var fecha = new Date();
    var horaCompuesta = ponerCero(fecha.getHours()) + ":" + ponerCero(fecha.getMinutes());
    return horaCompuesta;
  }

  // ====================================================================================
  // ===================================================   Crear número de ordenamiento.
  function traemeOrden () {
    timePositive = Date.now();
    timeNegative = timePositive - ( timePositive * 2 );
    return timeNegative;
  }


  // ====================================================================================
  // ===================================================   Envíando el mensaje a firebase
  function actualizarBadge(remitente, destinatario)  {
    var lugarBadge = database.ref( 'usuarios/'+destinatario+'/mischats/' + remitente );
    var valorBadge = database.ref( 'usuarios/'+destinatario+'/mischats/' + remitente + "/badge" );

    valorBadge.once("value", function(snapshot){
      badge = snapshot.val();
      badge++;
      lugarBadge.update({ badge : badge });
    });
  }

  // ====================================================================================
  // ===================================================   Envíar mensaje con archivo.
  function enviarArchivoMensajes (mensaje) {
    $('#myModal').modal('hide');
    // Datos Mensaje
    var elMensaje = mensaje;
  
    var mensajeJson = {
      // facebookProfileImageURL : facebookProfileImageURL,
      // facebookDisplayName : facebookDisplayName,
      // facebookId : facebookId,
      hora: makeHora(), 
      fecha: makeFecha(), 
      usuario: remitente, 
      usuarioId: remitenteId, 
      destinatario: destinatario, 
      destinatarioId: destinatarioId, 
      mensaje: elMensaje
    }

    var mensajesSusMensajes = {
      badge: 1, 
      // facebookProfileImageURL : facebookProfileImageURL,
      // facebookDisplayName : facebookDisplayName,
      // facebookId : facebookId,
      orden: traemeOrden(), 
      hora: makeHora(), 
      fecha: makeFecha(), 
      usuario: remitente, 
      usuarioId: remitenteId, 
      ultimomensaje: elMensaje
    }

    var mensajesMisMensajes = {
      // facebookProfileImageURL : facebookProfileImageURL,
      // facebookDisplayName : facebookDisplayName,
      // facebookId : facebookId,
      orden: traemeOrden(), 
      hora: makeHora(), 
      fecha: makeFecha(), 
      usuario: destinatario, 
      usuarioId: destinatarioId, 
      ultimomensaje: elMensaje
    }

    enviarMensaje(mensajeJson, mensajesSusMensajes, mensajesMisMensajes, elMensaje);

    this.mensaje = '';
  }



  // ====================================================================================
  // ===================================================   Procesar mensaje
  $scope.procesarMensaje = function(mensaje) {
    // Datos Mensaje
    var elMensaje = this.mensaje;
  
    var mensajeJson = {
      // facebookProfileImageURL : facebookProfileImageURL,
      // facebookDisplayName : facebookDisplayName,
      // facebookId : facebookId,
      hora: makeHora(), 
      fecha: makeFecha(), 
      usuario: remitente, 
      usuarioId: remitenteId, 
      destinatario: destinatario, 
      destinatarioId: destinatarioId, 
      mensaje: elMensaje
    }

    var mensajesSusMensajes = {
      badge: 1, 
      // facebookProfileImageURL : facebookProfileImageURL,
      // facebookDisplayName : facebookDisplayName,
      // facebookId : facebookId,
      orden: traemeOrden(), 
      hora: makeHora(), 
      fecha: makeFecha(), 
      usuario: remitente, 
      usuarioId: remitenteId, 
      ultimomensaje: elMensaje
    }

    var mensajesMisMensajes = {
      // facebookProfileImageURL : facebookProfileImageURL,
      // facebookDisplayName : facebookDisplayName,
      // facebookId : facebookId,
      orden: traemeOrden(), 
      hora: makeHora(), 
      fecha: makeFecha(), 
      usuario: destinatario, 
      usuarioId: destinatarioId, 
      ultimomensaje: elMensaje
    }

    enviarMensaje(mensajeJson, mensajesSusMensajes, mensajesMisMensajes, elMensaje);

    this.mensaje = '';
  }

  // ====================================================================================
  // ===================================================   Envíando el mensaje a firebase
  function enviarMensaje(mensaje, susmensajes, mismensajes, mensajeSimple) {

    // Trayendo la Key del chat
    var nuevaKey = database.ref('usuarios/'+remitente+'/mensajes').push().key;

    // Escribir datos de forma simultanea
    var actualizaciones = {};
    // Enviar datos de | para | sus mensajes | mis mensajes
    actualizaciones['/usuarios/' + remitenteId + '/mensajes/' + destinatarioId + "/" + nuevaKey] = mensaje;
    actualizaciones['/usuarios/' + destinatarioId + '/mensajes/' + remitenteId + "/" + nuevaKey] = mensaje;
    actualizaciones['/usuarios/' + destinatarioId + '/mischats/' + remitenteId ] = susmensajes;
    actualizaciones['/usuarios/' + remitenteId + '/mischats/' + destinatarioId ] = mismensajes;

    //console.log(actualizaciones);
    firebase.database().ref().update(actualizaciones).then(function() {
      console.log("Se Envió Correctamente");
      enviarPush(remitente, destinatarioId, mensajeSimple);
    });
  }
  
}])
</script>


  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      ¡Tu clic al siguiente nivel!
    </div>
    <!-- Default to the left -->
    <strong>Soporte por <a href="http://hmedia.com.mx">h media</a>.</strong>
  </footer>

  
</div>
<!-- ./wrapper -->

<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
</body>
</html>



