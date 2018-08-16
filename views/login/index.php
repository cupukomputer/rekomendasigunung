

<!-- include part theme -->
<?php  include 'views/includes/header.php';?>
<!-- include part theme -->
<?php  include 'views/includes/navbarfront.php';?>


<div class="login-box">
<?php  include 'views/includes/notification.php';?>
  <div class="login-logo">
    LOGIN
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      

      <form action="login.php?act=login" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name='username' placeholder="Username">
          
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name='password' placeholder="Password">
          
        </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      

      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->


                 


<?php  include 'views/includes/footer.php';?>
<!-- end include footer part theme -->