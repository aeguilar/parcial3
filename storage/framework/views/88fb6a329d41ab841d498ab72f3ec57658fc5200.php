<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo e(asset('AdminLTE/bootstrap/css/bootstrap.min.css')); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('AdminLTE/dist/css/AdminLTE.min.css')); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo e(asset('AdminLTE/plugins/iCheck/square/blue.css')); ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>UEES</b>Sistemas Expertos</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Inicio de sesion</p>
<?php echo Form::open(['url' => '/Inicio']); ?>


   <!-- <form action="/Inicio/form" method="post"> -->
      <div class="form-group has-feedback">
        <input type="text" class="form-control" id="InicioSesion" name="InicioSesion" placeholder="Nombre de usuairio" required="required">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" id="Clave" name="Clave" class="form-control" placeholder="Contraseña" required="required">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
       <select class="form-control" name="perfil">
                    <option selected="selected">Seleccionar perfil</option>
                 
 <?php $__currentLoopData = $perfiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $perfil): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
     <option value="<?php echo e($perfil->IdPerfil); ?>"><?php echo e($perfil->Nombre); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                  </select>
               
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Recordar contraseña
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Acceder</button>
        </div>
        <!-- /.col -->
      </div>
    <!-- </form> -->

    
<?php echo Form::close(); ?>

   
  

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo e(asset('AdminLTE/plugins/jQuery/jquery-2.2.3.min.js')); ?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src=".<?php echo e(asset('AdminLTE/bootstrap/js/bootstrap.min.js')); ?>"></script>
<!-- iCheck -->
<script src="<?php echo e(asset('AdminLTE/plugins/iCheck/icheck.min.js')); ?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
