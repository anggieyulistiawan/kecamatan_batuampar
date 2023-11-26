                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h4 class="mb-4 text-gray-800">Data Penduduk / <strong>Kelola Agama Penduduk</strong></h4>
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
                                            <th>Nama Desa</th>
                                            <th>Jumlah Keseluruhan</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($agama as $g) : ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo format_indo(date($g->tanggal_agama)); ?></td>
                                                <td><?php echo $g->nama_desa ?></td>
                                                <td>
                                                    <?php echo
                                                    $g->kepercayaan_l + $g->budha_l + $g->hindu_l + $g->kristen_l + $g->katholik_l + $g->islam_l +
                                                        $g->kepercayaan_p + $g->budha_p + $g->hindu_p + $g->kristen_p + $g->katholik_p + $g->islam_p
                                                    ?>


                                                </td>


                                                <td>
                                                    <a class="btn btn-sm btn-success" title="Detail" href="<?php echo base_url('desa/agama/detail_data/' . $g->id_agama) ?>"><i class="fas fa-search-plus"></i> Detail</a>
                                                    <a class="btn btn-sm btn-primary" title="Edit" data-toggle="modal" data-target="#exampleModal1<?php echo $g->id_agama ?>"><i class="fas fa-edit"></i> Edit</a>
                                                    <a onclick="return confirm ('Yakin Hapus')" class="btn btn-sm btn-danger" title="Delete" href="<?php echo base_url('desa/Agama/delete_data/' . $g->id_agama) ?>"><i class="fas fa-trash"></i> Delete</a>
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
                                <h5 class="modal-title" id="exampleModalLabel"><strong>Tambah Data Agama Penduduk</strong></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="<?php echo base_url('desa/agama/tambah_data_aksi/') ?>" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class=" col-6 mb-4 text-center">
                                            <label><strong>Nama Desa</strong></label>
                                            <input type="hidden" name="tanggal_agama" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                                            <input type="text" value="<?= $this->session->userdata('nama_desa'); ?>" class="form-control text-center" readonly>
                                        </div>
                                        <div class=" col-6 mb-4 text-center">
                                            <label><strong>Nama Pengirim</strong></label>
                                            <input type="text" name="id_akun" value="<?= $this->session->userdata('nama_pengguna'); ?>" class="form-control text-center" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6 text-center text-bold">
                                            <label><strong>Islam</strong></label>
                                        </div>

                                        <div class="col-6 text-center text-bold">
                                            <label><strong>Katholik</strong></label>
                                        </div>

                                        <div class=" col-3 mb-4">
                                            <input type="number" name="islam_l" class="form-control" placeholder="Laki - laki">
                                        </div>
                                        <div class=" col-3 mb-4">
                                            <input type="number" name="islam_p" class="form-control" placeholder="Perempuan">
                                        </div>


                                        <div class=" col-3 mb-4">
                                            <input type="number" name="katholik_l" class="form-control" placeholder="Laki - laki">
                                        </div>
                                        <div class=" col-3 mb-4">
                                            <input type="number" name="katholik_p" class="form-control" placeholder="Perempuan">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6 text-center text-bold">
                                            <label><strong>Kristen</strong></label>
                                        </div>

                                        <div class="col-6 text-center text-bold">
                                            <label><strong>Hindu</strong></label>
                                        </div>

                                        <div class=" col-3 mb-4">
                                            <input type="number" name="kristen_l" class="form-control" placeholder="Laki - laki">
                                        </div>
                                        <div class=" col-3 mb-4">
                                            <input type="number" name="kristen_p" class="form-control" placeholder="Perempuan">
                                        </div>


                                        <div class=" col-3 mb-4">
                                            <input type="number" name="hindu_l" class="form-control" placeholder="Laki - laki">
                                        </div>
                                        <div class=" col-3 mb-4">
                                            <input type="number" name="hindu_p" class="form-control" placeholder="Perempuan">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6 text-center text-bold">
                                            <label><strong>Budha</strong></label>
                                        </div>

                                        <div class="col-6 text-center text-bold">
                                            <label><strong>Kepercayaan</strong></label>
                                        </div>

                                        <div class=" col-3 mb-4">
                                            <input type="number" name="budha_l" class="form-control" placeholder="Laki - laki">
                                        </div>
                                        <div class=" col-3 mb-4">
                                            <input type="number" name="budha_p" class="form-control" placeholder="Perempuan">
                                        </div>


                                        <div class=" col-3 mb-4">
                                            <input type="number" name="kepercayaan_l" class="form-control" placeholder="Laki - laki">
                                        </div>
                                        <div class=" col-3 mb-4">
                                            <input type="number" name="kepercayaan_p" class="form-control" placeholder="Perempuan">
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

                <!-- Modal edit -->
                <?php foreach ($agama as $g) : ?>
                    <div class="modal fade" id="exampleModal1<?php echo $g->id_agama ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><strong>Edit Data Agama Penduduk</strong></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="<?php echo base_url('desa/agama/update_data_aksi/') ?>" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class=" col-6 mb-4 text-center">
                                                <label><strong>Nama Desa</strong></label>
                                                <input type="hidden" name="tanggal_agama" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                                                <input type="hidden" name="id_agama" value="<?php echo $g->id_agama ?>" class="form-control">
                                                <input type="text" value="<?= $this->session->userdata('nama_desa'); ?>" class="form-control text-center" readonly>
                                            </div>
                                            <div class=" col-6 mb-4 text-center">
                                                <label><strong>Nama Pengirim</strong></label>
                                                <input type="text" name="id_akun" value="<?= $this->session->userdata('nama_pengguna'); ?>" class="form-control text-center" readonly>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6 text-center text-bold">
                                                <label><strong>Islam</strong></label>
                                            </div>

                                            <div class="col-6 text-center text-bold">
                                                <label><strong>Katholik</strong></label>
                                            </div>

                                            <div class=" col-3 mb-4">
                                                <input type="number" name="islam_l" value="<?php echo $g->islam_l ?>" class="form-control" placeholder="Laki - laki">
                                            </div>
                                            <div class=" col-3 mb-4">
                                                <input type="number" name="islam_p" value="<?php echo $g->islam_p ?>" class="form-control" placeholder="Perempuan">
                                            </div>


                                            <div class=" col-3 mb-4">
                                                <input type="number" name="katholik_l" value="<?php echo $g->katholik_l ?>" class="form-control" placeholder="Laki - laki">
                                            </div>
                                            <div class=" col-3 mb-4">
                                                <input type="number" name="katholik_p" value="<?php echo $g->katholik_p ?>" class="form-control" placeholder="Perempuan">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6 text-center text-bold">
                                                <label><strong>Kristen</strong></label>
                                            </div>

                                            <div class="col-6 text-center text-bold">
                                                <label><strong>Hindu</strong></label>
                                            </div>

                                            <div class=" col-3 mb-4">
                                                <input type="number" name="kristen_l" value="<?php echo $g->kristen_l ?>" class="form-control" placeholder="Laki - laki">
                                            </div>
                                            <div class=" col-3 mb-4">
                                                <input type="number" name="kristen_p" value="<?php echo $g->kristen_p ?>" class="form-control" placeholder="Perempuan">
                                            </div>


                                            <div class=" col-3 mb-4">
                                                <input type="number" name="hindu_l" value="<?php echo $g->hindu_l ?>" class="form-control" placeholder="Laki - laki">
                                            </div>
                                            <div class=" col-3 mb-4">
                                                <input type="number" name="hindu_p" value="<?php echo $g->hindu_p ?>" class="form-control" placeholder="Perempuan">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6 text-center text-bold">
                                                <label><strong>Budha</strong></label>
                                            </div>

                                            <div class="col-6 text-center text-bold">
                                                <label><strong>Kepercayaan</strong></label>
                                            </div>

                                            <div class=" col-3 mb-4">
                                                <input type="number" name="budha_l" value="<?php echo $g->budha_l ?>" class="form-control" placeholder="Laki - laki">
                                            </div>
                                            <div class=" col-3 mb-4">
                                                <input type="number" name="budha_p" value="<?php echo $g->budha_p ?>" class="form-control" placeholder="Perempuan">
                                            </div>


                                            <div class=" col-3 mb-4">
                                                <input type="number" name="kepercayaan_l" value="<?php echo $g->kepercayaan_l ?>" class="form-control" placeholder="Laki - laki">
                                            </div>
                                            <div class=" col-3 mb-4">
                                                <input type="number" name="kepercayaan_p" value="<?php echo $g->kepercayaan_p ?>" class="form-control" placeholder="Perempuan">
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