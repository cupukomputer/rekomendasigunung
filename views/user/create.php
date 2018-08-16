<!-- include part theme -->
<?php  include 'views/includes/header.php';?>
<?php  include 'views/includes/navbar.php';?>
<?php  include 'views/includes/sidebar.php';?>
<?php  include 'views/includes/content.php';?>
<!-- end include part theme -->


<?php  include 'views/includes/notification.php';?>



<form method="post" enctype="multipart/form-data" action="user.php?act=store">

<!-- general form elements -->
<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Buat Data User</h3>
    </div>
    <!-- /.card-header -->
    
    <div class="card-body">
        

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name='username' placeholder="Username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name='password' placeholder="Password">
        </div>
        
        
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href='?act=back' class='btn btn-success'>Kembali</a>
    </div>
          
</div>
<!-- /.card -->

</form>


<!-- include footer part theme -->
<?php  include 'views/includes/endcontent.php';?>
<?php  include 'views/includes/footer.php';?>
<!-- end include footer part theme -->