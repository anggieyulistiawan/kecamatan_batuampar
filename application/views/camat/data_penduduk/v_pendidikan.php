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
                                <div class=" btn-group">
                                    <a class="btn btn-sm btn-primary m-0" href="<?php echo base_url('camat/print_pendidikan') ?>">
                                        <i class="fas fa-print"></i> Print</a>
                                </div>
                            </div>
                            <div class=" btn-group">
                                <form method="POST" action="<?= base_url('camat/pendidikan/filter_pendidikan'); ?>" class="form-inline">
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
                                        foreach ($pendidikan as $p) : ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo format_indo(date($p->tanggal_pendidikan)); ?></td>
                                                <td><?php echo $p->nama_desa ?></td>
                                                <td>
                                                    <?php echo
                                                    $p->strata3_l + $p->strata2_l + $p->strata1_l + $p->diploma3_l +  $p->diploma12_l + $p->slta_l + $p->sltp_l + $p->tamatsd_l + $p->tidak_sd_l + $p->tidak_sekolah_l +
                                                        $p->strata3_p + $p->strata2_p + $p->strata1_p + $p->diploma3_p +  $p->diploma12_p + $p->slta_p + $p->sltp_p + $p->tamatsd_p + $p->tidak_sd_p + $p->tidak_sekolah_p
                                                    ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-success" title="Detail" href="<?php echo base_url('camat/pendidikan/detail_data/' . $p->id_pendidikan) ?>"><i class="fas fa-search-plus"></i> Detail</a>
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