<?php

use Cake\Core\Configure; ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo Configure::read('Theme.title'); ?> | <?php echo $this->fetch('title'); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <?php echo $this->Html->css('AdminLTE./bower_components/bootstrap/dist/css/bootstrap.min'); ?>
  <!-- Font Awesome -->
  <?php echo $this->Html->css('AdminLTE./bower_components/font-awesome/css/font-awesome.min'); ?>
  <!-- Ionicons -->
  <?php echo $this->Html->css('AdminLTE./bower_components/Ionicons/css/ionicons.min'); ?>
  <!-- Theme style -->
  <?php echo $this->Html->css('AdminLTE.AdminLTE.min'); ?>
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <?php echo $this->Html->css('AdminLTE.skins/skin-' . Configure::read('Theme.skin') . '.min'); ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <?php echo $this->fetch('css'); ?>

</head>

<body class="hold-transition skin-<?php echo Configure::read('Theme.skin'); ?> sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="<?php echo $this->Url->build('/'); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><?php echo Configure::read('Theme.logo.mini'); ?></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><?php echo Configure::read('Theme.logo.large'); ?></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <?php echo $this->element('nav-top'); ?>
    </header>

    <?php if ($username) : ?>
      <?php echo $this->element('aside-main-sidebar'); ?>
    <?php endif ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <?php echo $this->Flash->render(); ?>
      <?php echo $this->Flash->render('auth'); ?>
      <?php echo $this->fetch('content'); ?>
    </div>
    <?php echo $this->element('footer'); ?>

    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <?php echo $this->Html->script('AdminLTE./bower_components/jquery/dist/jquery.min'); ?>
  <!-- Bootstrap 3.3.7 -->
  <?php echo $this->Html->script('AdminLTE./bower_components/bootstrap/dist/js/bootstrap.min'); ?>
  <!-- AdminLTE App -->
  <?php echo $this->Html->script('AdminLTE.adminlte.min'); ?>
  <!-- Slimscroll -->
  <?php echo $this->Html->script('AdminLTE./bower_components/jquery-slimscroll/jquery.slimscroll.min'); ?>
  <!-- FastClick -->
  <?php echo $this->Html->script('AdminLTE./bower_components/fastclick/lib/fastclick'); ?>

  <?php echo $this->fetch('script'); ?>

  <?php echo $this->fetch('scriptBottom'); ?>

  <script type="text/javascript">
    $(document).ready(function() {
      $(".navbar .menu").slimscroll({
        height: "200px",
        alwaysVisible: false,
        size: "3px"
      }).css("width", "100%");

      var a = $('a[href="<?php echo $this->Url->build() ?>"]');
      if (!a.parent().hasClass('treeview') && !a.parent().parent().hasClass('pagination')) {
        a.parent().addClass('active').parents('.treeview').addClass('active');
      }

    });
  </script>

</body>

</html>
<style>
  .cake-error,
  .cake-debug,
  .notice,
  p.error,
  p.notice {
    display: block;
    clear: both;
    background-repeat: repeat-x;
    margin-bottom: 18px;
    padding: 7px 14px;
    border-radius: 3px;
    box-shadow: 1px 2px 4px rgba(0, 0, 0, 0.24);
  }

  .cake-debug,
  .notice,
  p.notice {
    color: #000000;
    background: #ffcc00;
  }

  .cake-error,
  p.error {
    color: #fff;
    background: #ff0000;
  }

  pre {
    background: none repeat scroll 0% 0% #FFF;
    box-shadow: 1px 2px 4px rgba(0, 0, 0, 0.24);
    margin: 15px 0px;
    color: rgba(0, 0, 0, 0.74);
    padding: 5px;
  }

  .cake-error .cake-stack-trace {
    margin-top: 10px;
  }

  .cake-stack-trace code {
    background: inherit;
    border: 0;
  }

  .cake-code-dump .code-highlight {
    display: block;
    background-color: #FFC600;
  }

  .cake-error a,
  .cake-error a:hover {
    color: #fff;
    text-decoration: underline;
  }

  .checks {
    padding: 30px;
    color: #626262;
    background-color: #B7E3EC;
    border-radius: 3px;
    box-shadow: 1px 2px 4px rgba(0, 0, 0, 0.24);
    margin-bottom: 2em;
  }

  .checks h4 {
    margin-bottom: 1.5rem;
  }

  .checks hr {
    border: 0;
    height: 0;
    border-top: 1px solid rgba(0, 0, 0, 0.1);
    border-bottom: 1px solid rgba(255, 255, 255, 0.3);
  }

  .checks .success,
  .checks .problem {
    margin-left: 10px;
  }

  .checks .success:before,
  .checks .problem:before {
    line-height: 0px;
    font-size: 28px;
    height: 12px;
    width: 12px;
    border-radius: 15px;
    text-align: center;
    vertical-align: middle;
    display: inline-block;
    position: relative;
    left: -11px;
  }

  .checks .success:before {
    content: "✓";
    color: green;
    margin-right: 9px;
  }

  .checks .problem:before {
    content: "✘";
    color: red;
    margin-right: 9px;
  }
</style>