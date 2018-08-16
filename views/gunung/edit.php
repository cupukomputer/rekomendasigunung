<!-- include part theme -->
<?php  include 'views/includes/header.php';?>
<?php  include 'views/includes/navbar.php';?>
<?php  include 'views/includes/sidebar.php';?>
<?php  include 'views/includes/content.php';?>
<!-- end include part theme -->


<?php  include 'views/includes/notification.php';?>


<?php
    $sql = "SELECT * FROM gunung where id=$_GET[id]";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

                    
?>



<form method="post" enctype="multipart/form-data" action="gunung.php?act=update&id=<?php echo $_GET['id']?>">

<!-- general form elements -->
<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Edit Data Wisata Gunung</h3>
    </div>
    <!-- /.card-header -->
    
    <div class="card-body">
        <div class='row'>

            <div class='col-md-12'>

                <div class="form-group">
                    <label for="namagunung">Nama Gunung</label>
                    <input type="text" class="form-control" id="namagunung" name='namagunung' value='<?php echo $row['nama_gunung']?>' >
                </div>

                <div class="form-group">
                    <label for="foto">Foto Saat ini</label>
                    <br>
                    <a href="assets/uploads/<?php echo $row['foto']?>" data-lightbox="image-1" data-title="My caption"><img src='assets/uploads/<?php echo $row['foto']?>' width='100px' height='100px'></a>
                                        
                </div>
                
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <div class="input-group">
                        <div class="custom-file">
                        <input type="file" class="custom-file-input" id="foto" name='foto' accept="image/*">
                        <label class="custom-file-label" for="foto">Choose file</label>
                        </div>
                    </div>
                </div>

            </div>

            <div class='col-md-12'>

                <div class="form-group">
                    <label for="harga">Harga (0-Tak Hingga)</label>
                    <div class='input-group'>
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input type="text" class="form-control" name='harga' id="namagunung" value='<?php echo $row['harga']?>'>
                    </div>
                    
                </div>
                
                <div class="form-group">
                    <label for="fasilitas">Fasilitas (1-100)</label>
                    <input type="text" class="form-control" id="fasilitas" name='fasilitas' value='<?php echo $row['fasilitas']?>'>
                </div>
                
                <div class="form-group">
                    <label for="jamoperasional">Jam Operasional (1-24)</label>
                        
                    <div class='input-group'>
                        <input type="text" class="form-control" id="jamoperasional" placeholder="jamoperasional" name='jamoperasional' value='<?php echo $row['jamoperasional']?>'>
                        <div class="input-group-append">
                            <span class="input-group-text">Jam</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href='?act=back' class="btn btn-success">Kembali</a>
    </div>
          
</div>
<!-- /.card -->

</form>


<!-- include footer part theme -->
<?php  include 'views/includes/endcontent.php';?>
<?php  include 'views/includes/footer.php';?>
<!-- end include footer part theme -->


