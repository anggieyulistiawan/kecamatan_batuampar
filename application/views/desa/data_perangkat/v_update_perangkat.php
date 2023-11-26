<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 "><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 90%">
        <div class="card-body">
            <?php foreach ($perangkat as $kat) : ?>
                <form method="POST" action="<?php echo base_url('desa/perangkat/update_data_aksi/') ?>" enctype="multipart/form-data>">

                    <div class="row">
                        <div class=" col-6 mb-4 text-center">
                            <label><strong>Nama Desa</strong></label>
                            <input type="hidden" name="id_perangkat" class="form-control" value="<?php echo $kat->id_perangkat ?>">
                            <input type="hidden" name="tanggal_perangkat" class="form-control" value="<?php echo $kat->tanggal_perangkat ?>">
                            <input type="text" value="<?= $this->session->userdata('nama_desa'); ?>" class="form-control text-center" readonly>
                        </div>
                        <div class=" col-6 mb-4 text-center">
                            <label><strong>Nama Pengirim</strong></label>
                            <input type="text" name="id_akun" value="<?= $this->session->userdata('nama_pengguna'); ?>" class="form-control text-center" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama_perangkat" class="form-control" required value="<?php echo $kat->nama_perangkat ?>">
                    </div>

                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgllahir_perangkat" class="form-control" required value="<?php echo $kat->tgllahir_perangkat ?>" max="<?php echo date('Y-m-d', strtotime('-20 years')) ?>">
                    </div>

                    <div class="form-group">
                        <label>Jabatan</label>
                        <select name="jabatan_perangkat" class="form-control" required>
                            <option <?php echo $kat->jabatan_perangkat == '' ? 'selected' : null ?> value="">--- Pilih Jabatan ---</option>
                            <option <?php echo $kat->jabatan_perangkat == 'Kepala Desa' ? 'selected' : null ?> value="Kepala Desa">Kepala Desa</option>
                            <option <?php echo $kat->jabatan_perangkat == 'Sekertaris' ? 'selected' : null ?> value="Sekertaris">Sekertaris</option>
                            <option <?php echo $kat->jabatan_perangkat == 'Kepala Urusan Umum & Perencanaan' ? 'selected' : null ?> value="Kepala Urusan Umum & Perencanaan">Kepala Urusan Umum & Perencanaan</option>
                            <option <?php echo $kat->jabatan_perangkat == 'Kepala Urusan Keuangan' ? 'selected' : null ?> value="Kepala Urusan Keuangan">Kepala Urusan Keuangan</option>
                            <option <?php echo $kat->jabatan_perangkat == 'Kasi Pemerintahan' ? 'selected' : null ?> value="Kasi Pemerintahan">Kasi Pemerintahan</option>
                            <option <?php echo $kat->jabatan_perangkat == 'Kasi Kesejahteraan dan Pelayanan' ? 'selected' : null ?> value="Kasi Kesejahteraan dan Pelayanan">Kasi Kesejahteraan dan Pelayanan</option>
                            <option <?php echo $kat->jabatan_perangkat == 'Kepala Dusun 1' ? 'selected' : null ?> value="Kepala Dusun 1">Kepala Dusun 1</option>
                            <option <?php echo $kat->jabatan_perangkat == 'Kepala Dusun 2' ? 'selected' : null ?> value="Kepala Dusun 2">Kepala Dusun 2</option>
                            <option <?php echo $kat->jabatan_perangkat == 'Kepala Dusun 3' ? 'selected' : null ?> value="Kepala Dusun 3">Kepala Dusun 3</option>
                            <option <?php echo $kat->jabatan_perangkat == 'Kepala Dusun 4' ? 'selected' : null ?> value="Kepala Dusun 4">Kepala Dusun 4</option>
                            <option <?php echo $kat->jabatan_perangkat == 'Kepala Dusun 5' ? 'selected' : null ?> value="Kepala Dusun 5">Kepala Dusun 5</option>
                            <option <?php echo $kat->jabatan_perangkat == 'Kepala Dusun 6' ? 'selected' : null ?> value="Kepala Dusun 6">Kepala Dusun 6</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>No Surat Kerja</label>
                        <input type="text" name="nosk_perangkat" class="form-control" required value="<?php echo $kat->nosk_perangkat ?>">
                    </div>

                    <div class="form-group">
                        <label>Periode Jabatan</label>
                        <div class="row">
                            <div class="col-5">
                                <input type="number" name="periodeawal_perangkat" class="form-control" required placeholder="Tahun" value="<?php echo $kat->periodeawal_perangkat ?>">
                            </div>
                            <div class="col-2">
                                <p>-</p>
                            </div>
                            <div class="col-5">
                                <input type="number" name="periodeakhir_perangkat" class="form-control" required placeholder="Tahun" value="<?php echo $kat->periodeakhir_perangkat ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>No.Telepon</label>
                        <input type="number" name="telp_perangkat" class="form-control" required value="<?php echo $kat->telp_perangkat ?>">
                    </div>

                    <button type="submit" class="btn btn-success">Submit</button>

                </form>
            <?php endforeach; ?>
        </div>
    </div>

</div>