<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h4 class="mb-4 text-gray-800">Data Perangkat Desa / <strong>Kelola RT</strong></h4>
    <?php echo $this->session->flashdata('pesan') ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class=" btn-group">
                <div class=" btn-group">
                    <a class="btn btn-sm btn-primary m-0" href="<?php echo base_url('admin/print_rt') ?>">
                        <i class="fas fa-print"></i> Print</a>
                </div>
            </div>
            <div class=" btn-group">
                <form method="POST" action="<?= base_url('admin/rt/filter_rt'); ?>" class="form-inline">
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
                <table class="table table-hover table-responsive-lg" id="dataTable" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Tanggal</th>
                            <th>Nama Desa</th>
                            <th>Nama Lengkap</th>
                            <th>Dusun</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($rt as $r) : ?>
                            <tr>
                                <td>
                                    <center>
                                        <a class="btn btn-circle btn-sm btn-dark" data-toggle="modal" data-target="#exampleModal<?php echo $r->id_rt ?>"><i class="fas fa-search-plus"></i></a>
                                    </center>
                                </td>
                                <td><?php echo format_indo(date($r->tanggal_rt)); ?></td>
                                <td><?php echo $r->nama_desa ?></td>
                                <td><?php echo $r->nama_rt ?></td>
                                <td><?php echo $r->dusun_rt ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- Modal -->
<?php
foreach ($rt as $r) : ?>
    <div class="modal fade" id="exampleModal<?php echo $r->id_rt ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong>Detail perangkat Desa (RT)</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <table class="table bg-gray-300">
                        <tr>
                            <th>Nama Pengirim</th>
                            <td><?php echo $r->nama_pengguna ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Upload</th>
                            <td><?php echo format_indo(date($r->tanggal_rt)); ?></td>
                        </tr>
                        <tr>
                            <th>Nama Desa</th>
                            <td>Desa <?php echo $r->nama_desa ?></td>
                        </tr>
                        <tr>
                            <th>Nama Dusun</th>
                            <td>Desa <?php echo $r->dusun_rt ?></td>
                        </tr>
                        <tr>
                            <th>Jabatan</th>
                            <td><?php echo $r->jabatan_rt ?></td>
                        </tr>
                    </table>

                    <table class="table">
                        <tr>
                            <th>No Surat Kerja</th>
                            <td><?php echo $r->nosk_rt ?></td>
                        </tr>

                        <tr>
                            <th>Nama Lengkap</th>
                            <td><?php echo $r->nama_rt ?></td>
                        </tr>

                        <tr>
                            <th>Tanggal Lahir</th>
                            <td><?php echo format_indo(date($r->tgllahir_rt)); ?></td>
                            <!-- <td><?php echo $r->tgllahir_rt ?></td> -->
                        </tr>

                        <tr>
                            <th>Periode Jabatan</th>
                            <td>Tahun <?php echo $r->periodeawal_rt ?> - <?php echo $r->periodeakhir_rt ?></td>
                        </tr>

                        <tr>
                            <th>No Telpon</th>
                            <td><?php echo $r->telp_rt ?></td>
                        </tr>

                        <tr>
                            <th>Actions</th>
                            <td>
                                <a class="btn btn-sm btn-primary" title="Edit" href="<?php echo base_url('admin/rt/update_data/' . $r->id_rt) ?>"><i class="fas fa-edit"></i> Edit</a>
                                <a onclick="return confirm ('Yakin Hapus')" class="btn btn-sm btn-danger" title="Delete" href="<?php echo base_url('admin/rt/delete_data/' . $r->id_rt) ?>"><i class="fas fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>