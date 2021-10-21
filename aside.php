  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
  

    <?php  if(isset($_SESSION['usuario'])) { ?>


    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
    
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $_SESSION['foto_perfil']; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['usuario']; ?></p>
          
          <!-- <a href=""><i class="fa fa-circle text-success"></i> Ver Perfil</a> -->
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">Menú</li>
        <!-- Optionally, you can add icons to the links -->

        <!--
        <li class="active"><a href="#"><i class="fa fa-credit-card"></i> <span>Link</span></a></li>
        <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
        -->

        <li><a href="chat-conectando.php"><i class="fa fa-comment"></i> <span>Conectar <b>chat</b></span></a></li>
        
        
        <?php  if($_SESSION['permiso_chats_ver']) { ?>        
          <li><a href="chat-todos.php"><i class="fa fa-comments"></i> <span>Revisar todos los <b>chats</b></span></a></li>
        <?php } ?>
        

        <?php  if($_SESSION['permiso_noticias']) { ?>
        <li class="treeview">
          <a href="#"><i class="fa fa-newspaper-o"></i> <span><b>Noticias</b></span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="noticias-nuevo.php"><i class="fa fa-file-text"></i>Crear nueva noticia</a></li>
            <li><a href="noticias-administrar.php"><i class="fa fa-list-alt"></i>Administrar noticias</a></li>
          </ul>
        </li>
        <?php } ?>


        
        <?php  if($_SESSION['permiso_vial']) { ?>
        <li class="treeview">
          <a href="#"><i class="fa fa-map-signs"></i> <span><b>Reportes</b> víales</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="vial-nuevo.php"><i class="fa fa-plus-square"></i>Crear nuevo reporte víal</a></li>
            <li><a href="vial-revisar.php"><i class="fa fa-database"></i>Revisar reportes víales</a></li>
          </ul>
        </li>
        <?php } ?>


        <?php  if($_SESSION['permiso_notificaciones']) { ?>
        <li class="treeview">
          <a href="#"><i class="fa fa-bullhorn"></i> <span><b>Notificaciones</b></span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="notificaciones-nuevo.php"><i class="fa fa-plus-square"></i>Lanzar notificación</a></li>
            <!-- <li><a href="notificaciones-revisar.php"><i class="fa fa-database"></i>Ultimas notificaciones</a></li> -->
          </ul>
        </li>
        <?php } ?>

        
        <?php  if($_SESSION['permiso_agenda']) { ?>
        <li class="treeview">
          <a href="#"><i class="fa fa-calendar-o"></i> <span><b>Agenda</b> telefónica</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="agenda-nuevo.php"><i class="fa fa-calendar-plus-o"></i>Nuevo teléfono en agenda</a></li>
            <li><a href="agenda-revisar.php"><i class="fa fa-calendar-minus-o"></i>Administrar agenda</a></li>
          </ul>
        </li>
        <?php } ?>
  
        
        <?php  if($_SESSION['permiso_usuarios']) { ?>
        <li class="treeview">
          <a href="#"><i class="fa fa-users"></i> <span>Sistema de <b>Usuarios</b></span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="usuarios-nuevo.php"><i class="fa fa-user-plus"></i>Crear usuario</a></li>
            <li><a href="usuarios-administrar.php"><i class="fa fa-file-text-o"></i>Administrar usuarios</a></li>
          </ul>
        </li>
        <?php } ?>
        


        <?php  if($_SESSION['permiso_canales']) { ?>
        <li class="treeview">
          <a href="#"><i class="fa fa-th-large"></i> <span><b>Canales</b> de chat</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="canales-nuevo.php"><i class="fa fa-plus-square"></i>Nuevo canal</a></li>
            <li><a href="canales-nuevo-revisar.php"><i class="fa fa-database"></i>Ver canales</a></li>
          </ul>
        </li>
        <?php } ?>

      


        <li><a href="salir.php"><i class="fa fa-close"></i> <span>Salir</span></a></li>

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->

    <?php } ?>

  </aside>