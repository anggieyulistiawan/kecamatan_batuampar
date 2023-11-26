<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 "><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 90%">
        <div class="card-body">
            <form method="POST" action="<?php echo base_url('desa/tani/tambah_data_aksi/') ?>">

                <div class="row">
                    <div class=" col-6 mb-4 text-center">
                        <label><strong>Nama Desa</strong></label>
                        <input type="hidden" name="tgl_tani" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                        <input type="text" value="<?= $this->session->userdata('nama_desa'); ?>" class="form-control text-center" readonly>
                    </div>
                    <div class=" col-6 mb-4 text-center">
                        <label><strong>Nama Pengirim</strong></label>
                        <input type="text" name="id_akun" value="<?= $this->session->userdata('nama_pengguna'); ?>" class="form-control text-center" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label>Nama Kelompok Tani</label>
                    <input type="text" name="nama_klmpok" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Tanggal Berdiri</label>
                    <input type="date" name="tgl_berdiri" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Jenis Usaha</label>
                    <input type="text" name="jenis_usaha" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat_tani" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" name="ket" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">Submit</button>

            </form>
        </div>
    </div>

</div>