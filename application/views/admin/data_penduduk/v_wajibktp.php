                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h4 class="mb-4 text-gray-800">Data Penduduk / <strong>Kelola Wajib KTP-EL Penduduk</strong></h4>
                    <?php echo $this->session->flashdata('pesan') ?>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="btn-group">
                                <a class="btn btn-sm btn-primary m-0" href="<?php echo base_url('admin/print_wajibktp') ?>">
                                    <i class="fas fa-print"></i> Print</a>
                            </div>
                            <div class=" btn-group">
                                <form method="POST" action="<?= base_url('admin/wajibktp/filter_wajibktp'); ?>" class="form-inline">
                                    <div class="form-group mb-2 ml-3">
                                        <label for="staticEmail2">Bulan :</label>
                                        <select class="form-control ml-3" name="bulan">
                                            <option value="">--- Pilih Bulan --- </option>
                                            <option value="01">Januari</option>
                                            <option value="02">Februari</option>
                                            <option value="03">Maret</option>
                                            <option value="04">April</option>
                                            <option value="05">Mei</option>
                                            <option value="06">Juni</option>
                                            <option value="07">Juli</option>
                                            <option value="08">Agustus</option>
                                            <option value="09">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-2 ml-3">
                                        <label for="staticEmail2">Tahun :</label>
                                        <select class="form-control ml-3" name="tahun">
                                            <option value="">--- Pilih Tahun --- </option>
                                            <?php $tahun = date('Y');
                                            for ($t = 2020; $t < $tahun + 2; $t++) { ?>
                                                <option value="<?php echo $t ?>"><?php echo $t ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-secondary mb-2 ml-4"><i class="fas fa-eye"></i> Tampilkan Data</button>
                                </form>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class=" table">
                                <table class="table table-hover table-responsive-lg" id="dataTable" cellspacing="0">s
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Nama Desa</th>
                                            <th>Jumlah Wajib KTP</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($wajibktp as $w) : ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo format_indo(date($w->tanggal_wajibktp)); ?></td>
                                                <td><?php echo $w->nama_desa ?></td>
                                                <td><?php echo $w->sudahktpel_l +  $w->sudahktpel_p ?></td>
                                                <td>
                                                    <a class="btn btn-sm btn-success" title="Detail" href="<?php echo base_url('admin/wajibktp/detail_data/' . $w->id_wajibktp) ?>"><i class="fas fa-search-plus"></i> Detail</a>
                                                    <a class="btn btn-sm btn-primary" title="Edit" data-toggle="modal" data-target="#exampleModal1<?php echo $w->id_wajibktp ?>"><i class="fas fa-edit"></i> Edit</a>
                                                    <a onclick="return confirm ('Yakin Hapus')" class="btn btn-sm btn-danger" title="Delete" href="<?php echo base_url('admin/wajibktp/delete_data/' . $w->id_wajibktp) ?>"><i class="fas fa-trash"></i> Delete</a>
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

                <!-- Modal Update -->
                <?php foreach ($wajibktp as $w) : ?>
                    <div class="modal fade" id="exampleModal1<?php echo $w->id_wajibktp ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><strong>Edit Data Wajib KTP-EL Penduduk</strong></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="<?php echo base_url('admin/wajibktp/update_data_aksi/') ?>" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class=" mb-4 text-center">
                                            <label><strong>Nama Desa</strong></label>
                                            <input type="text" name="" value="Desa <?php echo $w->nama_desa ?>" class="form-control text-center" placeholder="" readonly>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 text-center text-bold">
                                                <label><strong>Jumlah Kartu Keluarga </strong></label>
                                            </div>
                                            <div class=" col-6 mb-4">
                                                <input type="hidden" name="id_wajibktp" class="form-control" value="<?php echo $w->id_wajibktp ?>">
                                                <input type="hidden" name="tanggal_wajibktp" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                                                <input type="number" name="jumlahkk_l" class="form-control" value="<?php echo $w->jumlahkk_l ?>" placeholder="Laki - Laki" required>
                                            </div>
                                            <div class=" col-6 mb-4">
                                                <input type="number" name="jumlahkk_p" class="form-control" value="<?php echo $w->jumlahkk_p ?>" placeholder="Perempuan" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6 text-center text-bold">
                                                <label><strong>Sudah Memiliki KTP-EL</strong></label>
                                            </div>

                                            <div class="col-6 text-center text-bold">
                                                <label><strong>Belum Memiliki KTP-EL</strong></label>
                                            </div>

                                            <div class=" col-3 mb-4">
                                                <input type="number" name="sudahktpel_l" class="form-control" value="<?php echo $w->sudahktpel_l ?>" placeholder="Laki - Laki">
                                            </div>
                                            <div class=" col-3 mb-4">
                                                <input type="number" name="sudahktpel_p" class="form-control" value="<?php echo $w->sudahktpel_p ?>" placeholder="Perempuan">
                                            </div>


                                            <div class=" col-3 mb-4">
                                                <input type="number" name="belumktpel_l" class="form-control" value="<?php echo $w->belumktpel_l ?>" placeholder="Laki - Laki">
                                            </div>
                                            <div class=" col-3 mb-4">
                                                <input type="number" name="belumktpel_p" class="form-control" value="<?php echo $w->belumktpel_p ?>" placeholder="Perempuan">
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