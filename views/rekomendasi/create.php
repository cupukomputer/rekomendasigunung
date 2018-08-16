        <form method='post' action='rekomendasi.php?act=proses'>
            <div class="form-group">
                <label >Harga</label>
                <select class="form-control" name='harga'>
                    <option value='murah'>Murah</option>
                    <option value='sedang'>Sedang</option>
                    <option value='mahal'>Mahal</option>
                </select>
            </div>
            <div class="form-group">
                <label >Fasilitas</label>
                <select class="form-control" name='fasilitas'>
                    <option value='kurang'>Kurang</option>
                    <option value='sedang'>Sedang</option>
                    <option value='lengkap'>Lengkap</option>
                </select>
            </div>

            <div class="form-group">
                <label >Jam Operasional</label>
                <select class="form-control" name='jamoperasional'>
                    <option value='sebentar'>Sebentar</option>
                    <option value='sedang'>Sedang</option>
                    <option value='lama'>Lama</option>
                </select>
            </div>

            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>