<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Page Heading -->
        <h4 class="mb-3 text-gray-800">Kelola Data Akun / <strong>Edit Data Akun</strong></h4>
    </div>
    <?php foreach ($akun as $a) : ?>
        <form method="POST" action="<?php echo base_url('admin/akun/update_data_aksi/') ?>" enctype="multipart/form-data">
            <div class="card table-responsive">
                <div class="card-body">

                    <div class="row">
                        <div class="col-4">
                            <label>NIP / NIK</label>
                            <input type="hidden" name="id_akun" class="form-control" value="<?php echo $a->id_akun ?>">
                            <input type="number" name="nip" class="form-control" value="<?php echo $a->nip ?>" required>
                        </div>

                        <div class="col-4">
                            <label>Nama Pengguna</label>
                            <input type="text" name="nama_pengguna" class="form-control" value="<?php echo $a->nama_pengguna ?>" required>
                        </div>

                        <div class="col-4">
                            <label>Desa</label>
                            <select class="form-control" name="id_desa" required>
                                <option value="">--- Pilih Desa ---</option>
                                <?php
                                foreach ($desa as $d) { ?>
                                    <option <?php echo $a->id_desa == $d->id_desa ? 'selected' : null ?> value="<?php echo $d->id_desa ?>">Desa <?php echo $d->nama_desa ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control">
                                <option <?php echo $a->jenis_kelamin == '' ? 'selected' : null ?> value="">--- Pilih Jenis Kelamin ---</option>
                                <option <?php echo $a->jenis_kelamin == 'Laki - laki' ? 'selected' : null ?> value="Laki - laki">Laki - laki</option>
                                <option <?php echo $a->jenis_kelamin == 'Perempuan' ? 'selected' : null ?> value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <label>No Telepon</label>
                            <input type="number" name="no_telp" class="form-control" value="<?php echo $a->no_telp ?>" required>
                        </div>

                        <div class="col-4">
                            <label>Foto</label>
                            <input type="file" name="foto" class="form-control" value="<?php echo $a->foto ?>">
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $a->username ?>" required>
                        </div>
                        <div class="col-4">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control" placeholder="">
                        </div>
                        <div class="col-4">
                            <label>Level</label>
                            <select class="form-control" name="id_level" required>
                                <option value="">--- Pilih Level ---</option>
                                <?php
                                foreach ($level as $l) { ?>
                                    <option <?php echo $a->id_level == $l->id_level ? 'selected' : null ?> value="<?php echo $l->id_level ?>"><?php echo $l->nama_level ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <label>Alamat</label>
                            <textarea class="form-control" name="alamat" type="text" placeholder="" value="<?php echo $a->alamat ?>"><?php echo $a->alamat ?></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success" style="width: 100%">Submit</button>
        </form>
    <?php endforeach; ?>
</div>