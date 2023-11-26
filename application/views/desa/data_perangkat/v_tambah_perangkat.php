<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 "><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 90%">
        <div class="card-body">
            <form method="POST" action="<?php echo base_url('desa/perangkat/tambah_data_aksi/') ?>">

                <div class="row">
                    <div class=" col-6 mb-4 text-center">
                        <label><strong>Nama Desa</strong></label>
                        <input type="hidden" name="tanggal_perangkat" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                        <input type="text" value="<?= $this->session->userdata('nama_desa'); ?>" class="form-control text-center" readonly>
                    </div>
                    <div class=" col-6 mb-4 text-center">
                        <label><strong>Nama Pengirim</strong></label>
                        <input type="text" name="id_akun" value="<?= $this->session->userdata('nama_pengguna'); ?>" class="form-control text-center" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_perangkat" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tgllahir_perangkat" class="form-control" required max="<?php echo date('Y-m-d', strtotime('-20 years')) ?>">
                </div>

                <div class="form-group">
                    <label>Jabatan</label>
                    <select name="jabatan_perangkat" class="form-control" required>
                        <option value="">--- Pilih Jabatan ---</option>
                        <option value="Kepala Desa">Kepala Desa</option>
                        <option value="Sekertaris">Sekertaris</option>
                        <option value="Kepala Urusan Umum & Perencanaan">Kepala Urusan Umum & Perencanaan</option>
                        <option value="Kepala Urusan Keuangan">Kepala Urusan Keuangan</option>
                        <option value="Kasi Pemerintahan">Kasi Pemerintahan</option>
                        <option value="Kasi Kesejahteraan dan Pelayanan">Kasi Kesejahteraan dan Pelayanan</option>
                        <option value="Kepala Dusun 1">Kepala Dusun 1</option>
                        <option value="Kepala Dusun 2">Kepala Dusun 2</option>
                        <option value="Kepala Dusun 3">Kepala Dusun 3</option>
                        <option value="Kepala Dusun 4">Kepala Dusun 4</option>
                        <option value="Kepala Dusun 5">Kepala Dusun 5</option>
                        <option value="Kepala Dusun 6">Kepala Dusun 6</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>No SK</label>
                    <input type="text" name="nosk_perangkat" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Periode Jabatan</label>
                    <div class="row">
                        <div class="col-5">
                            <input type="number" name="periodeawal_perangkat" class="form-control" placeholder="Tahun" required>
                        </div>
                        <div class="col-2">
                            <p>-</p>
                        </div>
                        <div class="col-5">
                            <input type="number" name="periodeakhir_perangkat" class="form-control" placeholder="Tahun" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="number" name="telp_perangkat" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">Submit</button>

            </form>
        </div>
    </div>

</div>