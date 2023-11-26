<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 "><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 90%">
        <div class="card-body">
            <form method="POST" action="<?php echo base_url('desa/rt/tambah_data_aksi/') ?>">

                <div class="row">
                    <div class=" col-6 mb-4 text-center">
                        <label><strong>Nama Desa</strong></label>
                        <input type="hidden" name="tanggal_rt" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                        <input type="text" value="<?= $this->session->userdata('nama_desa'); ?>" class="form-control text-center" readonly>
                    </div>
                    <div class=" col-6 mb-4 text-center">
                        <label><strong>Nama Pengirim</strong></label>
                        <input type="text" name="id_akun" value="<?= $this->session->userdata('nama_pengguna'); ?>" class="form-control text-center" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label>Nama Dusun</label>
                    <input type="text" name="dusun_rt" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_rt" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tgllahir_rt" class="form-control" required max="<?php echo date('Y-m-d', strtotime('-20 years')) ?>">
                </div>

                <div class="form-group">
                    <label>Jabatan</label>
                    <select name="jabatan_rt" class="form-control" required>
                        <option value="">--- Pilih Jabatan ---</option>
                        <option value="RT. 01">RT. 01</option>
                        <option value="RT. 02">RT. 02</option>
                        <option value="RT. 03">RT. 03</option>
                        <option value="RT. 04">RT. 04</option>
                        <option value="RT. 05">RT. 05</option>
                        <option value="RT. 06">RT. 06</option>
                        <option value="RT. 07">RT. 07</option>
                        <option value="RT. 08">RT. 08</option>
                        <option value="RT. 09">RT. 09</option>
                        <option value="RT. 10">RT. 10</option>
                        <option value="RT. 11">RT. 11</option>
                        <option value="RT. 12">RT. 12</option>
                        <option value="RT. 13">RT. 13</option>
                        <option value="RT. 14">RT. 14</option>
                        <option value="RT. 15">RT. 15</option>
                        <option value="RT. 16">RT. 16</option>
                        <option value="RT. 17">RT. 17</option>
                        <option value="RT. 18">RT. 18</option>
                        <option value="RT. 19">RT. 19</option>
                        <option value="RT. 20">RT. 20</option>
                        <option value="RT. 21">RT. 21</option>
                        <option value="RT. 22">RT. 22</option>
                        <option value="RT. 23">RT. 23</option>
                        <option value="RT. 24">RT. 24</option>
                        <option value="RT. 25">RT. 25</option>
                        <option value="RT. 26">RT. 26</option>
                        <option value="RT. 27">RT. 27</option>
                        <option value="RT. 28">RT. 28</option>
                        <option value="RT. 29">RT. 29</option>
                        <option value="RT. 30">RT. 30</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>No SK</label>
                    <input type="text" name="nosk_rt" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Periode Jabatan</label>
                    <div class="row">
                        <div class="col-5">
                            <input type="number" name="periodeawal_rt" placeholder="Tahun" class="form-control" required>
                        </div>
                        <div class="col-2">
                            <p>-</p>
                        </div>
                        <div class="col-5">
                            <input type="number" name="periodeakhir_rt" placeholder="Tahun" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="number" name="telp_rt" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">Submit</button>

            </form>
        </div>
    </div>

</div>