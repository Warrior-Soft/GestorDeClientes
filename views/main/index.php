<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Institucion</title>
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/template/css/font-awesome.min.css" />
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/template/css/normalize.css" />
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/template/css/bootstrap.min.css" />
  <link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow" rel="stylesheet" type="text/css" />
  <link href="http://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/template/css/style.css" />
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script>
    window.jQuery ||
      document.write('<script src="<?php echo constant('URL'); ?>public/template/js/jquery-1.11.2.min.js"><\/script>');
  </script>
  <script src="<?php echo constant('URL'); ?>public/template/js/modernizr.js"></script>
  <script src="<?php echo constant('URL'); ?>public/template/s/bootstrap.min.js"></script>
  <script src="<?php echo constant('URL'); ?>public/template/js/main.js"></script>
</head>

<body>
  <?php require 'views/mainHeader.php' ?>
  <section class="full-reset font-cover" style="background-image: url(<?php echo constant('URL'); ?>public/template/assets/img/fondo.jpg)">
    <div class="full-reset" style="
          height: 100%;
          background-color: rgba(255, 255, 255, 0.6);
          padding: 60px 0;
        ">
      <figure class="Logo-Ins-Index">
        <img src="<?php echo constant('URL'); ?>public\custom\images\logo.png" alt="Logo" class="img-responsive" />
      </figure>
      <p class="lead text-center">
        Esta es una página web para manejar clientes y sus direcciones, esta página fue realizada por mi Brayan Guerrero, 
        como prueba técnica para OrionTek.<br>
        Para poder acceder a la pagina, necesitan loguear con el usuario: admin, clave: admin.
      </p>
    </div>
  </section>
  <div class="divider-general"></div>
  <?php require 'views/footer.php' ?>
</body>

</html>