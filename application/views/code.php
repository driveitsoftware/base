<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title>Tiqs | Activation code</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url(); ?>tiqscss/tiqscss.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

      <script type="text/javascript">
          var MTUserId='f98384f2-47d2-4642-aecf-2e7d78ccc4f4';
          var MTFontIds = new Array();

          MTFontIds.push("692088"); // Century Gothic™ W01 Regular
          (function() {
              var mtTracking = document.createElement('script');
              mtTracking.type='text/javascript';
              mtTracking.async='true';
              mtTracking.src='mtiFontTrackingCode.js';

              (document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(mtTracking);
          })();
      </script>

      <style type="text/css">
          @import url("https://fast.fonts.net/lt/1.css?apiType=css&c=f98384f2-47d2-4642-aecf-2e7d78ccc4f4&fontids=692088");
          @font-face{
              font-family:"Century Gothic W01";
              src:url("<?php echo base_url(); ?>tiqscss/Fonts/692088/bd45538f-4200-4946-b177-02de8337032d.eot?#iefix");
              src:url("<?php echo base_url(); ?>tiqscss/Fonts/692088/bd45538f-4200-4946-b177-02de8337032d.eot?#iefix") format("eot"),url("<?php echo base_url(); ?>tiqscss/Fonts/692088/700cfd4c-3384-4654-abe1-aa1a6e8058e4.woff2") format("woff2"),url("<?php echo base_url(); ?>tiqscss/Fonts/692088/9908cdad-7524-4206-819e-4f345a666324.woff") format("woff"),url("<?php echo base_url(); ?>tiqscss/Fonts/692088/b710c26a-f1ae-4fb8-a9fe-570fd829cbf1.ttf") format("truetype");
          }
      </style>

      <script>
          $(function () {
              $('[data-toggle="tooltip"]').tooltip({'delay': { show: 50, hide: 30 }
              });
          })

      </script>

  </head>
  <body>
  <div class="container">
    <!-- <body class="hold-transition login-page"> -->
    <div class="login-box">
      <div class="login-logo">
          <img border="0" src="<?php echo base_url(); ?>tiqsimg/tiqslogo.png" alt="tiqs" width="370" height="370" />
        <!-- <a href="#"><b>tiqs</b><br>flow</a>-->
      </div><!-- /.login-logo -->

      <div class="login-box-body">
        <!-- <p class="login-box-msg" style="font-weight: bold font-family:"Century Gothic" font-size: larger">Login</p> -->
        <p  style="font-family:'Century Gothic W01'; font-size:300%; text-align: center">Verification</p>

          <?php $this->load->helper('form'); ?>
          <?php echo $this->session->flashdata('fail'); ?>
          <div class="row">
              <div class="col-md-12" id="mydivs">
                  <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
              </div>
              <script>
                  setTimeout(function() {
                      $('#mydivs').hide('fade');
                  }, 5000);
              </script>

          </div>

          <?php
        $this->load->helper('form');
        $error = $this->session->flashdata('error');
        if($error)
        {
            ?>
            <div id="mydivs1">
            <div class="alert alert-danger alert-dismissable" id="mydivs">
                <button id="mydevs" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $error; ?>
            </div>
            </div>

            <script>
                setTimeout(function() {
                    $('#mydivs1').hide('fade');
                }, 5000);
            </script>

        <?php }

        $success = $this->session->flashdata('success');
        if($success)
        {
            ?>
            <div class="alert alert-success alert-dismissable" id="mydivs2">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $success; ?>
            </div>
            <script>
                setTimeout(function() {
                    $('#mydivs2').hide('fade');
                }, 5000);
            </script>

        <?php } ?>


          <form action="<?php echo base_url(); ?>loginMe" method="post">

              <div class="form-group has-feedback">
                  <input type="password" class="form-control" placeholder="Code" name="code" required />
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div>


          <div class="row">

              <!--
              <div class="col-xs-2">
                  <div class="checkbox icheck">
                     <label>
                      <input type="checkbox"> Remember Me
                    </label>
                  </div>
              </div>
              -->

              <!-- <div class="col-xs-8"> -->
                  <!-- <input type="submit" class="btn btn-primary btn-block btn-flat" value="Sign In" /> -->
              <br>
              <div style="text-align: center">
                      <input type="submit" class="myButtonOrange" value="Check me.." />
                  </div>
                  <div>
                      <br>
                  </div>

                  </div>


        </form>
        <br>
              <a href="<?php echo base_url() ?>login" style="font-family:'Century Gothic' " >back to login</a><br>




      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>