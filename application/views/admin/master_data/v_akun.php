                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h4 class="mb-4 text-gray-800">Master Data / <strong>Kelola Pengguna</strong></h4>
                    <?php echo $this->session->flashdata('pesan') ?>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class=" btn-group">
                                <a class="btn btn-sm btn-success m-0" data-toggle="modal" data-target="#exampleModaltambah">
                                    <i class="fas fa-plus"></i> Tambah Data</a>
                            </div>
                            <!-- <div class=" btn-group">
                                <div class="dropdown">
                                    <a class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-upload"></i> Export</a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Excel</a>
                                        <a class="dropdown-item" href="#">PDF</a>
                                    </div>
                                </div>
                            </div> -->
                        </div>

                        <div class="card-body">
                            <div class=" table">
                                <table class="table table-hover table-responsive-lg" id="dataTable" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th> </th>
                                            <th>Pengguna</th>
                                            <th>Username</th>
                                            <th>Level</th>
                                            <th>Nama Desa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($akun as $a) : ?>
                                            <tr>
                                                <td>
                                                    <center>
                                                        <a class="btn btn-circle btn-sm btn-dark" data-toggle="modal" data-target="#exampleModal<?php echo $a->id_akun ?>"><i class="fas fa-search-plus"></i></a>
                                                    </center>
                                                </td>
                                                <td>
                                                    <img class="" src="<?php echo base_url() . 'assets/foto/' . $a->foto ?>" width="40px">
                                                    <?php echo $a->nama_pengguna ?>
                                                </td>
                                                <td><?php echo $a->username ?></td>
                                                <td>
                                                    <?php if ($a->nama_level == 'ADMIN') { ?>
                                                        <span class=" badge bg-gradient-info text-white"><?php echo $a->nama_level ?></span>
                                                    <?php } else if ($a->nama_level == 'DESA') { ?>
                                                        <span class=" badge bg-gradient-success text-white"><?php echo $a->nama_level ?></span>
                                                    <?php } else { ?>
                                                        <span class=" badge bg-gradient-warning text-white"><?php echo $a->nama_level ?></span>
                                                    <?php } ?>
                                                </td>
                                                <td><?php echo $a->nama_desa ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

                <!-- Modal Detail -->
                <?php
                foreach ($akun as $a) : ?>
                    <div class="modal fade" id="exampleModal<?php echo $a->id_akun ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><strong>Detail Pengguna</strong></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <tr>
                                                <img class=" mt-lg-3" src="<?php echo base_url() . 'assets/foto/' . $a->foto ?>" width="200px">
                                            </tr>
                                        </div>
                                        <div class="col-md-8">
                                            <table class="table">
                                                <tr>
                                                    <th>Nama Desa</th>
                                                    <td><?php echo $a->nama_desa ?></td>
                                                </tr>

                                                <tr>
                                                    <th>NIP/NIK</th>
                                                    <td><?php echo $a->nip ?></td>
                                                </tr>

                                                <tr>
                                                    <th>Nama Pengguna</th>
                                                    <td><?php echo $a->nama_pengguna ?></td>
                                                </tr>

                                                <tr>
                                                    <th>Jenis Kelamin</th>
                                                    <td><?php echo $a->jenis_kelamin ?></td>
                                                </tr>

                                                <tr>
                                                    <th>No Telepon</th>
                                                    <td><?php echo $a->no_telp ?></td>
                                                </tr>

                                                <tr>
                                                    <th>Username</th>
                                                    <td><?php echo $a->username ?></td>
                                                </tr>

                                                <tr>
                                                    <th>Alamat</th>
                                                    <td><?php echo $a->alamat ?></td>
                                                </tr>

                                                <tr>
                                                    <th>Level</th>
                                                    <?php if ($a->nama_level == 'ADMIN') { ?>
                                                        <td><span class=" badge bg-gradient-info text-white"><?php echo $a->nama_level ?></span></td>
                                                    <?php } else if ($a->nama_level == 'DESA') { ?>
                                                        <td><span class=" badge bg-gradient-success text-white"><?php echo $a->nama_level ?></span></td>
                                                    <?php } else { ?>
                                                        <td><span class=" badge bg-gradient-warning text-white"><?php echo $a->nama_level ?></span></td>
                                                    <?php } ?>
                                                </tr>

                                                <tr>
                                                    <th>Actions</th>
                                                    <td>
                                                        <a class="btn btn-sm btn-primary" title="Edit" href="<?php echo base_url('admin/akun/update_data/' . $a->id_akun) ?>"><i class="fas fa-edit"></i> Edit</a>
                                                        <a onclick="return confirm ('Yakin Hapus')" class="btn btn-sm btn-danger" title="Delete" href="<?php echo base_url('admin/akun/delete_data/' . $a->id_akun) ?>"><i class="fas fa-trash"></i> Delete</a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- Modal Tambah -->
                <div class="modal fade" id="exampleModaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><strong>Tambah Pengguna</strong></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="<?php echo base_url('admin/akun/tambah_data_aksi/') ?>" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class=" mb-4">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control" placeholder="Masukan Username Pengguna" required>
                                    </div>

                                    <div class=" mb-4">
                                        <label>Nama Desa</label>
                                        <select class="form-control" name="id_desa">
                                            <option>--- Pilih Desa ---</option>
                                            <?php
                                            foreach ($desa as $d) { ?>
                                                <option value="<?php echo $d->id_desa ?>"> <?php echo $d->nama_desa ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="mb-4">
                                        <label>Level</label>
                                        <select class="form-control" name="id_level" required>
                                            <option value="">--- Pilih Level ---</option>
                                            <?php
                                            foreach ($level as $l) { ?>
                                                <option value="<?php echo $l->id_level ?>"><?php echo $l->nama_level ?></option>
                                            <?php } ?>
                                        </select>
                                        <?php echo form_error('id_level', '<div class="text-small text-danger"></div>') ?>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>