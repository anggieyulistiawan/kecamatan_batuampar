                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h4 class="mb-4 text-gray-800">Data Penduduk / <strong>Kelola Usia Penduduk</strong></h4>

                    <?php echo $this->session->flashdata('pesan') ?>
                    <!-- <?php if ($tahun == null) { ?>
                    <?php } else { ?>
                        <div class="alert alert-info">
                            Menampilkan Data Perbaikan Bulan
                            <span class="font-weight-bold"><?php echo $bulan ?></span>
                            Tahun
                            <span class="font-weight-bold"><?php echo $tahun ?></span>
                        </div>
                    <?php } ?> -->

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
                                            <th>Jumlah Keseluruhan</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($usia as $u) : ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo format_indo(date($u->tanggal_usia)); ?></td>
                                                <td>
                                                    <?php echo
                                                    $u->u5_l + $u->u10_l + $u->u15_l + $u->u20_l +  $u->u30_l + $u->u40_l + $u->u50_l + $u->u60_l + $u->u70_l + $u->u70_lebih_l +
                                                        $u->u5_p + $u->u10_p + $u->u15_p + $u->u20_p +  $u->u30_p + $u->u40_p + $u->u50_p + $u->u60_p + $u->u70_p + $u->u70_lebih_p
                                                    ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-success" title="Detail" href="<?php echo base_url('desa/usia/detail_data/' . $u->id_usia) ?>"><i class="fas fa-search-plus"></i> Detail</a>
                                                    <a class="btn btn-sm btn-primary" title="Edit" data-toggle="modal" data-target="#exampleModal1<?php echo $u->id_usia ?>"><i class="fas fa-edit"></i> Edit</a>
                                                    <a onclick="return confirm ('Yakin Hapus')" class="btn btn-sm btn-danger" title="Delete" href="<?php echo base_url('desa/usia/delete_data/' . $u->id_usia) ?>"><i class="fas fa-trash"></i> Delete</a>
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
                                <h5 class="modal-title" id="exampleModalLabel"><strong>Tambah Data Usia Penduduk</strong></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="<?php echo base_url('desa/usia/tambah_data_aksi/') ?>" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class=" col-6 mb-4 text-center">
                                            <label><strong>Nama Desa</strong></label>
                                            <input type="hidden" name="tanggal_usia" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                                            <input type="text" value="<?= $this->session->userdata('nama_desa'); ?>" class="form-control text-center" readonly>
                                        </div>
                                        <div class=" col-6 mb-4 text-center">
                                            <label><strong>Nama Pengirim</strong></label>
                                            <input type="text" name="id_akun" value="<?= $this->session->userdata('nama_pengguna'); ?>" class="form-control text-center" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6 text-center text-bold">
                                            <label><strong>Usia 0 - 5</strong></label>
                                        </div>

                                        <div class="col-6 text-center text-bold">
                                            <label><strong>Usia 6 - 10</strong></label>
                                        </div>

                                        <div class=" col-3 mb-4">
                                            <input type="number" name="u5_l" class="form-control" placeholder="Laki - laki">
                                        </div>
                                        <div class=" col-3 mb-4">
                                            <input type="number" name="u5_p" class="form-control" placeholder="Perempuan">
                                        </div>


                                        <div class=" col-3 mb-4">
                                            <input type="number" name="u10_l" class="form-control" placeholder="Laki - laki">
                                        </div>
                                        <div class=" col-3 mb-4">
                                            <input type="number" name="u10_p" class="form-control" placeholder="Perempuan">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6 text-center text-bold">
                                            <label><strong>Usia 11 - 15</strong></label>
                                        </div>

                                        <div class="col-6 text-center text-bold">
                                            <label><strong>Usia 16 - 20</strong></label>
                                        </div>

                                        <div class=" col-3 mb-4">
                                            <input type="number" name="u15_l" class="form-control" placeholder="Laki - laki">
                                        </div>
                                        <div class=" col-3 mb-4">
                                            <input type="number" name="u15_p" class="form-control" placeholder="Perempuan">
                                        </div>


                                        <div class=" col-3 mb-4">
                                            <input type="number" name="u20_l" class="form-control" placeholder="Laki - laki">
                                        </div>
                                        <div class=" col-3 mb-4">
                                            <input type="number" name="u20_p" class="form-control" placeholder="Perempuan">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6 text-center text-bold">
                                            <label><strong>Usia 21 - 30</strong></label>
                                        </div>

                                        <div class="col-6 text-center text-bold">
                                            <label><strong>Usia 31 - 40</strong></label>
                                        </div>

                                        <div class=" col-3 mb-4">
                                            <input type="number" name="u30_l" class="form-control" placeholder="Laki - laki">
                                        </div>
                                        <div class=" col-3 mb-4">
                                            <input type="number" name="u30_p" class="form-control" placeholder="Perempuan">
                                        </div>


                                        <div class=" col-3 mb-4">
                                            <input type="number" name="u40_l" class="form-control" placeholder="Laki - laki">
                                        </div>
                                        <div class=" col-3 mb-4">
                                            <input type="number" name="u40_p" class="form-control" placeholder="Perempuan">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6 text-center text-bold">
                                            <label><strong>Usia 41 - 50</strong></label>
                                        </div>

                                        <div class="col-6 text-center text-bold">
                                            <label><strong>Usia 51 - 60</strong></label>
                                        </div>

                                        <div class=" col-3 mb-4">
                                            <input type="number" name="u50_l" class="form-control" placeholder="Laki - laki">
                                        </div>
                                        <div class=" col-3 mb-4">
                                            <input type="number" name="u50_p" class="form-control" placeholder="Perempuan">
                                        </div>


                                        <div class=" col-3 mb-4">
                                            <input type="number" name="u60_l" class="form-control" placeholder="Laki - laki">
                                        </div>
                                        <div class=" col-3 mb-4">
                                            <input type="number" name="u60_p" class="form-control" placeholder="Perempuan">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6 text-center text-bold">
                                            <label><strong>Usia 61 - 70</strong></label>
                                        </div>

                                        <div class="col-6 text-center text-bold">
                                            <label><strong>Usia 70 Lebih</strong></label>
                                        </div>

                                        <div class=" col-3 mb-4">
                                            <input type="number" name="u70_l" class="form-control" placeholder="Laki - laki">
                                        </div>
                                        <div class=" col-3 mb-4">
                                            <input type="number" name="u70_p" class="form-control" placeholder="Perempuan">
                                        </div>


                                        <div class=" col-3 mb-4">
                                            <input type="number" name="u70_lebih_l" class="form-control" placeholder="Laki - laki">
                                        </div>
                                        <div class=" col-3 mb-4">
                                            <input type="number" name="u70_lebih_p" class="form-control" placeholder="Perempuan">
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
                <?php foreach ($usia as $u) : ?>
                    <div class="modal fade" id="exampleModal1<?php echo $u->id_usia ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><strong>Edit Data usia</strong></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="<?php echo base_url('desa/usia/update_data_aksi/') ?>" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class=" col-6 mb-4 text-center">
                                                <label><strong>Nama Desa</strong></label>
                                                <input type="hidden" name="id_usia" value="<?php echo $u->id_usia ?>" class="form-control">
                                                <input type="hidden" name="tanggal_usia" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                                                <input type="text" value="<?= $this->session->userdata('nama_desa'); ?>" class="form-control text-center" readonly>
                                            </div>
                                            <div class=" col-6 mb-4 text-center">
                                                <label><strong>Nama Pengirim</strong></label>
                                                <input type="text" name="id_akun" value="<?= $this->session->userdata('nama_pengguna'); ?>" class="form-control text-center" readonly>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6 text-center text-bold">
                                                <label><strong>Usia 0 - 5</strong></label>
                                            </div>

                                            <div class="col-6 text-center text-bold">
                                                <label><strong>Usia 6 - 10</strong></label>
                                            </div>

                                            <div class=" col-3 mb-4">
                                                <input type="number" name="u5_l" value="<?php echo $u->u5_l ?>" class="form-control" placeholder="Laki - laki">
                                            </div>
                                            <div class=" col-3 mb-4">
                                                <input type="number" name="u5_p" value="<?php echo $u->u5_p ?>" class="form-control" placeholder="Perempuan">
                                            </div>


                                            <div class=" col-3 mb-4">
                                                <input type="number" name="u10_l" value="<?php echo $u->u10_l ?>" class="form-control" placeholder="Laki - laki">
                                            </div>
                                            <div class=" col-3 mb-4">
                                                <input type="number" name="u10_p" value="<?php echo $u->u10_p ?>" class="form-control" placeholder="Perempuan">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6 text-center text-bold">
                                                <label><strong>Usia 11 - 15</strong></label>
                                            </div>

                                            <div class="col-6 text-center text-bold">
                                                <label><strong>Usia 16 - 20</strong></label>
                                            </div>

                                            <div class=" col-3 mb-4">
                                                <input type="number" name="u15_l" value="<?php echo $u->u15_l ?>" class="form-control" placeholder="Laki - laki">
                                            </div>
                                            <div class=" col-3 mb-4">
                                                <input type="number" name="u15_p" value="<?php echo $u->u15_p ?>" class="form-control" placeholder="Perempuan">
                                            </div>


                                            <div class=" col-3 mb-4">
                                                <input type="number" name="u20_l" value="<?php echo $u->u20_l ?>" class="form-control" placeholder="Laki - laki">
                                            </div>
                                            <div class=" col-3 mb-4">
                                                <input type="number" name="u20_p" value="<?php echo $u->u20_p ?>" class="form-control" placeholder="Perempuan">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6 text-center text-bold">
                                                <label><strong>Usia 21 - 30</strong></label>
                                            </div>

                                            <div class="col-6 text-center text-bold">
                                                <label><strong>Usia 31 - 40</strong></label>
                                            </div>

                                            <div class=" col-3 mb-4">
                                                <input type="number" name="u30_l" value="<?php echo $u->u30_l ?>" class="form-control" placeholder="Laki - laki">
                                            </div>
                                            <div class=" col-3 mb-4">
                                                <input type="number" name="u30_p" value="<?php echo $u->u30_p ?>" class="form-control" placeholder="Perempuan">
                                            </div>

                                            <div class=" col-3 mb-4">
                                                <input type="number" name="u40_l" value="<?php echo $u->u40_l ?>" class="form-control" placeholder="Laki - laki">
                                            </div>
                                            <div class=" col-3 mb-4">
                                                <input type="number" name="u40_p" value="<?php echo $u->u40_p ?>" class="form-control" placeholder="Perempuan">
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-6 text-center text-bold">
                                                <label><strong>Usia 41-50</strong></label>
                                            </div>

                                            <div class="col-6 text-center text-bold">
                                                <label><strong>Usia 51-60</strong></label>
                                            </div>

                                            <div class=" col-3 mb-4">
                                                <input type="number" name="u50_l" value="<?php echo $u->u50_l ?>" class="form-control" placeholder="Laki - laki">
                                            </div>
                                            <div class=" col-3 mb-4">
                                                <input type="number" name="u50_p" value="<?php echo $u->u50_p ?>" class="form-control" placeholder="Perempuan">
                                            </div>


                                            <div class=" col-3 mb-4">
                                                <input type="number" name="u60_l" value="<?php echo $u->u60_l ?>" class="form-control" placeholder="Laki - laki">
                                            </div>
                                            <div class=" col-3 mb-4">
                                                <input type="number" name="u60_p" value="<?php echo $u->u60_p ?>" class="form-control" placeholder="Perempuan">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6 text-center text-bold">
                                                <label><strong>Usia 61-70</strong></label>
                                            </div>

                                            <div class="col-6 text-center text-bold">
                                                <label><strong>Usia 70 Lebih</strong></label>
                                            </div>

                                            <div class=" col-3 mb-4">
                                                <input type="number" name="u70_l" value="<?php echo $u->u70_l ?>" class="form-control" placeholder="Laki - laki">
                                            </div>
                                            <div class=" col-3 mb-4">
                                                <input type="number" name="u70_p" value="<?php echo $u->u70_p ?>" class="form-control" placeholder="Perempuan">
                                            </div>


                                            <div class=" col-3 mb-4">
                                                <input type="number" name="u70_lebih_l" value="<?php echo $u->u70_lebih_l ?>" class="form-control" placeholder="Laki - laki">
                                            </div>
                                            <div class=" col-3 mb-4">
                                                <input type="number" name="u70_lebih_p" value="<?php echo $u->u70_lebih_p ?>" class="form-control" placeholder="Perempuan">
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