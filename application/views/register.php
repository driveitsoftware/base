<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title>tiqs | Register</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url(); ?>tiqscss/tiqscss.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url(); ?>tiqscss/tiqsballoontip.css" rel="stylesheet" type="text/css" />

      <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
      <!-- <script type="text/javascript" src="assets/dist/js/tooltipster.bundle.min.js"></script> -->
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

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


      <!-- Google Font -->

      <!--<link rel="stylesheet" type="text/css" href=<?php echo base_url(); ?>tiqscss/Fonts/692088/bd45538f-4200-4946-b177-02de8337032d.eot?#iefix" />-->

      <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact+Gothic"> -->

      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact+Gothic:300,400,600,700,300italic,400italic,600italic">
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
            <p  style="font-family:'Century Gothic W01'; font-size:300%; text-align: center">Register</p>
<!--<p style="font-family: 'Century-Gothic'" >tiqs Register</p>-->
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
            <div class="alert alert-danger alert-dismissable" id="mydivs1">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $error; ?>                    
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
        <form action="<?php echo base_url(); ?>login/register" method="post">

            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Full name" name="name" required />
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email" name="email" required />
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="tel" class="form-control" placeholder="Mobile" name="mobile" required />
                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password" required />
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" required />
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
                <div class="login-box-body">
                    <p  style="font-family:'Century Gothic W01'; font-size:300%; text-align: center">I use flow by tiqs ...</p>

                    <ul>
                        <li>
                            <input type="radio" id="b-option" name="selector" value="2" />
                            <label for="b-option" data-toggle="tooltip" data-placement="bottom" title="Click/select this when you use tiqs at your event or in your restaurant and/or bar. You can immediately collect e-mail addresses to engage with your visitors. A proven way in customer retention." >for my Events, Restaurant, Bar, Beachclub</label>

                            <div class="check"><div class="inside"></div></div>
                        </li>

                        <li>
                            <input type="radio" id="a-option" name="selector" value="1" />
                            <label for="a-option" data-toggle="tooltip" data-placement="bottom" title="Click/select this when you use tiqs at your shop or store. You collect immediately e-mail addresses to engage with your visitors. A proven way for customer retention." >for my shop or store,</label>

                            <div class="check"><div class="inside"></div></div>
                        </li>


                        <li>
                            <input type="radio" id="c-option" name="selector" value="2">
                            <label for="c-option" data-toggle="tooltip" data-placement="bottom" title="Click/select this when you use tiqs at your Hotel, B&B or Vacation Rental. You can immediately collect e-mail addresses to engage with your visitors. A proven way in customer retention." >for my Hotel, B&B or Vacation Rental,</label>
                            <div class="check"><div class="inside"></div></div>
                        </li>

                        <li>
                            <input type="radio" id="d-option" name="selector" value="3">
                            <label for="d-option" data-toggle="tooltip" data-placement="bottom" title="Click/select to become a Wolf-Pack member of the flowteam. Earn continuously money with tiqs." >as tiqs Ambassador (Wolf-Pack).</label>
                            <div class="check"><div class="inside"></div></div>
                        </li>

                    </ul>
                <br>

            </div>

            <div class="row">
              <div class="col-xs-8">
              </div><!-- /.col -->
            <div style="text-align: center">
                <input type="submit" class="myButtonOrange" value="Sign me up..." />
            </div>
        </form>
            <br>
            <div class="col-xs-8">
                <a href="<?php echo base_url() ?>" style="font-family:Century Gothic W01" >Back to login</a><br>
            </div>

        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>