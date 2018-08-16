<form role="form" method='post' action="kriteria.php?act=update">
<div class="card">
    <div class="card-header">
        <h2 class="card-title text-center">Harga</h2>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        
        <div class="form-group">
            <label for="exampleInputEmail1">Murah</label>
            <input type="text" name='hargamurah' class="form-control" value="<?php $data=getsettingkriteria('harga','murah'); echo $data['nilai_maksimal'];?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Sedang</label>
            <div class='row'>
                <div class='col-md-5'>

                    <input type="text" name='hargasedangminimal' class="form-control" value="<?php $data=getsettingkriteria('harga','sedang'); echo $data['nilai_minimal'];?>">

                </div>

                <div class='col-md-2'>
                    <center><label >Sampai</label><center>
                </div>


                <div class='col-md-5'>

                    <input type="text" name='hargasedangmaksimal' class="form-control" value="<?php $data=getsettingkriteria('harga','sedang'); echo $data['nilai_maksimal'];?>">

                </div>
            </div>
            
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Mahal</label>
            <input type="text" name='hargamahal' class="form-control" value="<?php $data=getsettingkriteria('harga','mahal'); echo $data['nilai_minimal'];?>">
        </div>
          
    </div>
    
</div>
<!-- /.card-body -->

<!-- /card-body -->
<div class="card">
    <div class="card-header">
        <h2 class="card-title text-center">Fasilitas</h2>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    
        <div class="form-group">
            <label for="exampleInputEmail1">Kurang</label>
            <input type="text" name='fasilitaskurang' class="form-control" value="<?php $data=getsettingkriteria('fasilitas','kurang'); echo $data['nilai_maksimal'];?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Sedang</label>
            <div class='row'>
                <div class='col-md-5'>

                    <input type="text" name='fasilitassedangminimal' class="form-control" value="<?php $data=getsettingkriteria('fasilitas','sedang'); echo $data['nilai_minimal'];?>">

                </div>

                <div class='col-md-2'>
                    <center><label >Sampai</label><center>
                </div>


                <div class='col-md-5'>

                    <input type="text" name='fasilitassedangmaksimal' class="form-control" value="<?php $data=getsettingkriteria('fasilitas','sedang'); echo $data['nilai_maksimal'];?>">

                </div>
            </div>
            
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Lengkap</label>
            <input type="text" name='fasilitaslengkap' class="form-control" value="<?php $data=getsettingkriteria('fasilitas','lengkap'); echo $data['nilai_minimal'];?>">
        </div>
        
    </div>
    
</div>
<!-- /.card-body -->

<!-- /card-body -->
<div class="card">
    <div class="card-header">
        <h2 class="card-title text-center">Jam Operasional</h2>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        
        <div class="form-group">
            <label for="exampleInputEmail1">Sebentar</label>
            <input type="text" name='jamoperasionalsebentar' class="form-control" value="<?php $data=getsettingkriteria('jam operasional','sebentar'); echo $data['nilai_maksimal'];?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Sedang</label>
            <div class='row'>
                <div class='col-md-5'>

                    <input type="text" name='jamoperasionalsedangminimal' class="form-control" value="<?php $data=getsettingkriteria('jam operasional','sedang'); echo $data['nilai_minimal'];?>">

                </div>

                <div class='col-md-2'>
                    <center><label >Sampai</label><center>
                </div>


                <div class='col-md-5'>

                    <input type="text" name='jamoperasionalsedangmaksimal' class="form-control" value="<?php $data=getsettingkriteria('jam operasional','sedang'); echo $data['nilai_maksimal'];?>">

                </div>
            </div>
            
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Lama</label>
            <input type="text" name='jamoperasionallama' class="form-control" value="<?php $data=getsettingkriteria('jam operasional','lama'); echo $data['nilai_minimal'];?>">
        </div>
                        
    </div>
    
</div>
<!-- /.card-body -->



<!-- /card-body -->
<div class="card">
    
    <div class="card-body">
        
    <center><button type="submit" class="btn btn-primary">Simpan</button></center>
        
        
    </div>


    
    
</div>
<!-- /.card-body -->


</form>
        
          

