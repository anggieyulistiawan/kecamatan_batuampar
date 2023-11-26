<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 "><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 90%">
        <div class="card-body">
            <form method="POST" action="<?php echo base_url('admin/rt/update_data_aksi/') ?>" enctype="multipart/form-data>">

                <div class="form-group">
                    <label><strong>Nama Desa</strong></label>
                    <input type="text" name="" value="Desa <?php echo $rt->nama_desa ?>" class="form-control" placeholder="" readonly>
                </div>

                <div class="form-group">
                    <label>Nama Dusun</label>
                    <input type="hidden" name="id_rt" class="form-control" value="<?php echo $rt->id_rt ?>">
                    <input type="hidden" name="tanggal_rt" class="form-control" value="<?php echo $rt->tanggal_rt ?>">
                    <input type="text" name="dusun_rt" class="form-control" required value="<?php echo $rt->dusun_rt ?>">
                </div>

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_rt" class="form-control" required value="<?php echo $rt->nama_rt ?>">
                </div>

                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tgllahir_rt" class="form-control" required value="<?php echo $rt->tgllahir_rt ?>" max="<?php echo date('Y-m-d', strtotime('-20 years')) ?>">

                </div>

                <div class="form-group">
                    <label>Jabatan</label>
                    <select name="jabatan_rt" class="form-control" required>
                        <option <?php echo $rt->jabatan_rt == '' ? 'selected' : null ?> value="">--- Pilih Jabatan ---</option>
                        <option <?php echo $rt->jabatan_rt == 'RT. 01' ? 'selected' : null ?> value="RT. 01">RT. 01</option>
                        <option <?php echo $rt->jabatan_rt == 'RT. 02' ? 'selected' : null ?> value="RT. 02">RT. 02</option>
                        <option <?php echo $rt->jabatan_rt == 'RT. 03' ? 'selected' : null ?> value="RT. 03">RT. 03</option>
                        <option <?php echo $rt->jabatan_rt == 'RT. 04' ? 'selected' : null ?> value="RT. 04">RT. 04</option>
                        <option <?php echo $rt->jabatan_rt == 'RT. 05' ? 'selected' : null ?> value="RT. 05">RT. 05</option>
                        <option <?php echo $rt->jabatan_rt == 'RT. 06' ? 'selected' : null ?> value="RT. 06">RT. 06</option>
                        <option <?php echo $rt->jabatan_rt == 'RT. 07' ? 'selected' : null ?> value="RT. 07">RT. 07</option>
                        <option <?php echo $rt->jabatan_rt == 'RT. 08' ? 'selected' : null ?> value="RT. 08">RT. 08</option>
                        <option <?php echo $rt->jabatan_rt == 'RT. 09' ? 'selected' : null ?> value="RT. 09">RT. 09</option>
                        <option <?php echo $rt->jabatan_rt == 'RT. 10' ? 'selected' : null ?> value="RT. 10">RT. 10</option>
                        <option <?php echo $rt->jabatan_rt == 'RT. 11' ? 'selected' : null ?> value="RT. 11">RT. 11</option>
                        <option <?php echo $rt->jabatan_rt == 'RT. 12' ? 'selected' : null ?> value="RT. 12">RT. 12</option>
                        <option <?php echo $rt->jabatan_rt == 'RT. 13' ? 'selected' : null ?> value="RT. 13">RT. 13</option>
                        <option <?php echo $rt->jabatan_rt == 'RT. 14' ? 'selected' : null ?> value="RT. 14">RT. 14</option>
                        <option <?php echo $rt->jabatan_rt == 'RT. 15' ? 'selected' : null ?> value="RT. 15">RT. 15</option>
                        <option <?php echo $rt->jabatan_rt == 'RT. 16' ? 'selected' : null ?> value="RT. 16">RT. 16</option>
                        <option <?php echo $rt->jabatan_rt == 'RT. 17' ? 'selected' : null ?> value="RT. 17">RT. 17</option>
                        <option <?php echo $rt->jabatan_rt == 'RT. 18' ? 'selected' : null ?> value="RT. 18">RT. 18</option>
                        <option <?php echo $rt->jabatan_rt == 'RT. 19' ? 'selected' : null ?> value="RT. 19">RT. 19</option>
                        <option <?php echo $rt->jabatan_rt == 'RT. 20' ? 'selected' : null ?> value="RT. 20">RT. 20</option>
                        <option <?php echo $rt->jabatan_rt == 'RT. 21' ? 'selected' : null ?> value="RT. 21">RT. 21</option>
                        <option <?php echo $rt->jabatan_rt == 'RT. 22' ? 'selected' : null ?> value="RT. 22">RT. 22</option>
                        <option <?php echo $rt->jabatan_rt == 'RT. 23' ? 'selected' : null ?> value="RT. 23">RT. 23</option>
                        <option <?php echo $rt->jabatan_rt == 'RT. 24' ? 'selected' : null ?> value="RT. 24">RT. 24</option>
                        <option <?php echo $rt->jabatan_rt == 'RT. 25' ? 'selected' : null ?> value="RT. 25">RT. 25</option>
                        <option <?php echo $rt->jabatan_rt == 'RT. 26' ? 'selected' : null ?> value="RT. 26">RT. 26</option>
                        <option <?php echo $rt->jabatan_rt == 'RT. 27' ? 'selected' : null ?> value="RT. 27">RT. 27</option>
                        <option <?php echo $rt->jabatan_rt == 'RT. 28' ? 'selected' : null ?> value="RT. 28">RT. 28</option>
                        <option <?php echo $rt->jabatan_rt == 'RT. 29' ? 'selected' : null ?> value="RT. 29">RT. 29</option>
                        <option <?php echo $rt->jabatan_rt == 'RT. 30' ? 'selected' : null ?> value="RT. 30">RT. 30</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>No Surat Kerja</label>
                    <input type="text" name="nosk_rt" class="form-control" required value="<?php echo $rt->nosk_rt ?>">
                </div>

                <div class="form-group">
                    <label>Periode Jabatan</label>
                    <div class="row">
                        <div class="col-5">
                            <input type="number" name="periodeawal_rt" class="form-control" placeholder="Tahun" required value="<?php echo $rt->periodeawal_rt ?>">
                        </div>
                        <div class="col-2">
                            <p>-</p>
                        </div>
                        <div class="col-5">
                            <input type="number" name="periodeakhir_rt" class="form-control" placeholder="Tahun" required value="<?php echo $rt->periodeakhir_rt ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>No.Telepon</label>
                    <input type="number" name="telp_rt" class="form-control" required value="<?php echo $rt->telp_rt ?>">
                </div>

                <button type="submit" class="btn btn-success">Submit</button>

            </form>
        </div>
    </div>
</div>