                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h4 class="mb-4 text-gray-800">Data Penduduk / <strong>Kelola Jumlah Penduduk</strong></h4>

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
                                            <th>Jumlah Penduduk</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($jumlah as $p) : ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo format_indo(date($p->tanggal_jumlah)); ?></td>
                                                <td>
                                                    <?php echo
                                                    $p->penduduk_awal_l + $p->kelahiran_l - $p->kematian_l + $p->pendatang_l - $p->pindah_l +
                                                        $p->penduduk_awal_p + $p->kelahiran_p - $p->kematian_p + $p->pendatang_p - $p->pindah_p
                                                    ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-success" title="Detail" href="<?php echo base_url('desa/jumlah/detail_data/' . $p->id_jumlah) ?>"><i class="fas fa-search-plus"></i> Detail</a>
                                                    <a class="btn btn-sm btn-primary" title="Edit" data-toggle="modal" data-target="#exampleModal1<?php echo $p->id_jumlah ?>"><i class="fas fa-edit"></i> Edit</a>
                                                    <a onclick="return confirm ('Yakin Hapus')" class="btn btn-sm btn-danger" title="Delete" href="<?php echo base_url('desa/jumlah/delete_data/' . $p->id_jumlah) ?>"><i class="fas fa-trash"></i> Delete</a>
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
                                <h5 class="modal-title" id="exampleModalLabel"><strong>Tambah Data Jumlah Penduduk</strong></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="<?php echo base_url('desa/jumlah/tambah_data_aksi/') ?>" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class=" col-6 mb-4 text-center">
                                            <label><strong>Nama Desa</strong></label>
                                            <input type="hidden" name="tanggal_jumlah" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                                            <input type="text" value="<?= $this->session->userdata('nama_desa'); ?>" class="form-control text-center" readonly>
                                        </div>
                                        <div class=" col-6 mb-4 text-center">
                                            <label><strong>Nama Pengirim</strong></label>
                                            <input type="text" name="id_akun" value="<?= $this->session->userdata('nama_pengguna'); ?>" class="form-control text-center" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 text-center text-bold">
                                            <label><strong>Penduduk Awal Bulan Ini</strong></label>
                                        </div>

                                        <div class=" col-6 mb-4">
                                            <input type="number" name="penduduk_awal_l" class="form-control" placeholder="Laki - laki" required>
                                        </div>
                                        <div class=" col-6 mb-4">
                                            <input type="number" name="penduduk_awal_p" class="form-control" placeholder="Perempuan" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6 text-center text-bold">
                                            <label><strong>Kelahiran Bulan Ini</strong></label>
                                        </div>

                                        <div class="col-6 text-center text-bold">
                                            <label><strong>Kematian Bulan Ini</strong></label>
                                        </div>

                                        <div class=" col-3 mb-4">
                                            <input type="number" name="kelahiran_l" class="form-control" placeholder="Laki - laki">
                                        </div>
                                        <div class=" col-3 mb-4">
                                            <input type="number" name="kelahiran_p" class="form-control" placeholder="Perempuan">
                                        </div>

                                        <div class=" col-3 mb-4">
                                            <input type="number" name="kematian_l" class="form-control" placeholder="Laki - laki">
                                        </div>
                                        <div class=" col-3 mb-4">
                                            <input type="number" name="kematian_p" class="form-control" placeholder="Perempuan">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6 text-center text-bold">
                                            <label><strong>Pendatang Bulan Ini</strong></label>
                                        </div>

                                        <div class="col-6 text-center text-bold">
                                            <label><strong>Pindah Bulan Ini</strong></label>
                                        </div>

                                        <div class=" col-3 mb-4">
                                            <input type="number" name="pendatang_l" class="form-control" placeholder="Laki - laki">
                                        </div>
                                        <div class=" col-3 mb-4">
                                            <input type="number" name="pendatang_p" class="form-control" placeholder="Perempuan">
                                        </div>

                                        <div class=" col-3 mb-4">
                                            <input type="number" name="pindah_l" class="form-control" placeholder="Laki - laki">
                                        </div>
                                        <div class=" col-3 mb-4">
                                            <input type="number" name="pindah_p" class="form-control" placeholder="Perempuan">
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
                <?php foreach ($jumlah as $p) : ?>
                    <div class="modal fade" id="exampleModal1<?php echo $p->id_jumlah ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><strong>Edit Data jumlah</strong></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="<?php echo base_url('desa/jumlah/update_data_aksi/') ?>" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class=" col-6 mb-4 text-center">
                                                <label><strong>Nama Desa</strong></label>
                                                <input type="hidden" name="id_jumlah" value="<?php echo $p->id_jumlah ?>" class="form-control" placeholder="">
                                                <input type="hidden" name="tanggal_jumlah" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                                                <input type="text" value="<?= $this->session->userdata('nama_desa'); ?>" class="form-control text-center" readonly>
                                            </div>
                                            <div class=" col-6 mb-4 text-center">
                                                <label><strong>Nama Pengirim</strong></label>
                                                <input type="text" name="id_akun" value="<?= $this->session->userdata('nama_pengguna'); ?>" class="form-control text-center" readonly>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 text-center text-bold">
                                                <label><strong>Penduduk Awal Bulan Ini</strong></label>
                                            </div>

                                            <div class=" col-6 mb-4">
                                                <input type="number" name="penduduk_awal_l" value="<?php echo $p->penduduk_awal_l ?>" class="form-control" placeholder="Laki - laki" required>
                                            </div>
                                            <div class=" col-6 mb-4">
                                                <input type="number" name="penduduk_awal_p" value="<?php echo $p->penduduk_awal_p ?>" class="form-control" placeholder="Perempuan" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6 text-center text-bold">
                                                <label><strong>Kelahiran Bulan Ini</strong></label>
                                            </div>

                                            <div class="col-6 text-center text-bold">
                                                <label><strong>Kematian Bulan Ini</strong></label>
                                            </div>

                                            <div class=" col-3 mb-4">
                                                <input type="number" name="kelahiran_l" value="<?php echo $p->kelahiran_l ?>" class="form-control" placeholder="Laki - laki">
                                            </div>
                                            <div class=" col-3 mb-4">
                                                <input type="number" name="kelahiran_p" value="<?php echo $p->kelahiran_p ?>" class="form-control" placeholder="Perempuan">
                                            </div>


                                            <div class=" col-3 mb-4">
                                                <input type="number" name="kematian_l" value="<?php echo $p->kematian_l ?>" class="form-control" placeholder="Laki - laki">
                                            </div>
                                            <div class=" col-3 mb-4">
                                                <input type="number" name="kematian_p" value="<?php echo $p->kematian_p ?>" class="form-control" placeholder="Perempuan">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6 text-center text-bold">
                                                <label><strong>Pendatang Bulan Ini</strong></label>
                                            </div>

                                            <div class="col-6 text-center text-bold">
                                                <label><strong>Pindah Bulan Ini</strong></label>
                                            </div>

                                            <div class=" col-3 mb-4">
                                                <input type="number" name="pendatang_l" value="<?php echo $p->pendatang_l ?>" class="form-control" placeholder="Laki - laki">
                                            </div>
                                            <div class=" col-3 mb-4">
                                                <input type="number" name="pendatang_p" value="<?php echo $p->pendatang_p ?>" class="form-control" placeholder="Perempuan">
                                            </div>


                                            <div class=" col-3 mb-4">
                                                <input type="number" name="pindah_l" value="<?php echo $p->pindah_l ?>" class="form-control" placeholder="Laki - laki">
                                            </div>
                                            <div class=" col-3 mb-4">
                                                <input type="number" name="pindah_p" value="<?php echo $p->pindah_p ?>" class="form-control" placeholder="Perempuan">
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