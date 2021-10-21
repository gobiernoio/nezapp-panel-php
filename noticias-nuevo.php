<?php include("header.php"); ?>
<?php include("aside.php"); ?>
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Noticias 
        <small>Crear nueva noticia</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <form role="form" action="noticias-agregar.php" method="post" enctype="multipart/form-data">
        
            <div class="col-md-12">
              


                  <div class="box box-warning">
                    <div class="box-header with-border">
                      <h3 class="box-title">Llena el siguiente formulario y da clic en el botón "Crear Noticia" para crear una nueva noticia.</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    
                      <div class="box-body">


                        <div class="form-group">
                          <label for="titulo">Título de la noticia</label>
                          <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ingresar título aquí">
                        </div>


                        <div class="form-group">
                          <label for="enlace">Si quiere que la nota enlace a un sitio web, coloquelo aquí.</label>
                          <input type="text" class="form-control" id="enlace" name="enlace" placeholder="Colocar enlace aquí">
                        </div>


                        <div class="form-group">
                            <label for="nota"></label>
                            <textarea id="nota" class="textarea" name="nota" placeholder="Escribe tu nota aquí" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>





                        <div class="form-group">
                          <label for="foto">Subir foto para la noticia.</label>
                          <input type="file" id="foto" name="foto" class="form-control">

                          <p class="help-block">Esta imagen es de referencia y solo se coloca una por cada noticia, de clic para elegir una foto de su galería.</p>
                        </div>

                      </div>
                      <!-- /.box-body -->

                      <div class="box-footer">
                        <button type="submit" class="btn btn-warning">Crear Noticia</button>
                      </div>
                    
                  </div>



            </div>



        </form>

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->





<?php include("footer.php"); ?>