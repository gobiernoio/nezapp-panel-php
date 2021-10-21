<?php include("header.php"); ?>
<?php include("aside.php"); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
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
                <form role="form" action="canales-nuevo-agregar.php" method="post" enctype="multipart/form-data">
                  <div class="box-body">


                    <div class="form-group">
                      <label for="nombre">Nombre del canal</label>
                      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresar nombre">
                    </div>

                    <div class="form-group">
                      <label for="clave">Clave</label>
                      <input type="password" class="form-control" id="clave" name="clave" placeholder="Ingresar clave">
                    </div>

                    <div class="form-group">
                      <label for="foto">Subir miniatura</label>
                      <input type="file" id="foto" name="foto">

                      <p class="help-block">Elige la imagen que se verá en el chat como miniatura.</p>
                    </div>


                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-warning">Agregar Canal</button>
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