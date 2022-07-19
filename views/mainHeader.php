   <i class="btn-up fa fa-arrow-circle-o-up hidden-xs"></i>
   <header class="full-reset header">

     <nav class="full-reset navigation">
       <ul class="full-reset list-unstyled">
         <li><a href="<?php echo constant('URL'); ?>main">Inicio</a></li>
         <?php
          if (!isset($_SESSION)) {
            session_start();
          }
          if (isset($_SESSION['usuario'])) {
            echo '<li><a href="' . constant('URL') . 'Administrador/cerrarSesion">Cerrar Sesión</a></li>';
          } else {
            echo '<li><a href="' . constant('URL') . 'main/Login">Iniciar Sesión</a></li>';
          }
          ?>
       </ul>
     </nav>

     <a href="#" class="hidden-sm hidden-md hidden-lg pull-right button-menu-mobile show-close-menu-m"><i class="fa fa-ellipsis-v"></i></a>
   </header>