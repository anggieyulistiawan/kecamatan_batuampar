<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-2 text-gray-800">Account Settings - <strong>Profile</strong></h4>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>
    <p class="text-right text-danger small">*Jika memperbarui profile, <strong>diharapkan mengisi data secara benar</strong></p>

    <form method="POST" action="<?php echo base_url('desa/profile/update_data_aksi/') ?>" enctype="multipart/form-data">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-header font-weight-bold bg-primary text-white">
                        Profile Picture
                    </div>
                    <div class="card-body text-center" style="background-color: whitesmoke;">
                        <img class="img-account-profile embed-responsive rounded-circle mb-4 " width="" src="<?php echo base_url('/assets/foto/') . $this->session->userdata('foto') ?>" alt="">
                        <!-- <input class="btn btn-success mt-4 form-control" name="foto" type="file" value="<?php echo $akun->foto ?>">Upload new image</input> -->
                        <input type="file" name="foto" class="form-control" value="<?php echo $akun->foto ?>">
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="card">
                    <div class="card-header font-weight-bold bg-primary text-white">
                        Account Details
                    </div>
                    <div class="card-body" style="background-color: whitesmoke;">
                        <div class="row gx-3 mb-3">
                            <!-- Form Row-->
                            <div class="col-md-5">
                                <!-- Form Group (first name)-->
                                <label class="small mb-1">NIP/NIK</label>
                                <input class="form-control" name="nip" type="number" placeholder="Enter your NIP/NIK" value="<?php echo $akun->nip ?>">
                                <input class="form-control" name="id_akun" type="hidden" value="<?php echo $akun->id_akun ?>">
                            </div>
                            <!-- Form Group (username)-->
                            <div class="col-md-7">
                                <label class="small mb-1">Nama Lengkap</label>
                                <input class="form-control" name="nama_pengguna" type="text" placeholder="Enter your full name" value="<?php echo $akun->nama_pengguna ?>">
                            </div>
                        </div>

                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-5">
                                <label class="small mb-1">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control">
                                    <option <?php echo $akun->jenis_kelamin == 'Laki - laki' ? 'selected' : null ?> value="Laki - laki">Laki - laki</option>
                                    <option <?php echo $akun->jenis_kelamin == 'Perempuan' ? 'selected' : null ?> value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-7">
                                <label class="small mb-1">Desa</label>
                                <select class="form-control" name="id_desa" required>
                                    <option value="">--- Pilih Desa ---</option>
                                    <?php
                                    foreach ($desa as $d) { ?>
                                        <option <?php echo $akun->id_desa == $d->id_desa ? 'selected' : null ?> value="<?php echo $d->id_desa ?>">Desa <?php echo $d->nama_desa ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-5">
                                <label class="small mb-1">No Telepon</label>
                                <input class="form-control" name="no_telp" type="text" placeholder="" value="<?php echo $akun->no_telp ?>">
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-7">
                                <label class="small mb-1">Username</label>
                                <input class="form-control" name="username" type="text" placeholder="Enter your username" value="<?php echo $akun->username ?>">
                            </div>
                        </div>

                        <div class="row gx-3 mb-3">
                            <!-- Form Group (location)-->
                            <div class="col-md-12">
                                <label class="small mb-1">Alamat</label>
                                <textarea class="form-control" name="alamat" type="text" placeholder="" value="<?php echo $akun->alamat ?>"><?php echo $akun->alamat ?></textarea>
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <!-- Save changes button-->
                        <button class="btn btn-success" type="submit">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>