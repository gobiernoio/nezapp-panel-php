<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Iniciar Sesión
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->


	<div class="box box-warning">
<!--         <div class="box-header">
          <h3 class="box-title">Ingresa tus datos para poder iniciar sesión</h3>
        </div> -->

		
		<div class="box-body">

				<div class="login-box">
				    	<img src="logotipo.jpg" alt="" width="100%;">
				  <!-- /.login-logo -->
				  <div class="login-box-body">

				    <div class="social-auth-links text-center">
				      <a href="#" onclick="iniciarSesion()" class="btn btn-block btn-social btn-facebook btn-flat" style="font-size: 16px;">
				      	<i class="fa fa-facebook"></i> Inicia sesión con facebook
				      </a>
				    </div>
				    <!-- /.social-auth-links -->
				  </div>
				  <!-- /.login-box-body -->
				</div>
				<!-- /.login-box -->

		</div>


<script>

var config = {
  apiKey: "AIzaSyAF5l1DfB5QF3FfGfp6HeEf_eEZVQbBO58",
  authDomain: "nezapp.firebaseapp.com",
  databaseURL: "https://nezapp.firebaseio.com",
  storageBucket: "project-8647383937695665487.appspot.com",
  messagingSenderId: "839553948433"
};

firebase.initializeApp(config);



var iniciarSesion = function() {
	var provider = new firebase.auth.FacebookAuthProvider();

	
	firebase.auth().signInWithPopup(provider).then(function(result) {
		console.log(result);
	  // This gives you a Facebook Access Token. You can use it to access the Facebook API.
	  //var token = result.credential.accessToken;
	  // The signed-in user info.
	  //var user = result.user;
	  // ...
	}).catch(function(error) {
		console.log(error);
	  // Handle Errors here.
	  // var errorCode = error.code;
	  // var errorMessage = error.message;
	  // The email of the user's account used.
	  // var email = error.email;
	  // The firebase.auth.AuthCredential type that was used.
	  // var credential = error.credential;
	  // ...
	});

	// function abrirURL() {
	//     location.href='canales-nuevo-revisar.php'
	//   }
}


</script>


	</div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->





				