<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 "><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 90%">
        <div class="card-body">
            <form method="POST" action="<?php echo base_url('admin/bumdesa/update_data_aksi/') ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label><strong>Nama Desa</strong></label>
                    <input type="text" name="" value="Desa <?php echo $bumdesa->nama_desa ?>" class="form-control" placeholder="" readonly>
                </div>

                <div class="form-group">
                    <label>Nama Bumdesa</label>
                    <input type="hidden" name="id_bumdesa" class="form-control" required value="<?php echo $bumdesa->id_bumdesa ?>">
                    <input type="hidden" name="tgl_bumdesa" class="form-control" required value="<?php echo $bumdesa->tgl_bumdesa ?>">
                    <input type="text" name="nama_bumdesa" class="form-control" required value="<?php echo $bumdesa->nama_bumdesa ?>">
                </div>

                <div class="form-group">
                    <label>Jenis Usaha</label>
                    <input type="text" name="jenis_usaha" class="form-control" required value="<?php echo $bumdesa->jenis_usaha ?>">
                </div>

                <div class="form-group">
                    <label>Tanggal Berdiri</label>
                    <input type="date" name="tgl_berdiri" class="form-control" required value="<?php echo $bumdesa->tgl_berdiri ?>">
                </div>

                <div class="form-group">
                    <label>Surat BPOM</label>
                    <input type="hidden" name="bpom_data" class="form-control" required value="<?php echo $bumdesa->bpom ?>">
                    <input type="file" name="bpom" class="form-control">
                </div>

                <div class="form-group">
                    <label>Modal Awal</label>
                    <input type="number" name="modal_awal" class="form-control" required value="<?php echo $bumdesa->modal_awal ?>">
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat_bumdes" class="form-control" required value="<?php echo $bumdesa->alamat_bumdes ?>">
                </div>

                <button type="submit" class="btn btn-success">Submit</button>

            </form>
        </div>
    </div>
</div>