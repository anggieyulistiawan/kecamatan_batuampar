<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 "><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 90%">
        <div class="card-body">
            <?php foreach ($tani as $t) : ?>
                <form method="POST" action="<?php echo base_url('desa/tani/update_data_aksi/') ?>" enctype="multipart/form-data>">

                    <div class="row">
                        <div class=" col-6 mb-4 text-center">
                            <label><strong>Nama Desa</strong></label>
                            <input type="hidden" name="id_tani" class="form-control" required value="<?php echo $t->id_tani ?>">
                            <input type="hidden" name="tgl_tani" class="form-control" required value="<?php echo $t->tgl_tani ?>">
                            <input type="text" value="<?= $this->session->userdata('nama_desa'); ?>" class="form-control text-center" readonly>
                        </div>
                        <div class=" col-6 mb-4 text-center">
                            <label><strong>Nama Pengirim</strong></label>
                            <input type="text" name="id_akun" value="<?= $this->session->userdata('nama_pengguna'); ?>" class="form-control text-center" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nama Kelompok Tani</label>
                        <input type="text" name="nama_klmpok" class="form-control" required value="<?php echo $t->nama_klmpok ?>">
                    </div>

                    <div class="form-group">
                        <label>Tanggal Berdiri</label>
                        <input type="date" name="tgl_berdiri" class="form-control" required value="<?php echo $t->tgl_berdiri ?>">
                    </div>

                    <div class="form-group">
                        <label>Jenis Usaha</label>
                        <input type="text" name="jenis_usaha" class="form-control" required value="<?php echo $t->jenis_usaha ?>">
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat_tani" class="form-control" required value="<?php echo $t->alamat_tani ?>">
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" name="ket" class="form-control" value="<?php echo $t->ket ?>">
                    </div>

                    <button type="submit" class="btn btn-success">Submit</button>

                </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>