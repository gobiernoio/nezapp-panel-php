<?php include("header.php"); ?>
<?php include("aside.php"); ?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Usuarios
        <small>Administrar usuarios</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        
        <div class="col-md-12">

          <div>


                <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Usuarios registrados</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table class="table table-bordered table-hover">
                      <tr>
                        <th width="20px">id</th>
                        <th width="30px">Imagen</th>
                        <th>Nombre</th>
                        <th>E-mail</th>
                        <th>Observaciones</th>
                        <th width="40px">Editar</th>
                        <th width="40px">Borrar</th>
                      </tr>


                      <?php
                      include("configuracion.php");
                      $query = "SELECT * FROM nezapp_usuarios";
                      $result = mysqli_query($enlace, $query);

                      while ($row = mysqli_fetch_assoc($result)) {
                      
                      ?>
      
                      <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><img src="<?php echo $row['foto_perfil']; ?>" width="40px;" class="img-circle"></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['observaciones']; ?></td>
                        <td>
                            <a class="btn btn-success" href="usuarios-modificar.php?id=<?php echo $row['id']; ?>">
                              <i class="fa fa-edit"></i> Editar
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="usuarios-borrar.php?id=<?php echo $row['id']; ?>">
                              <i class="fa fa-user-times"></i> Borrar
                            </a>
                        </td>
                      </tr>

                      <?php } ?>
                      


                    </table>
                  </div>
                 
                </div>

            
            

          </div>
          
            


                
                
             
        </div>

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include("footer.php"); ?>