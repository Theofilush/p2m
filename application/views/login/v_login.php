<!DOCTYPE html>
<html lang="en">
  <head> 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo base_url() ?>asett/images/favicon.png" type="image/ico" />

    <title>Universitas Pembangunan Jaya </title>
    
    <link href="<?php echo base_url() ?>asett/dist/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>asett/dist/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>asett/plugins/nprogress/nprogress.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>asett/plugins/animate/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>asett/dist/css/custom.css" rel="stylesheet">
  </head>

  <body class="login" style="height: auto;">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="<?php echo site_url('login/aksi_login'); ?>" method="post">
              <h1>Login Form</h1>
              <img src="<?php echo base_url() ?>asett/images/logo.png">
              <p style="color:red;text-align:center;padding: 10px;"><?php echo $this->session->flashdata('notification')?></p>
              <div class="">
                <input type="text" name="username" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>                
                <button type="submit" class="btn btn-primary btn-block btn-flat submit" value="Login">Masuk</button>                
              </div>

              <div class="clearfix"></div>

              <!--<div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>-->
            </form>
          </section>
        </div>

        <!--<div id="register" class="animate form registration_form">
          <section class="login_content">
            <form action="<?php echo site_url('login/aksi_login'); ?>" method="post">
              <h1>Create Account</h1>
              <div>
                <input type="text" name="username" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" name="password" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" name="cpassword" class="form-control" placeholder="Password" required="" />
              </div>
              <div>                
                <button type="submit" class="btn btn-default submit" value="Login">Masuk</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>-->
      </div>
    </div>
  </body>
</html>
