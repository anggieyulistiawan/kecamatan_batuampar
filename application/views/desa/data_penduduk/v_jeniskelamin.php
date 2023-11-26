                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h4 class="mb-4 text-gray-800">Data Penduduk / <strong>Kelola Jenis Kelamin Penduduk</strong></h4>
                    <?php echo $this->session->flashdata('pesan') ?>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class=" btn-group">
                                <a class="btn btn-sm btn-success m-0" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fas fa-plus"></i> Tambah Data</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table">
                                <table class="table table-hover table-responsive-lg" id="dataTable" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Laki-Laki</th>
                                            <th>Perempuan</th>
                                            <th>Jumlah</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($jeniskelamin as $j) : ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo format_indo(date($j->tanggal_jeniskelamin)); ?></td>
                                                <td><?php echo $j->jeniskelamin_l ?></td>
                                                <td><?php echo $j->jeniskelamin_p ?></td>
                                                <td><strong><?php echo $j->jeniskelamin_l + $j->jeniskelamin_p ?></strong></td>
                                                <td>
                                                    <a class="btn btn-sm btn-primary" title="Edit" data-toggle="modal" data-target="#exampleModal1<?php echo $j->id_jeniskelamin ?>"><i class="fas fa-edit"></i> Edit</a>
                                                    <a onclick="return confirm ('Yakin Hapus')" class="btn btn-sm btn-danger" title="Delete" href="<?php echo base_url('desa/jenis_kelamin/delete_data/' . $j->id_jeniskelamin) ?>"><i class="fas fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

                <!-- Modal Tambah -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><strong>Tambah Data Jenis Kelamin Penduduk</strong></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="<?php echo base_url('desa/jenis_kelamin/tambah_data_aksi/') ?>" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class=" col-6 mb-4 text-center">
                                            <label><strong>Nama Desa</strong></label>
                                            <input type="hidden" name="tanggal_jeniskelamin" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                                            <input type="text" value="<?= $this->session->userdata('nama_desa'); ?>" class="form-control text-center" readonly>
                                        </div>
                                        <div class=" col-6 mb-4 text-center">
                                            <label><strong>Nama Pengirim</strong></label>
                                            <input type="text" name="id_akun" value="<?= $this->session->userdata('nama_pengguna'); ?>" class="form-control text-center" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6 text-center text-bold">
                                            <label><strong>Jumlah Laki- Laki</strong></label>
                                            <input type="number" name="jeniskelamin_l" class="form-control" placeholder="">
                                        </div>

                                        <div class="col-6 text-center text-bold">
                                            <label><strong>Jumlah Perempuan</strong></label>
                                            <input type="number" name="jeniskelamin_p" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Save changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal edit -->
                <?php foreach ($jeniskelamin as $j) : ?>
                    <div class="modal fade" id="exampleModal1<?php echo $j->id_jeniskelamin ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><strong>Edit Jenis Kelamin Penduduk</strong></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="<?php echo base_url('desa/jenis_kelamin/update_data_aksi/') ?>" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class=" col-6 mb-4 text-center">
                                                <label><strong>Nama Desa</strong></label>
                                                <input type="hidden" name="id_jeniskelamin" value="<?php echo $j->id_jeniskelamin ?>" class="form-control">
                                                <input type="hidden" name="tanggal_jeniskelamin" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                                                <input type="text" value="<?= $this->session->userdata('nama_desa'); ?>" class="form-control text-center" readonly>
                                            </div>
                                            <div class=" col-6 mb-4 text-center">
                                                <label><strong>Nama Pengirim</strong></label>
                                                <input type="text" name="id_akun" value="<?= $this->session->userdata('nama_pengguna'); ?>" class="form-control text-center" readonly>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6 text-center text-bold">
                                                <label><strong>Jumlah Laki- Laki</strong></label>
                                                <input type="number" name="jeniskelamin_l" value="<?php echo $j->jeniskelamin_l ?>" class="form-control" placeholder="">
                                            </div>

                                            <div class="col-6 text-center text-bold">
                                                <label><strong>Jumlah Perempuan</strong></label>
                                                <input type="number" name="jeniskelamin_p" value="<?php echo $j->jeniskelamin_p ?>" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>