                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h4 class="mb-4 text-gray-800">Data Penduduk / <strong>Kelola Pendidikan Penduduk</strong></h4>

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
                                        foreach ($pendidikan as $p) : ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo format_indo(date($p->tanggal_pendidikan)); ?></td>
                                                <td>
                                                    <?php echo
                                                    $p->strata3_l + $p->strata2_l + $p->strata1_l + $p->diploma3_l +  $p->diploma12_l + $p->slta_l + $p->sltp_l + $p->tamatsd_l + $p->tidak_sd_l + $p->tidak_sekolah_l +
                                                        $p->strata3_p + $p->strata2_p + $p->strata1_p + $p->diploma3_p +  $p->diploma12_p + $p->slta_p + $p->sltp_p + $p->tamatsd_p + $p->tidak_sd_p + $p->tidak_sekolah_p
                                                    ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-success" title="Detail" href="<?php echo base_url('desa/pendidikan/detail_data/' . $p->id_pendidikan) ?>"><i class="fas fa-search-plus"></i> Detail</a>
                                                    <a class="btn btn-sm btn-primary" title="Edit" data-toggle="modal" data-target="#exampleModal1<?php echo $p->id_pendidikan ?>"><i class="fas fa-edit"></i> Edit</a>
                                                    <a onclick="return confirm ('Yakin Hapus')" class="btn btn-sm btn-danger" title="Delete" href="<?php echo base_url('desa/Pendidikan/delete_data/' . $p->id_pendidikan) ?>"><i class="fas fa-trash"></i> Delete</a>
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
                                <h5 class="modal-title" id="exampleModalLabel"><strong>Tambah Data Pendidikan</strong></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="<?php echo base_url('desa/pendidikan/tambah_data_aksi/') ?>" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class=" col-6 mb-4 text-center">
                                            <label><strong>Nama Desa</strong></label>
                                            <input type="hidden" name="tanggal_pendidikan" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                                            <input type="text" value="<?= $this->session->userdata('nama_desa'); ?>" class="form-control text-center" readonly>
                                        </div>
                                        <div class=" col-6 mb-4 text-center">
                                            <label><strong>Nama Pengirim</strong></label>
                                            <input type="text" name="id_akun" value="<?= $this->session->userdata('nama_pengguna'); ?>" class="form-control text-center" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6 text-center text-bold">
                                            <label><strong>Tidak / Belum Sekolah</strong></label>
                                        </div>

                                        <div class="col-6 text-center text-bold">
                                            <label><strong>Tidak Tamat SD</strong></label>
                                        </div>

                                        <div class=" col-3 mb-4">
                                            <input type="number" name="tidak_sekolah_l" class="form-control" placeholder="Laki - laki">
                                        </div>
                                        <div class=" col-3 mb-4">
                                            <input type="number" name="tidak_sekolah_p" class="form-control" placeholder="Perempuan">
                                        </div>


                                        <div class=" col-3 mb-4">
                                            <input type="number" name="tidak_sd_l" class="form-control" placeholder="Laki - laki">
                                        </div>
                                        <div class=" col-3 mb-4">
                                            <input type="number" name="tidak_sd_p" class="form-control" placeholder="Perempuan">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6 text-center text-bold">
                                            <label><strong>Tamat SD</strong></label>
                                        </div>

                                        <div class="col-6 text-center text-bold">
                                            <label><strong>SLTP/Sederajat</strong></label>
                                        </div>

                                        <div class=" col-3 mb-4">
                                            <input type="number" name="tamatsd_l" class="form-control" placeholder="Laki - laki">
                                        </div>
                                        <div class=" col-3 mb-4">
                                            <input type="number" name="tamatsd_p" class="form-control" placeholder="Perempuan">
                                        </div>


                                        <div class=" col-3 mb-4">
                                            <input type="number" name="sltp_l" class="form-control" placeholder="Laki - laki">
                                        </div>
                                        <div class=" col-3 mb-4">
                                            <input type="number" name="sltp_p" class="form-control" placeholder="Perempuan">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6 text-center text-bold">
                                            <label><strong>SLTA/Sederajat</strong></label>
                                        </div>

                                        <div class="col-6 text-center text-bold">
                                            <label><strong>Diploma I/II</strong></label>
                                        </div>

                                        <div class=" col-3 mb-4">
                                            <input type="number" name="slta_l" class="form-control" placeholder="Laki - laki">
                                        </div>
                                        <div class=" col-3 mb-4">
                                            <input type="number" name="slta_p" class="form-control" placeholder="Perempuan">
                                        </div>


                                        <div class=" col-3 mb-4">
                                            <input type="number" name="diploma12_l" class="form-control" placeholder="Laki - laki">
                                        </div>
                                        <div class=" col-3 mb-4">
                                            <input type="number" name="diploma12_p" class="form-control" placeholder="Perempuan">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6 text-center text-bold">
                                            <label><strong>Akademi/Diploma III/ Sarjana Muda</strong></label>
                                        </div>

                                        <div class="col-6 text-center text-bold">
                                            <label><strong>Diploma IV/ Strata I</strong></label>
                                        </div>

                                        <div class=" col-3 mb-4">
                                            <input type="number" name="diploma3_l" class="form-control" placeholder="Laki - laki">
                                        </div>
                                        <div class=" col-3 mb-4">
                                            <input type="number" name="diploma3_p" class="form-control" placeholder="Perempuan">
                                        </div>


                                        <div class=" col-3 mb-4">
                                            <input type="number" name="strata1_l" class="form-control" placeholder="Laki - laki">
                                        </div>
                                        <div class=" col-3 mb-4">
                                            <input type="number" name="strata1_p" class="form-control" placeholder="Perempuan">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6 text-center text-bold">
                                            <label><strong>Strata II</strong></label>
                                        </div>

                                        <div class="col-6 text-center text-bold">
                                            <label><strong>Strata III</strong></label>
                                        </div>

                                        <div class=" col-3 mb-4">
                                            <input type="number" name="strata2_l" class="form-control" placeholder="Laki - laki">
                                        </div>
                                        <div class=" col-3 mb-4">
                                            <input type="number" name="strata2_p" class="form-control" placeholder="Perempuan">
                                        </div>


                                        <div class=" col-3 mb-4">
                                            <input type="number" name="strata3_l" class="form-control" placeholder="Laki - laki">
                                        </div>
                                        <div class=" col-3 mb-4">
                                            <input type="number" name="strata3_p" class="form-control" placeholder="Perempuan">
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
                <?php foreach ($pendidikan as $p) : ?>
                    <div class="modal fade" id="exampleModal1<?php echo $p->id_pendidikan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><strong>Edit Data Pendidikan</strong></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="<?php echo base_url('desa/pendidikan/update_data_aksi/') ?>" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class=" col-6 mb-4 text-center">
                                                <label><strong>Nama Desa</strong></label>
                                                <input type="hidden" name="id_pendidikan" value="<?php echo $p->id_pendidikan ?>" class="form-control" placeholder="">
                                                <input type="hidden" name="tanggal_pendidikan" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                                                <input type="text" value="<?= $this->session->userdata('nama_desa'); ?>" class="form-control text-center" readonly>
                                            </div>
                                            <div class=" col-6 mb-4 text-center">
                                                <label><strong>Nama Pengirim</strong></label>
                                                <input type="text" name="id_akun" value="<?= $this->session->userdata('nama_pengguna'); ?>" class="form-control text-center" readonly>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6 text-center text-bold">
                                                <label><strong>Tidak / Belum Sekolah</strong></label>
                                            </div>

                                            <div class="col-6 text-center text-bold">
                                                <label><strong>Tidak Tamat SD</strong></label>
                                            </div>

                                            <div class=" col-3 mb-4">
                                                <input type="number" name="tidak_sekolah_l" value="<?php echo $p->tidak_sekolah_l ?>" class="form-control" placeholder="Laki - laki">
                                            </div>
                                            <div class=" col-3 mb-4">
                                                <input type="number" name="tidak_sekolah_p" value="<?php echo $p->tidak_sekolah_p ?>" class="form-control" placeholder="Perempuan">
                                            </div>


                                            <div class=" col-3 mb-4">
                                                <input type="number" name="tidak_sd_l" value="<?php echo $p->tidak_sd_l ?>" class="form-control" placeholder="Laki - laki">
                                            </div>
                                            <div class=" col-3 mb-4">
                                                <input type="number" name="tidak_sd_p" value="<?php echo $p->tidak_sd_p ?>" class="form-control" placeholder="Perempuan">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6 text-center text-bold">
                                                <label><strong>Tamat SD</strong></label>
                                            </div>

                                            <div class="col-6 text-center text-bold">
                                                <label><strong>SLTP/Sederajat</strong></label>
                                            </div>

                                            <div class=" col-3 mb-4">
                                                <input type="number" name="tamatsd_l" value="<?php echo $p->tamatsd_l ?>" class="form-control" placeholder="Laki - laki">
                                            </div>
                                            <div class=" col-3 mb-4">
                                                <input type="number" name="tamatsd_p" value="<?php echo $p->tamatsd_p ?>" class="form-control" placeholder="Perempuan">
                                            </div>


                                            <div class=" col-3 mb-4">
                                                <input type="number" name="sltp_l" value="<?php echo $p->sltp_l ?>" class="form-control" placeholder="Laki - laki">
                                            </div>
                                            <div class=" col-3 mb-4">
                                                <input type="number" name="sltp_p" value="<?php echo $p->sltp_p ?>" class="form-control" placeholder="Perempuan">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6 text-center text-bold">
                                                <label><strong>SLTA/Sederajat</strong></label>
                                            </div>

                                            <div class="col-6 text-center text-bold">
                                                <label><strong>Diploma I/II</strong></label>
                                            </div>

                                            <div class=" col-3 mb-4">
                                                <input type="number" name="slta_l" value="<?php echo $p->slta_l ?>" class="form-control" placeholder="Laki - laki">
                                            </div>
                                            <div class=" col-3 mb-4">
                                                <input type="number" name="slta_p" value="<?php echo $p->slta_p ?>" class="form-control" placeholder="Perempuan">
                                            </div>


                                            <div class=" col-3 mb-4">
                                                <input type="number" name="diploma12_l" value="<?php echo $p->diploma12_l ?>" class="form-control" placeholder="Laki - laki">
                                            </div>
                                            <div class=" col-3 mb-4">
                                                <input type="number" name="diploma12_p" value="<?php echo $p->diploma12_p ?>" class="form-control" placeholder="Perempuan">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6 text-center text-bold">
                                                <label><strong>Akademi/Diploma III/ Sarjana Muda</strong></label>
                                            </div>

                                            <div class="col-6 text-center text-bold">
                                                <label><strong>Diploma IV/ Strata I</strong></label>
                                            </div>

                                            <div class=" col-3 mb-4">
                                                <input type="number" name="diploma3_l" value="<?php echo $p->diploma3_l ?>" class="form-control" placeholder="Laki - laki">
                                            </div>
                                            <div class=" col-3 mb-4">
                                                <input type="number" name="diploma3_p" value="<?php echo $p->diploma3_p ?>" class="form-control" placeholder="Perempuan">
                                            </div>


                                            <div class=" col-3 mb-4">
                                                <input type="number" name="strata1_l" value="<?php echo $p->strata1_l ?>" class="form-control" placeholder="Laki - laki">
                                            </div>
                                            <div class=" col-3 mb-4">
                                                <input type="number" name="strata1_p" value="<?php echo $p->strata1_p ?>" class="form-control" placeholder="Perempuan">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6 text-center text-bold">
                                                <label><strong>Strata II</strong></label>
                                            </div>

                                            <div class="col-6 text-center text-bold">
                                                <label><strong>Strata III</strong></label>
                                            </div>

                                            <div class=" col-3 mb-4">
                                                <input type="number" name="strata2_l" value="<?php echo $p->strata2_l ?>" class="form-control" placeholder="Laki - laki">
                                            </div>
                                            <div class=" col-3 mb-4">
                                                <input type="number" name="strata2_p" value="<?php echo $p->strata2_p ?>" class="form-control" placeholder="Perempuan">
                                            </div>


                                            <div class=" col-3 mb-4">
                                                <input type="number" name="strata3_l" value="<?php echo $p->strata3_l ?>" class="form-control" placeholder="Laki - laki">
                                            </div>
                                            <div class=" col-3 mb-4">
                                                <input type="number" name="strata3_p" value="<?php echo $p->strata3_p ?>" class="form-control" placeholder="Perempuan">
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