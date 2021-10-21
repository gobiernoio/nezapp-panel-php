<?php include("header.php"); ?>
<?php include("aside.php"); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Nueva 
        <small> Notificación.</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        
        <div class="col-md-12">
          


              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Llena el siguiente formulario para envíar una notificación.</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="canales-nuevo-agregar.php" method="post" enctype="multipart/form-data">
                  <div class="box-body">


                    <div class="form-group">
                      <label for="titulo">Encabezado de la notificación</label>
                      <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ingresar encabezado">
                    </div>

                    <div class="form-group">
                      <label for="notificacion">Mensaje de la notificación</label>
                      <input type="password" class="form-control" id="notificacion" name="notificacion" placeholder="Ingresar notificación">
                    </div>


                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-warning">Enviar Notificación</button>
                  </div>
                </form>
              </div>



        </div>

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->





<?php include("footer.php"); ?>