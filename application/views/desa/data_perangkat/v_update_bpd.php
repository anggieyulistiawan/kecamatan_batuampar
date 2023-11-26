<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 "><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 90%">
        <div class="card-body">
            <?php foreach ($bpd as $kat) : ?>
                <form method="POST" action="<?php echo base_url('desa/bpd/update_data_aksi/') ?>" enctype="multipart/form-data>">

                    <div class="row">
                        <div class=" col-6 mb-4 text-center">
                            <label><strong>Nama Desa</strong></label>
                            <input type="hidden" name="id_bpd" class="form-control" value="<?php echo $kat->id_bpd ?>">
                            <input type="hidden" name="tanggal_bpd" class="form-control" value="<?php echo $kat->tanggal_bpd ?>">
                            <input type="text" value="<?= $this->session->userdata('nama_desa'); ?>" class="form-control text-center" readonly>
                        </div>
                        <div class=" col-6 mb-4 text-center">
                            <label><strong>Nama Pengirim</strong></label>
                            <input type="text" name="id_akun" value="<?= $this->session->userdata('nama_pengguna'); ?>" class="form-control text-center" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama_bpd" class="form-control" required value="<?php echo $kat->nama_bpd ?>">
                    </div>

                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgllahir_bpd" class="form-control" required value="<?php echo $kat->tgllahir_bpd ?>" max="<?php echo date('Y-m-d', strtotime('-20 years')) ?>">
                    </div>

                    <div class="form-group">
                        <label>Jabatan</label>
                        <select name="jabatan_bpd" class="form-control" required>
                            <option <?php echo $kat->jabatan_bpd == '' ? 'selected' : null ?> value="">--- Pilih Jabatan ---</option>
                            <option <?php echo $kat->jabatan_bpd == 'Ketua' ? 'selected' : null ?> value="Ketua">Ketua</option>
                            <option <?php echo $kat->jabatan_bpd == 'Wakil Ketua' ? 'selected' : null ?> value="Wakil Ketua">Wakil Ketua</option>
                            <option <?php echo $kat->jabatan_bpd == 'Ketua Bidang 1' ? 'selected' : null ?> value="Ketua Bidang 1">Ketua Bidang 1</option>
                            <option <?php echo $kat->jabatan_bpd == 'Ketua Bidang 2' ? 'selected' : null ?> value="Ketua Bidang 2">Ketua Bidang 2</option>
                            <option <?php echo $kat->jabatan_bpd == 'Ketua Bidang 3' ? 'selected' : null ?> value="Ketua Bidang 3">Ketua Bidang 3</option>
                            <option <?php echo $kat->jabatan_bpd == 'Ketua Bidang 4' ? 'selected' : null ?> value="Ketua Bidang 4">Ketua Bidang 4</option>
                            <option <?php echo $kat->jabatan_bpd == 'Anggota' ? 'selected' : null ?> value="Anggota">Anggota</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>No Surat Kerja</label>
                        <input type="text" name="nosk_bpd" class="form-control" required value="<?php echo $kat->nosk_bpd ?>">
                    </div>

                    <div class="form-group">
                        <label>Periode Jabatan</label>
                        <div class="row">
                            <div class="col-5">
                                <input type="number" name="periodeawal_bpd" class="form-control" placeholder="Tahun" required value="<?php echo $kat->periodeawal_bpd ?>">
                            </div>
                            <div class="col-2">
                                <p>-</p>
                            </div>
                            <div class="col-5">
                                <input type="number" name="periodeakhir_bpd" class="form-control" placeholder="Tahun" required value="<?php echo $kat->periodeakhir_bpd ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>No.Telepon</label>
                        <input type="number" name="telp_bpd" class="form-control" required value="<?php echo $kat->telp_bpd ?>">
                    </div>

                    <button type="submit" class="btn btn-success">Submit</button>

                </form>
            <?php endforeach; ?>
        </div>
    </div>

</div>