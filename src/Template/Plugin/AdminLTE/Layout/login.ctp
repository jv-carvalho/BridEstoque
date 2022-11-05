<?php use Cake\Core\Configure; ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo Configure::read('Theme.title'); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <?php echo $this->Html->css('/bower_components/bootstrap/dist/css/bootstrap.min'); ?>
  <!-- Font Awesome -->
  <?php echo $this->Html->css('/bower_components/font-awesome/css/font-awesome.min'); ?>
  <!-- Ionicons -->
  <?php echo $this->Html->css('/bower_components/Ionicons/css/ionicons.min'); ?>
  <!-- iCheck -->
  <?php echo $this->Html->css('/plugins/iCheck/square/blue'); ?>

  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <?php echo $this->Html->css('/assets/login/css/util'); ?>
  <?php echo $this->Html->css('/assets/login/css/main'); ?>
<!--===============================================================================================-->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <?php echo $this->fetch('css'); ?>

</head><body style="background-color: #666666;">
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-form validate-form">
          <h1 class="p-b-43 text-center"><img src="<?= $this->Url->build('/img/logo.png'); ?>" height="100" alt="Logo Brid"></h1>
          <span class="login100-form-title p-b-43">
            Entre com seus dados para iniciar sua sessão no <b>Brid<strong>Estoque</strong></b>.
          </span>

          <?php echo $this->fetch('content'); ?>
          
        </div>

        <div class="login100-more" style="background-image: url('<?= $this->Url->build('/img/back.jpg'); ?>');">
        </div>
      </div>
    </div>
  </div>
<!--===============================================================================================-->
  <?php echo $this->Html->script('/assets/login/vendor/jquery/jquery-3.2.1.min'); ?>
<!--===============================================================================================-->
  <?php echo $this->Html->script('/assets/login/vendor/bootstrap/js/popper'); ?>
  <?php echo $this->Html->script('/assets/login/vendor/bootstrap/js/bootstrap.min'); ?>
<!--===============================================================================================-->
  <?php echo $this->Html->script('/assets/login/js/main'); ?>

</body>

</html>