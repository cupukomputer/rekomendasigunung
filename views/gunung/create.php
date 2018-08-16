


<form method="post" enctype="multipart/form-data" action="gunung.php?act=store">

    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Data Wisata Gunung</h3>
        </div>
        <!-- /.card-header -->
        
        <div class="card-body">
            <div class='row'>

                <div class='col-md-6'>

                    <div class="form-group">
                        <label for="namagunung">Nama Gunung</label>
                        <input type="text" class="form-control" id="namagunung" name='namagunung' placeholder="Nama Gunung">
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

                <div class='col-md-6'>

                    <div class="form-group">
                        <label for="harga">Harga (0-Tak Hingga)</label>
                        <div class='input-group'>
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="text" class="form-control" name='harga' id="namagunung" placeholder="Harga">
                        </div>
                        
                    </div>
                    
                    <div class="form-group">
                        <label for="fasilitas">Fasilitas (1-100)</label>
                        <input type="text" class="form-control" id="fasilitas" placeholder="Fasilitas" name='fasilitas'>
                    </div>
                    
                    <div class="form-group">
                        <label for="jamoperasional">Jam Operasional (1-24)</label>
                            
                        <div class='input-group'>
                            <input type="text" class="form-control" id="jamoperasional" placeholder="jamoperasional" name='jamoperasional'>
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
        </div>
              
    </div>
    <!-- /.card -->

</form>