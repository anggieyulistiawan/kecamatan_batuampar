<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 "><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 90%">
        <div class="card-body">
            <?php foreach ($bumdesa as $b) : ?>
                <form method="POST" action="<?php echo base_url('desa/bumdesa/update_data_aksi/') ?>" enctype="multipart/form-data">

                    <div class="row">
                        <div class=" col-6 mb-4 text-center">
                            <label><strong>Nama Desa</strong></label>
                            <input type="hidden" name="id_bumdesa" class="form-control" value="<?php echo $b->id_bumdesa ?>">
                            <input type="hidden" name="tgl_bumdesa" class="form-control" required value="<?php echo $b->tgl_bumdesa ?>">
                            <input type="text" value="<?= $this->session->userdata('nama_desa'); ?>" class="form-control text-center" readonly>
                        </div>
                        <div class=" col-6 mb-4 text-center">
                            <label><strong>Nama Pengirim</strong></label>
                            <input type="text" name="id_akun" value="<?= $this->session->userdata('nama_pengguna'); ?>" class="form-control text-center" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nama Bumdesa</label>
                        <input type="text" name="nama_bumdesa" class="form-control" required value="<?php echo $b->nama_bumdesa ?>">
                    </div>

                    <div class="form-group">
                        <label>Jenis Usaha</label>
                        <input type="text" name="jenis_usaha" class="form-control" required value="<?php echo $b->jenis_usaha ?>">
                    </div>

                    <div class="form-group">
                        <label>Tanggal Berdiri</label>
                        <input type="date" name="tgl_berdiri" class="form-control" required value="<?php echo $b->tgl_berdiri ?>">
                    </div>

                    <div class="form-group">
                        <label>Modal Awal</label>
                        <input type="number" name="modal_awal" class="form-control" required value="<?php echo $b->modal_awal ?>">
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat_bumdes" class="form-control" required value="<?php echo $b->alamat_bumdes ?>">
                    </div>

                    <div class="form-group">
                        <label>Surat BPOM</label>
                        <input type="hidden" name="bpom_data" class="form-control" required value="<?php echo $b->bpom ?>">
                        <input type="file" name="bpom" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>