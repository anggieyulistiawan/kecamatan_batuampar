<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 "><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 90%">
        <div class="card-body">
            <form method="POST" action="<?php echo base_url('desa/bumdesa/tambah_data_aksi/') ?>" enctype="multipart/form-data">
                <div class="row">
                    <div class=" col-6 mb-4 text-center">
                        <label><strong>Nama Desa</strong></label>
                        <input type="hidden" name="tgl_bumdesa" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                        <input type="text" value="<?= $this->session->userdata('nama_desa'); ?>" class="form-control text-center" readonly>
                    </div>
                    <div class=" col-6 mb-4 text-center">
                        <label><strong>Nama Pengirim</strong></label>
                        <input type="text" name="id_akun" value="<?= $this->session->userdata('nama_pengguna'); ?>" class="form-control text-center" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label>Nama Bumdesa</label>
                    <input type="text" name="nama_bumdesa" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Jenis Usaha</label>
                    <input type="text" name="jenis_usaha" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Tanggal Berdiri</label>
                    <input type="date" name="tgl_berdiri" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Modal Awal</label>
                    <input type="number" name="modal_awal" class="form-control" required placeholder="Masukan berupa angka, (contoh: '500000')">
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat_bumdes" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Upload Surat BPOM</label>
                    <input type="file" name="bpom" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">Submit</button>

            </form>
        </div>
    </div>

</div>